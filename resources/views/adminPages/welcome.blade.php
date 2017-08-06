@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome to admin dashboard</div>
                    <div class="panel-body">
                        You are logged in!
                    </div>
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <ul class="nav navbar-nav">
                                <li class="@if(Route::is('admin.dashboard')) active @endif">
                                    <a href="{{route('admin.dashboard')}}">Dashboard</a>
                                </li>
                                <li class="@if(Route::is('manage.admins')) active @endif">
                                    <a href="{{route('manage.admins')}}">
                                        Menage Users
                                    </a>
                                </li>
                                <li class="@if(Route::is('manage.groups')) active @endif">
                                    <a href="{{route('manage.groups')}}">
                                        Menage Groups
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
