@extends('layouts.admin_layout')

@section('css')

@endsection

@section('content')
    <input type="hidden" id="url" value="{{url('admin')}}">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-sm-4">
                    <h3 class="text-info">Administrator</h3>
                </div>
                <div class="col-sm-8">
                    <div style="margin-top: 15px;">
                        <a href="#" class="btn btn-primary col-xs-5 col-xs-offset-1" id="b-add_user_role">Add User Role</a>
                        <a href="#" class="btn btn-primary col-xs-5 col-xs-offset-1" id="b-add_user">Add User</a>
                    </div>

                </div>
                <hr width="100%">
            </div>
        </div>
    </div>

    {{-- list user & use role --}}
    <div class="row" id="administration">
        <div class="well">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#user_role">User Role</a></li>
                <li><a data-toggle="tab" href="#user_list">User List</a></li>
            </ul>

            <div class="tab-content bg">
                <div id="user_role" class="tab-pane fade in active">
                    <div class="table-responsive" style="padding: 20px 0;">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">status</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($datas as $data)
                                <input type="hidden" id="user_role_id" value="{{$data->id}}">
                                <tr>
                                    <td class="col-xs-2 col-sm-2 text-center">{{$i++}}</td>
                                    <td class="col-xs-3 col-sm-4">{{$data->role}}</td>
                                    <td class="col-xs-2 col-sm-2">

                                        @if($data->status == 1)
                                            <a href="#" class="btn btn-xs center-block" data-toggle="tooltip" title="Active">
                                                <span class="glyphicon glyphicon-ok-circle"></span>
                                            </a>
                                        @else
                                            <a href="#" class="btn btn-xs center-block" data-toggle="tooltip" title="Inactive">
                                                <span class="glyphicon glyphicon-remove-circle"></span>
                                            </a>
                                        @endif

                                    </td>
                                    <td class="col-xs-5 col-sm-4">
                                        <a href="#" id="btn_update_user_role" class="btn btn-warning btn-xs col-xs-5 col-xs-offset-1" data-toggle="tooltip" title="Update"><i class="fa fa-pencil"></i></a>
                                        <a href="#" id="btn_delete_user_role" class="btn btn-danger btn-xs col-xs-5 col-xs-offset-1" data-toggle="tooltip" title="Delete"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="user_list" class="tab-pane fade">
                    <div class="table-responsive" style="padding: 20px 0;">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Created on</th>
                                <th class="text-center">Last Activity</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="col-sm-1 col-xs-1">
                                        <a href="#" id="btn_update_user_role" class="btn btn-warning btn-xs col-xs-12" data-toggle="tooltip" title="Update"><i class="fa fa-pencil"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end list user & user role --}}

    {{-- add User role --}}
    <div class="row" id="l-add_user_role" style="display: none;">
        <div class="well" {{--style="position: fixed;"--}}>
            <div class="page-header text-center text-info" style="margin-top: -20px;">
                <h3>Add User Role</h3>
            </div>
            <form class="form-horizontal" role="form" method="POST" action="{{url('admin/add_user_role')}}" style="padding: 20px 0;">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="control-label col-sm-3" for="a_user_role">User role:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="a_user_role" name="a_user_role" placeholder="Enter User Role">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="a_description">Description:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="a_description" name="a_description" placeholder="Enter description">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="submit" class="btn btn-primary center-block" value="Save">
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- end add user role--}}

    {{-- update User role --}}
    <div class="row" id="l-edit_user_role" style="display: none;">
        <div class="well" {{--style="position: fixed;"--}}>
            <div class="page-header text-center text-info" style="margin-top: -20px;">
                <h3>Update User Role</h3>
            </div>
            <form class="form-horizontal" role="form" method="POST" action="{{url('admin/update_user_role')}}" style="padding: 20px 0;">
                {{ csrf_field() }}
                <input type="hidden" id="u_user_role_id" name="u_user_role_id" >
                <div class="form-group">
                    <label class="control-label col-sm-3" for="u_user_role">User role:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="u_user_role" name="u_user_role" placeholder="Enter User Role">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="u_description">Description:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="u_description" name="u_description" placeholder="Enter description">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3 col-xs-6" for="u_status">Status:</label>
                    <div class="col-sm-9 col-xs-6">
                        <input type="checkbox" name="u_status" id="u_status" value='0'>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="submit" class="btn btn-primary center-block" value="Update">
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- end update user role--}}

    {{-- delete user role --}}
        <div class="row" id="l-delete_user_role" style="display: none;">
            <div class="well" {{--style="position: fixed;"--}}>
                <div class="page-header text-center text-info" style="margin-top: -20px;">
                    <h3>Delete User Role</h3>
                </div>
                <form class="form-horizontal" role="form" method="POST" action="{{url('admin/delete_user_role')}}" style="padding: 20px 0;">
                    {{ csrf_field() }}
                    <input type="hidden" id="d_user_role_id" name="d_user_role_id" >
                    <div class="form-group">
                        <label class="col-sm-12 text-center">Are you sure want to delete this User Role?</label>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="submit" class="btn btn-primary center-block" value="Delete">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    {{-- end delete user role --}}

    {{-- add User --}}
    <div class="row" id="l-add_user" style="display: none;">
        <div class="well" {{--style="position: fixed;"--}}>
            <div class="page-header text-center text-info" style="margin-top: -20px;">
                <h3>Add User</h3>
            </div>
            <form class="form-horizontal" role="form" method="POST" action="{{url('admin/add_user')}}" style="padding: 20px 0;">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="control-label col-sm-3" for="a_user">User role:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="a_user" name="a_user" placeholder="Enter User Role">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="a_user_username">Username:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="a_user_username" name="a_user_username" placeholder="Enter username">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="a_user_email">Email:</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="a_user_email" name="a_user_email" placeholder="Enter email">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="submit" class="btn btn-primary center-block" value="Save">
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- end add user --}}

@endsection

@section('js')
    <script src="{{asset('backend/js/pages/administration.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

@endsection