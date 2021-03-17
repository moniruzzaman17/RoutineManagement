@extends('layouts.app')
@section('title', __('Period|cpscn Routine Management | Collectorate Public School & College, Nilphamari'))
@section('body-class', 'cpscn-admin-period')
@section('content')
<div class="container">
	<div class="room-body-wrapper">
		<div class="room-body">
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
					<h5 class="text-center">{{__('Add Period')}}</h5>
					<form action="{{route('period',session()->getId())}}" method="post">
						@csrf
						<div class="form-group">
							<label for="periodName" class="required">{{__('Period Name')}}</label>
							<input type="text" id="periodName" name="periodName" class="form-control" value="{{ old('periodName') }}" placeholder="eg: 1st">
						</div>
						<div class="form-group">
							<div class="md-form">
								<label for="startTime" class="required">{{__('Select Start Time')}}</label>
								<input placeholder="Selected time" type="time" id="startTime" name="startTime" class="form-control" value="{{ old('startTime') }}">
							</div>
						</div>
						<div class="form-group">
							<label for="duration" class="required">{{__('Period Duration (Minute)')}}</label>
							<input type="number" id="duration" name="duration" class="form-control" value="{{ old('duration') }}">
						</div>
						<div class="form-group">
							<label for="shift" class="required">{{__('Select')}}</label>
							<select class="form-control" name="shift" required>
								@foreach ($shifts as $key => $shift)
								<option value="{{$shift->entity_id}}">{{$shift->shift_name}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="remarks" class="">{{__('Remarks (if any)')}}</label>
							<input type="text" id="remarks" name="remarks" class="form-control" value="{{ old('remarks') }}">
						</div>
						<div class="form-group">
							<input type="submit" class="action-button" value="{{__('Add Period Info')}}">
						</div>
					</form>
				</div>
				<div class="col-sm-7 m-auto text-center">
					<h5>{{__('Period List')}}</h5>
					<div class="period-table">
						<div class="defaultPeriod">
							@include('admin.period.ajaxPeriodTable')
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection