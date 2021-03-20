@extends('layouts.app')
@section('title', __('Assig Group to Class |cpscn Routine Management | Collectorate Public School & College, Nilphamari'))
@section('body-class', 'cpscn-admin-assigngrouptoclass')
@section('content')
<div class="container">
	<div class="class-body-wrapper">
		<div class="class-body">
			@if(session()->has('success'))
			<div class="alert alert-success" role="alert">
				<i class="fa fa-check" aria-hidden="true"></i> {{ session()->get('success') }}
			</div>
			@endif
			@if(session()->has('failed'))
			<div class="alert alert-danger" role="alert">
				<i class="fa fa-times" aria-hidden="true"></i> {{ session()->get('failed') }}
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
					<h5 class="text-center">{{__('Assign Group to Class')}}</h5>
					<form action="{{route('assign.group.class',session()->getId())}}" method="post">
						@csrf
						<div class="form-group">
							<label for="dependentGroup" class="required">Class</label>
							<select class="form-control" name="class_id" id="dependentGroup">
								<option class="d-none">Select Class</option>
								@foreach ($classes as $key => $class)
								<option value="{{$class->entity_id}}">{{$class->class_name}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group dependentGroup">
						</div>
						<div class="form-group">
							<input type="submit" class="action-button" value="{{__('Add Class')}}">
						</div>
					</form>
				</div>
				<div class="col-sm-7 m-auto text-center">
					<h5>{{__('Assigned Class list')}}</h5>
					<div class="grouptoclass-table">
						<div class="defaultGrouptoclass">
							@include('admin.assign.ajaxGrouptoclass')
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection