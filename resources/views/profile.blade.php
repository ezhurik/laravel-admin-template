@extends('layouts.main-template')

@section('content')

<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Profile</h1>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>
<section class="content">

	@if(count($errors) > 0)
		@foreach($errors->all() as $error)
			<div class="alert alert-danger">
				{{$error}}
			</div>
		@endforeach
	@endif
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3">
				<div class="card card-primary card-outline">
					<div class="card-body box-profile">
						<div class="text-center">
							<img class="profile-user-img img-fluid img-circle"
							src="{{asset('/storage/assets/images/profile-pic/')}}/{{auth()->user()->profile_pic}}"
							alt="User profile picture">
						</div>

						<h3 class="profile-username text-center pt-2">{{auth()->user()->name}}</h3>

						<p class="text-muted text-center">{{auth()->user()->email}}</p>
					</div>
				</div>
				
			</div>
			<div class="col-md-9">
				<div class="card">
					<div class="card-body">
						<form class="form-horizontal" id="profileForm" name="profileForm" method="post" action="/updateProfile" enctype="multipart/form-data">
							 @csrf
							<div class="form-group row">
								<label for="username" class="col-sm-4 col-form-label">Username <span class="required-span">*</span></label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{auth()->user()->name}}">
								</div>
							</div>
							<div class="form-group row">
								<label for="email" class="col-sm-4 col-form-label">Email <span class="required-span">*</span></label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{auth()->user()->email}}">
								</div>
							</div>
							<div class="form-group row">
								<label for="password" class="col-sm-4 col-form-label">Password <span class="required-span">*</span></label>
								<div class="col-sm-8">
									<input type="password" class="form-control" id="password" name="password" placeholder="Password">
								</div>
							</div>
							<div class="form-group row">
								<label for="cnfpassword" class="col-sm-4 col-form-label">Confirm Password <span class="required-span">*</span></label>
								<div class="col-sm-8">
									<input type="password" class="form-control" id="cnfpassword" name="cnfpassword" placeholder="Confirm Password">
								</div>
							</div>
							<div class="form-group row">
								<label for="profilePic" class="col-sm-4 col-form-label">Profile Pic</label>
								<div class="col-sm-8">
									<input type="file" class="form-control" id="profilePic" name="profilePic" placeholder="Name">
								</div>
							</div>
							<div class="form-group row">
								<div class="offset-sm-4 col-sm-10">
									<button type="submit" class="btn btn-danger">Submit</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection()