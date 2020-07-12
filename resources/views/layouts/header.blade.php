<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>AdminLTE 3 | Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name='csrf-token' content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/ionicons.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/tempusdominus-bootstrap-4.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/icheck-bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/adminlte.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/OverlayScrollbars.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/summernote-bs4.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/toastr.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/common.css')}}">

	<script>
		var baseUrl = {!! json_encode(url("/")) !!}
	</script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">

		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
			</ul>

			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="#">
						<i class="far fa-bell"></i>
						<span class="badge badge-warning navbar-badge">15</span>
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						<span class="dropdown-item dropdown-header">15 Notifications</span>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<i class="fas fa-envelope mr-2"></i> 4 new messages
							<span class="float-right text-muted text-sm">3 mins</span>
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<i class="fas fa-users mr-2"></i> 8 friend requests
							<span class="float-right text-muted text-sm">12 hours</span>
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<i class="fas fa-file mr-2"></i> 3 new reports
							<span class="float-right text-muted text-sm">2 days</span>
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
					</div>
				</li>
			</ul>
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="/profile" class="brand-link">
				<img src="{{asset('assets/images/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
				style="opacity: .8">
				<span class="brand-text font-weight-light">AdminLTE</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user panel (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<img src="{{asset('/storage/assets/images/profile-pic/')}}/{{auth()->user()->profile_pic}}" class="img-circle elevation-2" alt="User Image">
					</div>
					<div class="info">
						<a href="/profile" class="d-block">{{auth()->user()->name}}</a>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
          	with font-awesome or any other icon font library -->
          	<li class="nav-item has-treeview {{ request()->is('customer*') ? 'menu-open' : '' }}">
          		<a href="#" class="nav-link {{ request()->is('customer*') ? 'active' : '' }}">
          			<i class="nav-icon fas fa-child"></i>
          			<p>
          				Customer
          				<i class="right fas fa-angle-left"></i>
          			</p>
          		</a>
          		<ul class="nav nav-treeview">
          			<li class="nav-item">
          				<a href="/customer" class="nav-link {{ request()->is('customer') ? 'active' : '' }}">
          					<i class="far fa-circle nav-icon"></i>
          					<p>Customer List</p>
          				</a>
          			</li>
          			<li class="nav-item">
          				<a href="/customer/add-customer" class="nav-link {{ request()->is('customer/add-customer') ? 'active' : '' }}">
          					<i class="far fa-circle nav-icon"></i>
          					<p>Add Customer</p>
          				</a>
          			</li>
          		</ul>
          	</li>
          	<li class="nav-item">
          		<a href="/logout" class="nav-link">
          			<i class="fas fa-sign-out-alt"></i>
          			<p>Logout</p>
          		</a>
          	</li>
          </ul>
      </nav>
  </div>
</aside>

<div class="content-wrapper">