<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>G2Shopping Admin</title>

	<!-- Bootstrap Core CSS -->
	<link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" media="all">

	<!-- MetisMenu CSS -->
	<link href="{{asset('backend/bower_components/metisMenu/metisMenu.css')}}" rel="stylesheet" type="text/css" media="all">

	<!-- Custom CSS -->
	<link href="{{asset('backend/bower_components/sb-admin/sb-admin-2.css')}}" rel="stylesheet" type="text/css" media="all">

	<!-- Custom Fonts -->
	{{--<link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">--}}

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body>

<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title text-center">G2Shopping Login</h3>
				</div>
				<div class="panel-body">
					<form role="form" method="POST" action="{{url('admin/login')}}">
						{{ csrf_field() }}
						<div class="form-group">
							<input class="form-control" placeholder="E-mail" name="email" type="email" required autofocus>
						</div>
						<div class="form-group">
							<input class="form-control" placeholder="Password" name="password" type="password" value="" required>
						</div>

						<input type="submit" class="btn btn-success btn-block" value="Login">

					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- jQuery -->
<script src="{{asset('jquery/jquery.min.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>

<!-- Metis Menu Plugin JavaScript -->
{{--<script src="{{asset('backend/bower_components/metisMenu/metisMenu.js')}}"></script>--}}

<!-- Custom Theme JavaScript -->
{{--<script src="{{asset('backend/bower_components/sb-admin/sb-admin-2.js')}}"></script>--}}


</body>

</html>
