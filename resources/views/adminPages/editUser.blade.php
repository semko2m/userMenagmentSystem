@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Users</div>
                    <div class="panel-body">
                        @if (isset($user->id))
                            {!! Form::open(['route'=>['admin.updateUserDb',$user->id],'class'=>'form-horizontal','method'=>'put'])!!}
                        @else
                            {!! Form::open(['route'=>['admin.createUser', $type],'class'=>'form-horizontal','method'=>'put'])!!}
                        @endif

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-3 control-label">Name</label>

                            <div class="col-md-6">
                                {!! Form::text('name', isset($user->name)? $user->name:'', ['id'=>'name','class' => 'form-control required']) !!}

                                @if ($errors->has('name'))
                                    <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="key" class="col-md-3 control-label">Email</label>

                            <div class="col-md-6">
                                {!! Form::email('email', isset($user->email)? $user->email:'', ['id'=>'email','class' => 'form-control required']) !!}

                                @if ($errors->has('email'))
                                    <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-3 control-label">Password</label>

                            <div class="col-md-6">

                                {!! Form::password('password', ['id'=>'password','class' => 'form-control required']) !!}


                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-3 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                {!! Form::password('password_confirmation', ['id'=>'password_confirmation','class' => 'form-control required']) !!}

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-users"></i> Register
                                </button>
                            </div>
                        </div>

                        {!! Form::close() !!}

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
