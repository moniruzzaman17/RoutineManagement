@extends('layouts.app')
@section('title', __('Shift|cpscn Routine Management | Collectorate Public School & College, Nilphamari'))
@section('body-class', 'cpscn-admin-shift')
@section('content')
<div class="container">
	<div class="shift-body-wrapper">
		<div class="shift-body">
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
					<h5 class="text-center">{{__('Add Shift')}}</h5>
					<form action="{{route('shift',session()->getId())}}" method="post">
						@csrf
						<div class="form-group">
							<label for="shiftName" class="required">Shift</label>
							<input type="text" id="shiftName" name="shiftName" class="form-control">
						</div>
						<div class="form-group">
							<input type="submit" class="action-button" value="{{__('Add Shift')}}">
						</div>
					</form>
				</div>
				<div class="col-sm-7 m-auto text-center">
					<h5>{{__('Shift List')}}</h5>
					<div class="shift-table">
						<div class="defaultShift">
							@include('admin.shift.ajaxtable')
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection