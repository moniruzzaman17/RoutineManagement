@extends('layouts.app')
@section('title', __('Section|cpscn Routine Management | Collectorate Public School & College, Nilphamari'))
@section('body-class', 'cpscn-admin-section')
@section('content')
<div class="container">
	<div class="section-body-wrapper">
		<div class="section-body">
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
					<h5 class="text-center">{{__('Add Section')}}</h5>
					<form action="{{route('section',session()->getId())}}" method="post">
						@csrf
						<div class="form-group">
							<label for="sectionName" class="required">{{__('Section Name')}}</label>
							<input type="text" id="inputSectionName" name="sectionName" class="form-control">
						</div>
						<div class="form-group">
							<label for="sectionName" class="required">{{__('Select')}}</label>
							<select class="form-control" name="class" required>
								@foreach ($classes as $key => $class)
								<option value="{{$class->entity_id}}">{{$class->class_name}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<input type="submit" class="action-button" value="{{__('Add Section')}}">
						</div>
					</form>
				</div>
				<div class="col-sm-7 m-auto text-center">
					<h5>{{__('Section List')}}</h5>
					<div class="form-group">
						<label for="sectionName" class="required">{{__('Class Wise Section')}}</label>
						<select class="form-control" name="class" id="classWiseSection">
							<option value="0">All Classes</option>
							@foreach ($sectionsDistinct as $key => $section)
							<option value="{{$section->class_id}}">{{$section->class->class_name}}</option>
							@endforeach
						</select>
					</div>
					<div class="section-table">
						<div class="defaultSection">
							@include('admin.section.ajaxSectionTable')
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection