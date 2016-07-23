@extends('layouts.layout')

@section('content')

        <!--banner-->
<div class="banner-top">
    <div class="container">
        <h1>Register</h1>
        <em></em>
        <h2><a href="{{url('index')}}">Home</a><label>/</label>Register</h2>
    </div>
</div>
<!--login-->
<div class="container">
    <div class="login">
        <form>
            <div class="col-md-6 col-md-offset-3 login-do">
                <div class="login-mail">
                    <input type="text" placeholder="Name" required="">
                    <i  class="glyphicon glyphicon-user"></i>
                </div>
                <div class="login-mail">
                    <input type="text" placeholder="Phone Number" required="">
                    <i  class="glyphicon glyphicon-phone"></i>
                </div>
                <div class="login-mail">
                    <input type="text" placeholder="Email" required="">
                    <i  class="glyphicon glyphicon-envelope"></i>
                </div>
                <div class="login-mail">
                    <input type="password" placeholder="Password" required="">
                    <i class="glyphicon glyphicon-lock"></i>
                </div>
                <div class="text-center">
                    <label class="hvr-skew-backward">
                        <input type="submit" class="center-block" value="Register">
                    </label>
                </div>
            </div>
            <div class="clearfix"> </div>
        </form>
    </div>
</div>
<!--//login-->
@endsection