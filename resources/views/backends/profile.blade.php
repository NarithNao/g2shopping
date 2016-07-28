<?php
$user_session = \Illuminate\Support\Facades\Session::get('logged_in');
$user = App\User::find($user_session[0]['id']);
?>
@extends('layouts.admin_layout')

@section('css')

@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="text-primary">Profile</h3>
                </div>
                <div class="col-sm-6">
                    <div style="margin-top: 15px;">
                        <a href="{{url('admin/update_user_info/'.$user->id)}}" class="btn btn-primary col-xs-5 col-xs-offset-1" id="btn_user_update_info">Save</a>
                        {{--<a href="#" class="btn btn-primary col-xs-5 col-xs-offset-1">Save & Exit</a>--}}
                        <a href="{{url('admin/dashboard')}}" class="btn btn-primary col-xs-5 col-xs-offset-1">Cancel</a>
                    </div>

                </div>
                <hr width="100%">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="well">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#user_information">User Information</a></li>
                <li><a data-toggle="tab" href="#user_login_information">User Login Information</a></li>
            </ul>

            <div class="tab-content bg">
                <div id="user_information" class="tab-pane fade in active">
                    <form class="form-horizontal" role="form" method="POST" action="{{url('admin/update_user_info')}}" style="padding: 20px;" id="frm_user_update_info">
                        {{ csrf_field()  }}
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        {{--<input type="hidden" name="user_newsletter" value="{{$user->newsletter}}">--}}
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="username">Username:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" value="{{$user->username}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="firstname">Firstname:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter firstname" value="{{$user->firstname}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="lastname">Lastname:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter lastname" value="{{$user->lastname}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="country">Country:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="country" name="country" placeholder="Enter country" value="{{$user->country}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="city">City:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="city" name="city" placeholder="Enter city" value="{{$user->city}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="address">Address:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" value="{{$user->address}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="phone">Phone:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone" value="{{$user->phone}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2 col-xs-6" for="newsletter">Newsletter:</label>
                            <div class="col-sm-10 col-xs-6">
                                <input type="checkbox" name="newsletter" id="newsletter" {{$user->newsletter==1?'checked':''}}>
                            </div>
                        </div>
                        {{--<div class="form-group">
                            <label class="control-label col-sm-2" for="last_activity">Last activity:</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="last_activity" name="last_activity">
                            </div>
                        </div>--}}
                    </form>
                </div>
                <div id="user_login_information" class="tab-pane fade">
                    <form class="form-horizontal" role="form" style="padding: 20px;">
                        {{--<div class="form-group">
                            <label class="control-label col-sm-2" for="user_role">User Role:</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="user_role" name="user_role">

                                    <option value="1" {{$user->user_type_id==1?'selected':''}}>Admin</option>
                                    <option value="2" {{$user->user_type_id==2?'selected':''}}>Guest</option>
                                </select>
                            </div>
                        </div>--}}
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="user_role">Email:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="user_role" name="user_role" placeholder="Enter user role" value="{{$user->user_type_id==1?'Admin':'Guest'}}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Email:</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{$user->email}}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="password">Password:</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" value="{{$user->password}}" readonly>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('backend/js/pages/profile.js')}}"></script>
@endsection