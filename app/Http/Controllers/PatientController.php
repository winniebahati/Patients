<?php
namespace App\Http\Controllers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Input;
use Validator;
use Redirect;
use App\User;
use App\Patient;
use Hash;
use Mail;
use URL;
use Auth;
use Doctrine\CouchDB\CouchDBClient;

class PatientController extends BaseController{

  	public function register(){
 	return View ('patient.register');
	}

	public function view(){
		//$ss = new CouchDBClient('http://localhost:5984/patients');
		$results=Patient::orderBy('created_at', 'desc')->paginate(10);
		return view('patient.view')->with('results', $results);	
	}

  	public function edit($id){
  		$patientID = Patient::where('id', '=', $id)->firstOrFail();
 		return View ('patient.edit')->with('patientID', $patientID);
	}

	public function delete($id){		
		$deleteuser = Patient::where('id', '=', $id)->delete();
		return Redirect::back();
	}

  	public function postEdit(){

  		$validator = Validator::make(Input::all(),
			array(
			'name'			=> 'required|max:50',
			'dob'			=> 'required',
			'email' 		=> 'required|max:50|email|unique:users',
			'gender' 		=> 'required',
			'marital' 		=> 'required',
			'national' 		=> 'required|max:8',
			'nhif' 			=> 'required',
			'phone' 		=> 'required',
			'home' 			=> 'required',
			'location' 		=> 'required',
			'education' 	=> 'required',
			'occupation' 	=> 'required'
			)
		);

		if($validator->fails()){
			return Redirect::back()
					->withErrors($validator)
					->withInput();
    	}else{
    		$id 		= Input::get('id');
    		$name 		= Input::get('name');
    		$dob 		= Input::get('dob');
			$email 		= Input::get('email');
			$gender 	= Input::get('gender');
			$marital 	= Input::get('marital');
			$national 	= Input::get('national');
    		$nhif 		= Input::get('nhif');
			$phone 		= Input::get('phone');
			$home 		= Input::get('home');
			$location 	= Input::get('location');
			$education 	= Input::get('education');
    		$occupation = Input::get('occupation');
			
			$update 			= Patient::where('id', '=', $id)->first();
   			$update->name		= $name;
   			$update->dob 		= $dob;
   			$update->email 		= $email;
   			$update->gender		= $gender;
   			$update->marital 	= $marital;
   			$update->national 	= $national;
   			$update->nhif 		= $nhif;
   			$update->phone		= $phone;
   			$update->home 		= $home;
   			$update->location 	= $location;
   			$update->education 	= $education;
   			$update->occupation	= $occupation;
   			$update->save();
			return Redirect::back();
						
			}
		}

	public function postRegister(){
		$validator = Validator::make(Input::all(),
			array(
			'name'			=> 'required|max:50',
			'dob'			=> 'required',
			'email' 		=> 'required|max:50|email|unique:users',
			'gender' 		=> 'required',
			'marital' 		=> 'required',
			'national' 		=> 'required|max:8',
			'nhif' 			=> 'required',
			'phone' 		=> 'required',
			'home' 			=> 'required',
			'location' 		=> 'required',
			'education' 	=> 'required',
			'occupation' 	=> 'required'
			)
		);

		if($validator->fails()){
			return Redirect::route('register-patient')
					->withErrors($validator)
					->withInput();
    }else{

    		$name 		= Input::get('name');
    		$dob 		= Input::get('dob');
			$email 		= Input::get('email');
			$gender 	= Input::get('gender');
			$marital 	= Input::get('marital');
			$national 	= Input::get('national');
    		$nhif 		= Input::get('nhif');
			$phone 		= Input::get('phone');
			$home 		= Input::get('home');
			$location 	= Input::get('location');
			$education 	= Input::get('education');
    		$occupation = Input::get('occupation');

			//Activation code
			$patient 	= Patient::create(array(
				'name'		=> $name,
				'dob'		=> $dob,
				'email' 	=> $email,
				'gender' 	=> $gender,
				'marital' 	=> $marital,
				'national' 	=> $national,
				'nhif' 		=> $nhif,
				'phone' 	=> $phone,
				'home' 		=> $home,
				'location' 	=> $location,
				'education' => $education,
				'occupation'=> $occupation
			));

			if($patient){

				flash()->success('patient registered.');
				return Redirect::route('home');
			}
		}
	}

}