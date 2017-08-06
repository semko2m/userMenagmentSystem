@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <p class="col-md-3">
                                All users

                            </p>
                            <div class="col-md-9">
                                <a class="btn btn-default pull-right"
                                   href="{{ route('admin.create','admin') }}">Create new Admin </a>

                                <a class="btn btn-default pull-right"
                                   href="{{ route('admin.create','user') }}">Create new User </a>
                            </div>

                        </div>


                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Type</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @if ($user->hasRole('admin'))
                                            <strong>Admin</strong>
                                        @elseif($user->hasRole('user'))
                                            User
                                        @endif

                                    </td>
                                    <td>
                                        <a href="{{route('admin.deleteUser',$user->id)}}">
                                            <i class="fa fa-trash"
                                               aria-hidden="true"
                                               data-toggle="tooltip"
                                               title="Delete User !"></i>
                                        </a>
                                        <a href="{{route('admin.updateUser',$user->id)}}">
                                            <i class="fa fa-pencil"
                                               aria-hidden="true"
                                               data-toggle="tooltip"
                                               title="Update User !"></i>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
