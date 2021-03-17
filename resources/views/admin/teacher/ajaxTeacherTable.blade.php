<table class="table table-striped">
	<thead>
		<tr class="table-head">
			<th scope="col">SL</th>
			<th scope="col">Teacher Name</th>
			<th scope="col">Name Code</th>
			<th scope="col">Designation</th>
			<th scope="col">Mobile Number</th>
			<th scope="col">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $i=1; ?>
		@foreach ($teachers as $key => $teacher)
		<tr>
			<th scope="row">{{$i++}}</th>
			<td>{{$teacher->teacher_name}}</td>
			<td>{{$teacher->name_code}}</td>
			<td>{{$teacher->designation}}</td>
			<td>{{$teacher->contact_number}}</td>
			<td>
				<a href="" class="updateTeacher text-success" data-toggle="modal" data-target="#modal{{$teacher->entity_id}}">
					<i class="fas fa-pencil-alt"></i>
				</a>
				<a href="{{$teacher->entity_id}}" class="removeTeacher text-danger ml-3">
					<i class="fas fa-trash-alt"></i>
				</a>
			</td>
			<!-- Modal -->
			<div class="modal fade" id="modal{{$teacher->entity_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalCenterTitle">{{__('Update Teacher Information')}}</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="{{route('teacher.update',session()->getId())}}" method="post">
							@csrf
							<div class="modal-body text-left">
								<input type="hidden" name="teacherId" class="teacherId" value="{{$teacher->entity_id}}">
								<div class="form-group">
									<label for="teacherName" class="required">{{__('Teacher Name')}}</label>
									<input type="text" id="teacherName" name="teacherName" class="form-control" value="{{$teacher->teacher_name}}">
								</div>
								<div class="form-group">
									<label for="teacherDesignation" class="required">{{__('Designation')}}</label>
									<input type="text" id="teacherDesignation" name="teacherDesignation" class="form-control" value="{{$teacher->designation}}">
								</div>
								<div class="form-group">
									<label for="teacherMobile" class="">{{__('Mobile number')}}</label>
									<input type="text" id="teacherMobile" name="teacherMobile" class="form-control" value="{{$teacher->contact_number}}">
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