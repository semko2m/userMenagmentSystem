@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <p class="col-md-3">
                                Name : {{$group->name}}
                            </p>
                            <div class="col-md-9 ">
                                <div class="pull-right">
                                    <p>
                                        Description : {{$group->description}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="panel-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Users already in group</th>
                                        <th>Add Others to this group</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            @foreach($usersIN as $userI)
                                                {{$userI->name}}
                                                <a href="{{route('admin.deleteUserToGroup',['userId'=>$userI->id, 'groupId'=>$group->id])}}">
                                                    <i class="fa fa-minus" aria-hidden="true" data-toggle="tooltip"
                                                       title="Delete this user from group!"></i>
                                                </a>
                                                </br>
                                            @endforeach

                                        </td>
                                        <td>
                                            @foreach($usersOUT as $userO)
                                                <?php
                                                $pom = true;
                                                foreach ($usersIN as $userI) {
                                                    if ($userO->id == $userI->id) {
                                                        $pom = false;
                                                    }
                                                }
                                                if ($pom) {
                                                echo $userO->name;
                                                ?>
                                                <a href="{{route('admin.insertUserToGroup',['userId'=>$userO->id, 'groupId'=>$group->id])}}">
                                                    <i class="fa fa-plus" aria-hidden="true" data-toggle="tooltip"
                                                       title="Add this user to this group!"></i>
                                                </a>
                                                </br>
                                                <?php
                                                }
                                                ?>


                                            @endforeach
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

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
