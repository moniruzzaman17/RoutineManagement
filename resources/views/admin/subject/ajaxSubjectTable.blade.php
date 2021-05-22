<table class="table table-striped" id="subjectTable">
	<thead>
		<tr class="table-head">
			<th scope="col">SL</th>
			<th scope="col">Subject Code</th>
			<th scope="col">Subject Name</th>
			<th scope="col">Description</th>
			<th scope="col">Group</th>
			<th scope="col">Action</th>
		</tr>
	</thead>
	{{-- <tbody> --}}
		<?php $i=1; ?>
		@foreach ($subjects as $key => $subject)
		<tr>
			<th scope="row">{{$i++}}</th>
			<td>{{$subject->subject_code}}</td>
			<td>{{$subject->subject_name}}</td>
			<td>{{$subject->subject_description}}</td>
			<td>{{$subject->group['group_name']}}</td>
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
									<label for="group" class="">{{__('Group')}}</label><br>
									<select name="groupU" class="form-select form-control">
										@foreach ($groups as $key => $group)
										@if($subject->group_id == $group->entity_id)
										<option value="{{$group->entity_id}}" selected>{{$group->group_name}}</option>
										@else
										<option value="{{$group->entity_id}}">{{$group->group_name}}</option>
										@endif
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<label for="subjectCodeU" class="">{{__('Subject Code')}}</label>
									<input type="text" name="subjectCode" class="form-control" value="{{$subject->subject_code}}">
								</div>
								<div class="form-group">
									<label for="subjectNameU" class="required">{{__('Subject Name')}}</label>
									<input type="text" name="subjectName" class="form-control" value="{{$subject->subject_name}}">
								</div>
								<div class="form-group">
									<label for="subjectDescU" class="">{{__('Description')}}</label>
									<input type="text" name="subjectDesc" class="form-control" value="{{$subject->subject_description}}">
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
	{{-- </tbody> --}}
</table>