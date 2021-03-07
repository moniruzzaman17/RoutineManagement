@extends('layouts.app')
@section('title', __('Class|cpscn Routine Management | Collectorate Public School & College, Nilphamari'))
@section('body-class', 'cpscn-admin-class')
@section('content')
<div class="container">
	<div class="class-body-wrapper">
		<div class="class-body">
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
					<h5 class="text-center">{{__('Add Class')}}</h5>
					<form action="{{route('class',session()->getId())}}" method="post">
						@csrf
						<div class="form-group">
							<label for="className" class="required">Class</label>
							<input type="text" id="className" name="className" class="form-control">
						</div>
						<div class="form-group">
							<input type="submit" class="action-button" value="{{__('Add Class')}}">
						</div>
					</form>
				</div>
				<div class="col-sm-7 m-auto text-center">
					<h5>{{__('Class List')}}</h5>
					<div class="class-table">
						<div class="defaultClass">
							@include('admin.classes.ajaxClassTable')
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection