@extends('layouts.layout')

@section('content')

        <!--banner-->
<div class="banner-top">
    <div class="container">
        <h1>Profile</h1>
        <em></em>
        <h2><a href="{{url('index')}}">Home</a><label>/</label>Profile</h2>
    </div>
</div>
<!--login-->
<div class="container">
    <div class="check-out">
        <div class="panel panel-default">
            <div class="panel-heading">Change Profile Image</div>
            <div class="panel-body">
                <div class="col-sm-4 col-sm-offset-4">
                    <img src="{{url('images/profile/profile.png')}}" class="img-rounded center-block" alt="Cinque Terre" width="200">
                    <a href="#" class="btn btn-primary btn-block">Change Image</a>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">Personal Information</div>
            <div class="panel-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="username">username</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="username" type="text" value="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="email" type="email" value="narithnao@gmail.com" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="firstname">Firstname:</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="firstname" placeholder="Firstname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="lastname">Lastname:</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="lastname" placeholder="Lastname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="contact">phone number:</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="contact" placeholder="Phone number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="address">Address:</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="address" placeholder="Adress">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Update Information</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">Change Password</div>
            <div class="panel-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="current_password">Current Password:</label>
                        <div class="col-sm-7">
                            <input class="form-control" id="cur_password" type="password" value="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="new_password">New Password:</label>
                        <div class="col-sm-7">
                            <input class="form-control" id="new_password" type="new_password" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="con_new_password">Verify New Password:</label>
                        <div class="col-sm-7">
                            <input class="form-control" id="con_new_password" type="con_new_password" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-10">
                            <button type="submit" class="btn btn-default">Update Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--//login-->
@endsection