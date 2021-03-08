<table class="table table-striped">
	<thead>
		<tr class="table-head">
			<th scope="col">SL</th>
			<th scope="col">Subject Code</th>
			<th scope="col">Subject Name</th>
			<th scope="col">Description</th>
			<th scope="col">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $i=1; ?>
		@foreach ($subjects as $key => $subject)
		<tr>
			<th scope="row">{{$i++}}</th>
			<td>{{$subject->subject_code}}</td>
			<td>{{$subject->subject_name}}</td>
			<td>{{$subject->subject_description}}</td>
			<td>
				<a href="" class="updateSubject text-success" data-toggle="modal" data-target="#modal{{$subject->entity_id}}">
					<i class="fas fa-pencil-alt"></i>
				</a>
				<a href="{{$subject->entity_id}}" class="removeSubject text-danger ml-3">
					<i class="fas fa-trash-alt"></i>
				</a>
			</td>
			<!-- Modal -->
			<div class="modal fade" id="modal{{$subject->entity_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalCenterTitle">{{__('Update Subject Information')}}</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="{{route('subject.update',session()->getId())}}" method="post">
							@csrf
							<div class="modal-body text-left">
								<input type="hidden" name="subjectId" class="subjectId" value="{{$subject->entity_id}}">
								<div class="form-group">
									<label for="subjectCode" class="">{{__('Subject Code')}}</label>
									<input type="text" id="subjectCode" name="subjectCode" class="form-control" value="{{$subject->subject_code}}">
								</div>
								<div class="form-group">
									<label for="subjectName" class="required">{{__('Subject Name')}}</label>
									<input type="text" id="subjectName" name="subjectName" class="form-control" value="{{$subject->subject_name}}">
								</div>
								<div class="form-group">
									<label for="subjectDesc" class="">{{__('Description')}}</label>
									<input type="text" id="subjectDesc" name="subjectDesc" class="form-control" value="{{$subject->subject_description}}">
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