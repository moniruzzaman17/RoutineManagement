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
<table class="table table-striped">
	<thead>
		<tr class="table-head">
			<th scope="col">SL</th>
			<th scope="col">Section</th>
			<th scope="col">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $i=1; ?>
		@foreach ($sections as $key => $section)
		<tr>
			<th scope="row">{{$i++}}</th>
			<td>{{$section->section_name}}</td>
			<td>
				<a href="" class="updateSection text-success" data-toggle="modal" data-target="#modal{{$section->entity_id}}">
					<i class="fas fa-pencil-alt"></i>
				</a>
				<a href="{{$section->entity_id}}" class="removeSection text-danger ml-3">
					<i class="fas fa-trash-alt"></i>
				</a>
			</td>
			<!-- Modal -->
			<div class="modal fade" id="modal{{$section->entity_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalCenterTitle">{{__('Update Section Information')}}</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="{{route('section.update',session()->getId())}}" method="post">
							@csrf
							<div class="modal-body text-left">
								<input type="hidden" name="sectionId" class="sectionId" value="{{$section->entity_id}}">
								<div class="form-group">
									<label for="sectionName" class="required">{{__('Section Name')}}</label>
									<input type="text" id="sectionName" name="sectionName" class="form-control" value="{{$section->section_name}}">
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn action-button">Save changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</tr>
		@endforeach
	</tbody>
</table>