@extends('layouts.app')
@section('title', __('Subject Assign to Group|cpscn Routine Management | Collectorate Public School & College, Nilphamari'))
@section('body-class', 'cpscn-admin-subject')
@section('content')
<div class="container">
	<div class="subject-body-wrapper">
		<div class="subject-body">
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
					<h5 class="text-center">{{__('Add Subject')}}</h5>
					<form action="{{route('subject.assignto.group',session()->getId())}}" method="post">
						@csrf
						<div class="form-group">
							<label for="subjectCode" class="">{{__('Subject Code')}}</label>
							<input type="text" id="subjectCode" name="subjectCode" class="form-control">
						</div>
						<div class="form-group">
							<label for="subjectName" class="required">{{__('Subject Name')}}</label>
							<input type="text" id="subjectName" name="subjectName" class="form-control">
						</div>
						<div class="form-group">
							<label for="subjectDesc" class="">{{__('Description')}}</label>
							<input type="text" id="subjectDesc" name="subjectDesc" class="form-control">
						</div>
						<div class="form-group">
							<input type="submit" class="action-button" value="{{__('Add Subject')}}">
						</div>
					</form>
				</div>
				<div class="col-sm-7 m-auto text-center">
					<h5>{{__('Class List')}}</h5>
					<div class="subject-table">
						<div class="defaultSubject">
							@include('admin.subject.ajaxSubjectTable')
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection