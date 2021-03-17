@extends('layouts.app')
@section('title', __('Profile|cpscn Routine Management | Collectorate Public School & College, Nilphamari'))
@section('body-class', 'cpscn-admin-profile')
@section('content')
<div class="container">
	<div class="profile-body-wrapper">
		<div class="profile-body">
			@if(session()->has('success'))
			<div class="alert alert-success" role="alert">
				<i class="fa fa-check" aria-hidden="true"></i> {{ session()->get('success') }}
			</div>
			@endif
			@if(session()->has('error'))
			<div class="alert alert-danger" role="alert">
				<i class="fa fa-times" aria-hidden="true"></i> {{ session()->get('error') }}
			</div>
			@endif
			@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $message)
					<li>{{ $message }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			<div class="row w-100 mt-3">
				<div class="col-sm-5">
					<h5 class="text-center">{{__('Add Admin')}}</h5>
					<form action="{{route('profile',session()->getId())}}" method="post">
						@csrf
						<div class="form-group">
							<label for="adminName" class="required">{{__('Admin Name')}}</label>
							<input type="text" id="adminName" name="adminName" class="form-control">
						</div>
						<div class="form-group">
							<label for="adminEmail" class="required">{{__('Email')}}</label>
							<input type="email" id="adminEmail" name="adminEmail" class="form-control">
						</div>
						<div class="form-group">
							<label for="adminPass" class="required">{{__('New Password')}}</label>
							<input type="password" id="adminPass" name="adminPass" class="form-control">
						</div>
						<div class="form-group">
							<input type="submit" class="action-button" value="{{__('Add Admin')}}">
						</div>
					</form>
				</div>
				<div class="col-sm-7 m-auto text-center">
					<h5>{{__('Admin List')}}</h5>
					<div class="admin-table">
						<div class="defaultAdmin">
							@include('admin.profile.ajaxProfileTable')
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection