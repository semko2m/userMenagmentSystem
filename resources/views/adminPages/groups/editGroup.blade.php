@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Groups</div>
                    <div class="panel-body">
                        @if (isset($group->id))
                            {!! Form::open(['route'=>['admin.updateUserDb',$group->id],'class'=>'form-horizontal','method'=>'put'])!!}
                        @else
                            {!! Form::open(['route'=>['admin.createGroup'],'class'=>'form-horizontal','method'=>'put'])!!}
                        @endif

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-3 control-label">Name</label>

                            <div class="col-md-6">
                                {!! Form::text('name', isset($group->name)? $group->name:'', ['id'=>'name','class' => 'form-control required']) !!}

                                @if ($errors->has('name'))
                                    <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="key" class="col-md-3 control-label">Description</label>

                            <div class="col-md-6">
                                {!! Form::text('description', isset($group->description)? $group->description:'', ['id'=>'description','class' => 'form-control required']) !!}

                                @if ($errors->has('description'))
                                    <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-users"></i> Create
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
