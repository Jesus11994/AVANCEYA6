<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">	
        <title>ADMIN</title>
		
				<!-- Favicon -->
				<link rel="shortcut icon" type="image/x-icon" href="{{asset('/admintemp/img/favicon.png') }}">
		
				<!-- Bootstrap CSS -->
				<link rel="stylesheet" href="{{asset('/admintemp/css/bootstrap.min.css') }}">
				
				<!-- Fontawesome CSS -->
				<link rel="stylesheet" href="{{asset('/admintemp/css/font-awesome.min.css') }}">
				
				<!-- Lineawesome CSS -->
				<link rel="stylesheet" href="{{asset('/admintemp/css/line-awesome.min.css') }}">
				
				<!-- Datatable CSS -->
				<link rel="stylesheet" href="{{asset('/admintemp/css/dataTables.bootstrap4.min.css') }}">
				
				<!-- Select2 CSS -->
				<link rel="stylesheet" href="{{asset('/admintemp/css/select2.min.css') }}">
				
				<!-- Datetimepicker CSS -->
				<link rel="stylesheet" href="{{asset('/admintemp/css/bootstrap-datetimepicker.min.css') }}">
				
				<!-- Main CSS -->
				<link rel="stylesheet" href="{{asset('/admintemp/css/style.css') }}">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>
	<!-- Main Wrapper -->
	<div class="main-wrapper">
		
		<!-- Header -->
		<div class="header">
		
		
			
			<a id="toggle_btn" href="javascript:void(0);">
				<span class="bar-icon">
					<span></span>
					<span></span>
					<span></span>
				</span>
			</a>
			
			<!-- Header Title -->
			<div class="page-title-box">
				<h3>Avanceya Consultores Empresariales</h3>
			</div>
			<!-- /Header Title -->
			
			<a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>
			
			<!-- Header Menu -->
			<ul class="nav user-menu">
			
			
				

				<li class="nav-item dropdown has-arrow main-drop">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
						<span class="user-img"><img src="{{asset('/admintemp/img/profiles/avatar17.png') }}" alt="">
						<span class="status online"></span></span>
						<span>{{ auth()->user()->name }}</span>
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="profile.html">My Profile</a>
						<a class="dropdown-item" href="settings.html">Settings</a>
						<a class="dropdown-item" href="{{ route('back.logau') }}">Logout</a>

						
					</div>

				</li>
			</ul>
			<!-- /Header Menu -->
			
			<!-- Mobile Menu -->
			<div class="dropdown mobile-user-menu">
				<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
				<div class="dropdown-menu dropdown-menu-right">
					<a class="dropdown-item" href="profile.html">My Profile</a>
					<a class="dropdown-item" href="settings.html">Settings</a>
					<a class="dropdown-item" href="login.html">Logout</a>
				</div>
			</div>
			<!-- /Mobile Menu -->
			
		</div>
		<!-- /Header -->
		
		<!-- Sidebar -->
		<div class="sidebar" id="sidebar">
			<div class="sidebar-inner slimscroll">
				<div id="sidebar-menu" class="sidebar-menu">
					<ul>
						<li class="menu-title"> 
							<span>Main</span>
						</li>
						<li class="submenu">
							<a href="#"><i class="la la-dashboard"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="{{route("back.index")}}">Home</a></li>
							</ul>
						</li>
						<li class="menu-title"> 
							<span>Participantes</span>
						</li>
						
						@switch(auth()->user()->id)
						@case(3)
						<li class="submenu">
							<a href="#" class="noti-dot"><i class="la la-user"></i> <span> Participantes</span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a class="active" href="{{route("back.listar")}}" >Lista Participantes <span class="badge badge-pill bg-primary float-right">1</span></a></li>
					
							</ul>
						</li>
						@break
						@case(4)
						<li class="submenu">
							<a href="#" class="noti-dot"><i class="la la-user"></i> <span> Participantes</span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a class="active" href="{{route("back.listar")}}" >Lista Participantes <span class="badge badge-pill bg-primary float-right">1</span></a></li>
					
							</ul>
						</li>
						@break
						@case(5)
						<li> 
							<a href="{{route("back.busca")}}" ><i class="la la-ticket"></i> <span>Tickets</span></a>
						</li>
						@break
						@case(6)
						<li> 
							<a href="{{route("back.busca")}}" ><i class="la la-ticket"></i> <span>Tickets</span></a>
						</li>
						@break
						@case(7)
						<li> 
							<a href="{{route("back.busca")}}" ><i class="la la-ticket"></i> <span>Tickets</span></a>
						</li>
						@break
						@default
						<li class="submenu">
							<a href="#" class="noti-dot"><i class="la la-user"></i> <span> Participantes</span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a class="active" href="{{route("back.listar")}}" >Lista Participantes <span class="badge badge-pill bg-primary float-right">1</span></a></li>
					
							</ul>
						</li>
						
						<li> 
							<a href="{{route("back.busca")}}" ><i class="la la-ticket"></i> <span>Tickets</span></a>
						</li>
						<li> 
							<a href="{{route("back.confirm")}}" ><i class="la la-users"></i> <span>Confirmados</span></a>
						</li>
						
						@endswitch

						
					
					</ul>
				</div>
			</div>
		</div>
		<!-- /Sidebar -->
		
		<!-- Page Wrapper -->
		<div class="page-wrapper">
		
			@yield('participante')
			
			
		</div>
		<!-- /Page Wrapper -->

	</div>
	<!-- /Main Wrapper -->

	<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="{{asset('/admintemp/js/jquery-3.5.1.min.js') }}"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="{{asset('/admintemp/js/popper.min.js') }}"></script>
        <script src="{{asset('/admintemp/js/bootstrap.min.js') }}"></script>
		
		<!-- Slimscroll JS -->
		<script src="{{asset('/admintemp/js/jquery.slimscroll.min.js') }}"></script>
		
		<!-- Datatable JS -->
		<script src="{{asset('/admintemp/js/jquery.dataTables.min.js') }}"></script>
		<script src="{{asset('/admintemp/js/dataTables.bootstrap4.min.js') }}"></script>
		
		<!-- Select2 JS -->
		<script src="{{asset('/admintemp/js/select2.min.js') }}"></script>
		
		<!-- Datetimepicker JS -->
		<script src="{{asset('/admintemp/js/moment.min.js') }}"></script>
		<script src="{{asset('/admintemp/js/bootstrap-datetimepicker.min.js') }}"></script>
		
		<!-- Custom JS -->
		<script src="{{asset('/admintemp/js/app.js') }}"></script>

		

	
    </body>
</html>