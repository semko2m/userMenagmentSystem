@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-12">
                                @if(Session::has('message'))
                                    <p class="alert alert-danger">{{ Session::get('message') }}</p>
                                @endif
                            </div>

                        </div>
                        <div class="row">
                            <p class="col-md-3">
                                All Groups
                            </p>
                            <div class="col-md-9">
                                <a class="btn btn-default pull-right"
                                   href="{{ route('manage.groupsCreateView') }}">Create new Group </a>


                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Descripit</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($groups as $group)
                                <tr>
                                    <td>{{$group->name}}</td>
                                    <td>{{$group->description}}</td>
                                    <td>
                                        <a href="{{route('admin.deleteGroup',$group->id)}}">
                                            <i class="fa fa-trash"
                                               aria-hidden="true"
                                               data-toggle="tooltip"
                                               title="Delete Group !"></i>
                                        </a>

                                        <a href="{{route('admin.addUsersGroup',$group->id)}}">
                                            <i class="fa fa-user-plus"
                                               aria-hidden="true"
                                               data-toggle="tooltip"
                                               title="Add - delete users to group !"></i>
                                            <i class="fa fa-user-times"
                                               aria-hidden="true"
                                               data-toggle="tooltip"
                                               title="Add - delete users to group !"></i>

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
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
@endsection
