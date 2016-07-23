@extends('layouts.admin_layout')

@section('css')

@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Profile</h2>
                </div>
                <div class="col-sm-6">
                    <div style="margin-top: 15px;">
                        <a href="#" class="btn btn-primary col-xs-5 col-xs-offset-1">Save</a>
                        <a href="#" class="btn btn-primary col-xs-5 col-xs-offset-1">Cancle</a>
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
                    {{--<form class="form-horizontal" role="form" style="padding: 20px;">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="username">Username:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="firstname">Firstname:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter firstname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="lastname">Lastname:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter lastname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="country">Country:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="country" name="country" placeholder="Enter country">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="address">Address:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="phone">Phone:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2 col-xs-6" for="status">Status:</label>
                            <div class="col-sm-10 col-xs-6">
                                <input type="checkbox" name="status" id="status">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2 col-xs-6" for="newsletter">Newsletter:</label>
                            <div class="col-sm-10 col-xs-6">
                                <input type="checkbox" name="newsletter" id="newsletter">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="last_activity">Last activity:</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="last_activity" name="last_activity">
                            </div>
                        </div>
                    </form>--}}
                </div>
                <div id="user_login_information" class="tab-pane fade">
                    {{--<form class="form-horizontal" role="form" style="padding: 20px;">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Email:</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="password">Password:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="password" name="password" placeholder="Enter password">
                            </div>
                        </div>
                    </form>--}}
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection