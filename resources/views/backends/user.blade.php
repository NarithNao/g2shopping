@extends('layouts.admin_layout')

@section('css')
    <style>
        @media (max-width: 900px){
            .table-responsive {
                min-height: .01%;
                overflow-x: auto;
            }
        }
    </style>
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
                        <a href="#" class="btn btn-primary col-xs-5 col-xs-offset-1 pull-right" id="b-add_user" style="min-width: 100px; max-width: 150px;">Add User</a>
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
            <ul class="nav nav-tabs ">
                <li id="tab-user" class="active"><a data-toggle="tab" href="#user_list">Users List</a></li>
                <li id="tab-loading" class="hidden"><a data-toggle="tab" href="#loading_page">Loading</a></li>
            </ul>

            <div class="tab-content bg">
                {{-- list user --}}
                <div id="user_list" class="tab-pane fade in active">
                    <div class="table-responsive" style="padding: 20px 0;">
                        <table id="tb_user" class="table table-bordered" style="">
                            <thead>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- end list user --}}
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
    {{-- end list user --}}

    {{-- add User --}}
    <div class="row" id="l-add_user" style="display: none;">
        <div class="well">
            <div class="page-header text-center text-info" style="margin-top: -20px;">
                <h3>Add User</h3>
            </div>
            <form class="form-horizontal" role="form" method="POST" action="{{url('admin/add_user')}}" style="padding: 20px 0;">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="control-label col-sm-3" for="a_user_user_role">User role: <sup class="text-danger">*</sup></label>
                    <div class="col-sm-9">
                        <select class="form-control" id="a_user_user_role"></select>
                        {{--<input type="text" class="form-control" id="a_user_user_role" name="a_user_user_role" placeholder="Enter User Role">--}}
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="a_user_username">Username: <sup class="text-danger">*</sup></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="a_user_username" name="a_user_username" placeholder="Enter Username">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="a_user_email">Email: <sup class="text-danger">*</sup></label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="a_user_email" name="a_user_email" placeholder="Enter Email">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="a_user_pwd">Password: <sup class="text-danger">*</sup></label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="a_user_pwd" name="a_user_pwd" placeholder="Enter Password">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="a_user_firstname">Firstname:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="a_user_firstname" name="a_user_firstname" placeholder="Enter Firstname">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="a_user_lastname">Lastname:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="a_user_lastname" name="a_user_lastname" placeholder="Enter Lastname">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="a_user_country">Country: <sup class="text-danger">*</sup></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="a_user_country" name="a_user_country" placeholder="Enter Country">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="a_user_city">City: <sup class="text-danger">*</sup></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="a_user_city" name="a_user_city" placeholder="Enter City">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="a_user_address">Address:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="a_user_address" name="a_user_address" placeholder="Enter Address">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="a_user_phone">Phone: <sup class="text-danger">*</sup></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="a_user_phone" name="a_user_phone" placeholder="Enter Phone">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3 col-xs-6" for="a_user_newsletter">Receive Newsletter:</label>
                    <div class="col-sm-9 col-xs-6">
                        <input type="checkbox" name="a_user_newsletter" id="a_user_newsletter">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <a href="#" class="btn btn-primary center-block" id="btn_add_user" style="max-width: 100px;">Save</a>
                        {{--<input type="submit" class="btn btn-primary center-block" value="Save">--}}
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- end add user --}}

    {{-- update User --}}
    <div class="row" id="l-edit_user" style="display: none;">
        <div class="well">
            <div class="page-header text-center text-info" style="margin-top: -20px;">
                <h3>Update User</h3>
            </div>
            <form class="form-horizontal" role="form" method="POST" action="{{url('admin/update_user')}}" style="padding: 20px 0;">
                {{ csrf_field() }}
                <input type="hidden" id="u_user_id" name="u_user_id" >
                <div class="form-group">
                    <label class="control-label col-sm-3" for="u_user_user_role">User role: <sup class="text-danger">*</sup></label>
                    <div class="col-sm-9">
                        <select class="form-control" id="u_user_user_role"></select>
                    </div>
                    <div class="col-sm-9">
                        <select class="form-control hidden" id="u_user_user_role_list"></select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="u_user_username">Username: <sup class="text-danger">*</sup></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="u_user_username" name="u_user_username" placeholder="Enter Username">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="u_user_email">Email: <sup class="text-danger">*</sup></label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="u_user_email" name="u_user_email" placeholder="Enter Email" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="u_user_firstname">Firstname:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="u_user_firstname" name="u_user_firstname" placeholder="Enter Firstname">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="u_user_lastname">Lastname:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="u_user_lastname" name="u_user_lastname" placeholder="Enter Lastname">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="u_user_country">Country: <sup class="text-danger">*</sup></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="u_user_country" name="u_user_country" placeholder="Enter Country">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="u_user_city">City: <sup class="text-danger">*</sup></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="u_user_city" name="u_user_city" placeholder="Enter City">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="u_user_address">Address:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="u_user_address" name="u_user_address" placeholder="Enter Address">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="u_user_phone">Phone: <sup class="text-danger">*</sup></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="u_user_phone" name="u_user_phone" placeholder="Enter Phone">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3 col-xs-6" for="u_user_newsletter">Receive Newsletter:</label>
                    <div class="col-sm-9 col-xs-6">
                        <input type="checkbox" name="u_user_newsletter" id="u_user_newsletter">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3 col-xs-6" for="u_user_status">Status:</label>
                    <div class="col-sm-9 col-xs-6">
                        <input type="checkbox" name="u_user_status" id="u_user_status">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <a href="#" class="btn btn-primary center-block" id="btn_update_user" style="max-width: 100px;">Update</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- end update user --}}

@endsection

@section('js')
    <script src="{{asset('backend/js/pages/user.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

@endsection