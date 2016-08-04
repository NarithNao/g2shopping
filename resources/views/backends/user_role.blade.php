@extends('layouts.admin_layout')

@section('css')

@endsection

@section('content')
    {{-- conten header --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-sm-4 col-xs-6">
                    <h3 class="text-info">Administrator</h3>
                </div>
                <div class="col-sm-8 col-xs-6">
                    <div style="margin-top: 15px;">
                        <a href="#" class="btn btn-primary col-xs-5 col-xs-offset-1 pull-right" id="b-add_user_role" style="min-width: 120px; max-width: 150px;">Add User Role</a>
                        <a href="#" class="btn btn-primary col-xs-5 col-xs-offset-1 pull-right hidden" id="b-cancel" style="min-width: 100px; max-width: 150px;">Cancel</a>
                    </div>

                </div>
                <hr width="100%">
            </div>
        </div>
    </div>
    {{-- end conten header --}}

    {{-- list user & use role --}}
    <div class="row" id="administration">
        <div class="well">
            {{--<div class="clearfix visible-sm-6"></div>--}}
            <ul class="nav nav-tabs ">
                <li id="tab-user_role" class="active"><a data-toggle="tab" href="#user_role">User Role</a></li>
                <li id="tab-loading" class="hidden"><a data-toggle="tab" href="#loading_page">Loading</a></li>
            </ul>

            <div class="tab-content bg">
                {{-- list user role --}}
                <div id="user_role" class="tab-pane fade in active">
                    <div class="table-responsive" style="padding: 20px 0;">
                        <table id="tb_user_role" class="table table-bordered table-condensed" style="min-width: 300px;">
                            <thead>
                            {{--<tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">status</th>
                                <th class="text-center">Action</th>
                            </tr>--}}
                            </thead>
                            <tbody>
                            {{--@foreach ($user_role_datas as $data)
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
                                        <a href="{{url($data->id)}}" class="btn btn-warning btn-xs col-xs-5 col-xs-offset-1 btn_update_user_role" data-toggle="tooltip" title="Update"><i class="fa fa-pencil"></i></a>
                                        <a href="{{url($data->id)}}" class="btn btn-danger btn-xs col-xs-5 col-xs-offset-1 btn_delete_user_role" data-toggle="tooltip" title="Delete"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            @endforeach--}}
                            </tbody>
                        </table>
                        {{--<table style="width: 100%;">
                            <tr>
                                --}}{{--<td class="col-sm-6 col-xs-8" style="min-width: 200px;">{{ $user_role_datas->render() }}</td>--}}{{--
                                <td class="col-sm-6 col-xs-8" style="min-width: 100px;">
                                    <form class="form-horizontal pull-right" role="form">
                                        <div class="form-group">
                                            <div class="col-sm-12 col-xs-12">
                                                <label for="sel1">Set Page:</label>
                                                <select class="form-control" id="pagination">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        </table>--}}
                    </div>
                </div>
                {{-- end list user role --}}
                {{-- loading page --}}
                <div id="loading_page" class="tab-pane fade">
                    <div class="table-responsive" style="padding: 20px 0; height: 200px;">
                        <table style="width: 100%;">
                            <img src="{{asset('images/ajax-loader1.gif')}}" class="center-block" style="padding-top: 30px;">
                        </table>
                    </div>
                </div>
                {{-- end loading page --}}
            </div>
        </div>


    </div>
    {{-- end list user & user role --}}

    {{-- add User role --}}
    <div class="row" id="l-add_user_role" style="display: none;">
        <div class="well">
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
                        <a href="#" class="btn btn-primary center-block" id="btn_add_user_role" style="max-width: 100px;">Save</a>
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
                        <input type="checkbox" name="u_status" id="u_status">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <a href="#" class="btn btn-primary center-block" id="btn_update_user_role" style="max-width: 100px;">Update</a>
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
                        <a href="#" class="btn btn-primary center-block" id="btn_delete_user_role" style="max-width: 100px;">Delete</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- end delete user role --}}
@endsection

@section('js')
    <script src="{{asset('backend/js/pages/user_role.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

@endsection