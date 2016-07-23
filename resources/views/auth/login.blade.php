@extends('layouts.layout')

@section('content')

<!--banner-->
<div class="banner-top">
    <div class="container">
        <h1>Login</h1>
        <em></em>
        <h2><a href="{{url('index')}}">Home</a><label>/</label>Login</h2>
    </div>
</div>
<!--login-->
<div class="container">
    <div class="login">
        <form>
            <div class="col-md-6 col-md-offset-3 login-do">
                <div class="login-mail">
                    <input type="text" placeholder="Email" required="">
                    <i  class="glyphicon glyphicon-envelope"></i>
                </div>
                <div class="login-mail">
                    <input type="password" placeholder="Password" required="">
                    <i class="glyphicon glyphicon-lock"></i>
                </div>
                {{--<a class="news-letter " href="#">
                    <label class="checkbox1"><input type="checkbox" name="checkbox" ><i> </i>Forget Password</label>
                </a>--}}
                <div class="text-center">
                    <label class="hvr-skew-backward">
                        <input type="submit" class="center-block" value="login">
                    </label>
                </div>
            </div>
            {{--<div class="col-md-6 login-right">
                 <h3>Completely Free Account</h3>
                 <p>Pellentesque neque leo, dictum sit amet accumsan non, dignissim ac mauris. Mauris rhoncus, lectus tincidunt tempus aliquam, odio
                 libero tincidunt metus, sed euismod elit enim ut mi. Nulla porttitor et dolor sed condimentum. Praesent porttitor lorem dui, in pulvinar enim rhoncus vitae. Curabitur tincidunt, turpis ac lobortis hendrerit, ex elit vestibulum est, at faucibus erat ligula non neque.</p>
                <a href="{{url('register')}}" class=" hvr-skew-backward">Register</a>
            </div>--}}
            <div class="clearfix"> </div>
        </form>
    </div>
</div>
<!--//login-->
@endsection