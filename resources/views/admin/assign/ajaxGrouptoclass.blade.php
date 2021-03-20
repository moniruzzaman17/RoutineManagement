<table class="table table-striped">
	<thead>
		<tr class="table-head">
			<th scope="col">SL</th>
			<th scope="col">Group Name</th>
			<th scope="col">Class Name</th>
			<th scope="col">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $i=1; ?>
		@foreach ($classgroups as $key => $classgroup)
		<tr>
			<th scope="row">{{$i++}}</th>
			<td>{{$classgroup->class->class_name}}</td>
			<td>{{$classgroup->group->group_name}}</td>
			<td>
				<a href="" class="updateGrouptoclass text-success" data-toggle="modal" data-target="#modal{{$classgroup->entity_id}}">
					<i class="fas fa-pencil-alt"></i>
				</a>
				<a href="{{$classgroup->entity_id}}" class="removeGrouptoclass text-danger ml-3">
					<i class="fas fa-trash-alt"></i>
				</a>
			</td>
			<!-- Modal -->
			<div class="modal fade" id="modal{{$classgroup->entity_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalCenterTitle">{{__('Update Assigned Class & Group Information')}}</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="{{route('assign.group.class.update',session()->getId())}}" method="post">
							@csrf
							<div class="modal-body text-left">
								<input type="hidden" name="classgroupId" class="classgroupId" value="{{$classgroup->entity_id}}">
								<div class="form-group">
									<label for="dependentGroupUp" class="required">Class</label>
									<select class="form-control" name="class_idUP" id="dependentGroupUp">
										<option class="d-none">Select Class</option>
										@foreach ($classes as $key => $class)
										<option value="{{$class->entity_id}}">{{$class->class_name}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<label for="group" class="required">Group</label>
									<select class="form-control" name="group_idUP" id="group">
										<option class="d-none"></option>
										@foreach ($groups as $key => $group)
										<option value="{{$group->entity_id}}">{{$group->group_name}}</option>
										@endforeach
									</select>
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