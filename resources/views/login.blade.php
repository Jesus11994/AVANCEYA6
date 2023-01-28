<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>Login - HRMS admin template</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('/admintemp/img/anvanceya.jfif') }}">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('/admintemp/css/bootstrap.min.css') }}">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{asset('/admintemp/css/font-awesome.min.css') }}">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="{{asset('/admintemp/css/style.css') }}">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body class="account-page">
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
			<div class="account-content">
				<div class="container">
				
					<!-- Account Logo -->
					<div class="img-fluid">
						<img src="{{asset('/admintemp/img/LogoAvanceya02_transp.png') }}" alt="Dreamguy's Technologies">
					</div>
					<!-- /Account Logo -->
					
					<div class="account-box">
						<div class="account-wrapper">
							<h1 class="account-title">INGRESO DE CREDENCIALES </h1>
							<p class="account-subtitle">Acseso a tu panel de control</p>
							
							<!-- Account Form -->
							<form method="POST" action="{{route("back.in")}}">
								@csrf
								<div class="form-group">
									<label>Email Address</label>
									<input name="email" class="form-control" type="text">
									@error('email')
									<div class="alert alert-danger">Favor de ingresar su usuario</div>
								@enderror
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col">
											<label>Password</label>
										</div>
										{{--
										<div class="col-auto">
											<a class="text-muted" href="forgot-password.html">
												Forgot password?
											</a>
										</div>
										--}}
									</div>
									<input name="password" class="form-control" type="password">
									@error('password')
									<div class="alert alert-danger">Favor de ingresar su contraseña</div>
								@enderror
								</div>
								<div class="form-group text-center">
									<button class="btn btn-primary account-btn" type="submit" >Login</button>
								</div>
							</form>
							<!-- /Account Form -->
							
						</div>
					</div>
				</div>
			</div>
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="{{asset('/admintemp/js/jquery-3.5.1.min.js')}}"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="{{asset('/admintemp/js/popper.min.js')}}"></script>
        <script src="{{asset('/admintemp/js/bootstrap.min.js')}}"></script>
		
		<!-- Custom JS -->
		<script src="{{asset('/admintemp/js/app.js')}}"></script>
		
    </body>
</html>