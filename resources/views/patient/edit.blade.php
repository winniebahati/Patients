@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ URL::route('post-edit') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ $patientID->name }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Date of Birth</label>

                            <div class="col-md-6">
                                <input type="date" class="form-control" name="dob" value="{{ $patientID->dob }}">

                                @if ($errors->has('dob'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Gender</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="gender" value="{{ $patientID->gender }}">

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('marital') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Marital Status</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="marital" value="{{ $patientID->marital }}">

                                @if ($errors->has('marital'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('marital') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('national') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">National ID no</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="national" value="{{ $patientID->national }}">

                                @if ($errors->has('national'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('national') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nhif') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">NHIF no</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nhif" value="{{ $patientID->nhif }}">

                                @if ($errors->has('nhif'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nhif') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">email</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ $patientID->email }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Mobile Phone no</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="phone" value="{{ $patientID->phone }}">

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('home') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Home Phone no</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="home" value="{{ $patientID->home }}">

                                @if ($errors->has('home'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('home') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">location</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="location" value="{{ $patientID->location }}">

                                @if ($errors->has('location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('education') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Education level</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="education" value="{{ $patientID->education }}">

                                @if ($errors->has('education'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('education') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('occupation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Occupation</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="occupation" value="{{ $patientID->occupation }}">

                                @if ($errors->has('occupation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('occupation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Edit
                                </button>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{$patientID->id}}">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection