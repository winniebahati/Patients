@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">View patients</div>
                <div class="panel-body">
						   @if($results->count())
						    @foreach($results as $result)

						     		Name: {{ $result->name }} |
						            DOB: {{ $result->dob }} |
						            Email: {{ $result->email }} |
						            Gender: {{ $result->gender }} |
						            Marital status: {{ $result->marital }}
						            National ID no: {{ $result->national }}
						            NHIF no: {{ $result->nhif }}
						            Mobile Phone #: {{ $result->phone }}
						            Home Phone #:{{ $result->home }}
						            Location: {{ $result->location }}
						            Education level: {{ $result->education }}
						            Occupation: {{ $result->occupation }}
						            <li><a href="{{ URL::route('edit', $result->id) }}"></i>Edit</a></li>|<li><a href="{{ URL::route('delete', $result->id) }}"></i>Delete</a></li><br><br>
						          
						    @endforeach
						  @else
						  <p>Nothing found</p>
						  @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
