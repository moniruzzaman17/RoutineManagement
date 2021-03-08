@extends('layouts.app')
@section('title', __('Group|cpscn Routine Management | Collectorate Public School & College, Nilphamari'))
@section('body-class', 'cpscn-admin-group')
@section('content')
<div class="container">
	<div class="group-body-wrapper">
		<div class="group-body">
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
					<h5 class="text-center">{{__('Add Group')}}</h5>
					<form action="{{route('group',session()->getId())}}" method="post">
						@csrf
						<div class="form-group">
							<label for="groupName" class="required">{{__('Group Name')}}</label>
							<input type="text" id="groupName" name="groupName" class="form-control">
						</div>
						<div class="form-group">
							<input type="submit" class="action-button" value="{{__('Add Group')}}">
						</div>
					</form>
				</div>
				<div class="col-sm-7 m-auto text-center">
					<h5>{{__('Class List')}}</h5>
					<div class="group-table">
						<div class="defaultGroup">
							@include('admin.group.ajaxGroupTable')
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection