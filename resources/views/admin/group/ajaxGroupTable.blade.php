<table class="table table-striped">
	<thead>
		<tr class="table-head">
			<th scope="col">SL</th>
			<th scope="col">Group Name</th>
			<th scope="col">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $i=1; ?>
		@foreach ($groups as $key => $group)
		<tr>
			<th scope="row">{{$i++}}</th>
			<td>{{$group->group_name}}</td>
			<td>
				<a href="" class="updateGroup text-success" data-toggle="modal" data-target="#modal{{$group->entity_id}}">
					<i class="fas fa-pencil-alt"></i>
				</a>
				<a href="{{$group->entity_id}}" class="removeGroup text-danger ml-3">
					<i class="fas fa-trash-alt"></i>
				</a>
			</td>
			<!-- Modal -->
			<div class="modal fade" id="modal{{$group->entity_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalCenterTitle">{{__('Update Group Information')}}</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="{{route('group.update',session()->getId())}}" method="post">
							@csrf
							<div class="modal-body text-left">
								<input type="hidden" name="groupId" class="groupId" value="{{$group->entity_id}}">
								<div class="form-group">
									<label for="groupName" class="required">{{__('Group Name')}}</label>
									<input type="text" id="groupName" name="groupName" class="form-control" value="{{$group->group_name}}">
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