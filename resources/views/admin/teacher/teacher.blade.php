@extends('layouts.app')
@section('title', __('Teacher|cpscn Routine Management | Collectorate Public School & College, Nilphamari'))
@section('body-class', 'cpscn-admin-teacher')
@section('content')
<div class="container">
	<div class="teacher-body-wrapper">
		<div class="teacher-body">
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
					<h5 class="text-center">{{__('Add Teacher')}}</h5>
					<form action="{{route('teacher',session()->getId())}}" method="post">
						@csrf
						<div class="form-group">
							<label for="teacherName" class="required">{{__('Teacher Name')}}</label>
							<input type="text" id="teacherName" name="teacherName" class="form-control">
						</div>
						<div class="form-group">
							<label for="teacherDesignation" class="required">{{__('Designation')}}</label>
							<input type="text" id="teacherDesignation" name="teacherDesignation" class="form-control">
						</div>
						<div class="form-group">
							<label for="teacherMobile" class="">{{__('Mobile')}}</label>
							<input type="text" id="teacherMobile" name="teacherMobile" class="form-control">
						</div>
						<div class="form-group">
							<input type="submit" class="action-button" value="{{__('Add Teacher')}}">
						</div>
					</form>
				</div>
				<div class="col-sm-7 m-auto text-center">
					<h5>{{__('Teacher List')}}</h5>
					<div class="teacher-table">
						<div class="defaultTeacher">
							@include('admin.teacher.ajaxTeacherTable')
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection