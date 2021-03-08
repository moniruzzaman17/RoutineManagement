@extends('layouts.app')
@section('title', __('Room|cpscn Routine Management | Collectorate Public School & College, Nilphamari'))
@section('body-class', 'cpscn-admin-room')
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
					<h5 class="text-center">{{__('Add Class Room')}}</h5>
					<form action="{{route('room',session()->getId())}}" method="post">
						@csrf
						<div class="form-group">
							<label for="roomNo" class="required">{{__('Room Number')}}</label>
							<input type="text" id="roomNo" name="roomNo" class="form-control" value="{{ old('roomNo') }}">
						</div>
						<div class="form-group">
							<label for="roomFloor" class="required">{{__('Floor')}}</label>
							<select class="form-control" name="roomFloor" id="roomFloor" value="{{ old('roomFloor') }}">
								<option readonly required>Select Floor</option>
								<option value="Ground Floor">Ground Floor</option>
								<option value="1st">1st Floor</option>
								<option value="2nd">2nd II</option>
								<option value="3rd">Class III</option>
								<option value="4th">Class IV</option>
							</select>
						</div>
						<div class="form-group">
							<label for="roomBuilding" class="required">{{__('Building Name')}}</label>
							<input type="text" id="roomBuilding" name="roomBuilding" class="form-control" value="{{ old('roomBuilding') }}">
						</div>
						<div class="form-group">
							<label for="roomRemarks" class="">{{__('Remarks')}}</label>
							<input type="text" id="roomRemarks" name="roomRemarks" class="form-control" value="{{ old('roomRemarks') }}">
						</div>
						<div class="form-group">
							<input type="submit" class="action-button" value="{{__('Add Room Info')}}">
						</div>
					</form>
				</div>
				<div class="col-sm-7 m-auto text-center">
					<h5>{{__('Class Room List')}}</h5>
					<div class="room-table">
						<div class="defaultRoom">
							@include('admin.room.ajaxRoomTable')
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection