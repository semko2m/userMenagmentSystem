@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                    @role('admin')
                    <a href="{{route('admin.dashboard')}}">Admin dashboard</a>
                    @endrole

                    @role('user')
                    <p>This is visible to users with the user role. </p>
                    @endrole
                    <div class="panel-body">
                        You are logged in!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
