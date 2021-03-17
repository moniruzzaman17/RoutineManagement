<table class="table table-striped">
	<thead>
		<tr class="table-head">
			<th scope="col">SL</th>
			<th scope="col">Name</th>
			<th scope="col">Email</th>
			<th scope="col">Created At</th>
			<th scope="col">Updated At</th>
			<th scope="col">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $i=1; ?>
		@foreach ($users as $key => $user)
		<tr>
			<th scope="row">{{$i++}}</th>
			<td>{{$user->name}}</td>
			<td>{{$user->email}}</td>
			<td>{{date("d M Y h:i A", strtotime($user->created_at))}}</td>
			<td>{{date("d M Y h:i A", strtotime($user->updated_at))}}</td>
			<td>
				<a href="" class="updateAdmin text-success" data-toggle="modal" data-target="#modal{{$user->id}}">
					<i class="fas fa-pencil-alt"></i>
				</a>
				@if(count($users) > 1)
				<a href="{{$user->id}}" class="removeAdmin text-danger ml-3">
					<i class="fas fa-trash-alt"></i>
				</a>
				@endif
			</td>
			<!-- Modal -->
			<div class="modal fade" id="modal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalCenterTitle">{{__('Update Admin Information')}}</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="{{route('profile.update',session()->getId())}}" method="post">
							@csrf
							<div class="modal-body text-left">
								<input type="hidden" name="adminId" value="{{$user->id}}">
								<div class="form-group">
									<label for="adminName" class="required">{{__('Admin Name')}}</label>
									<input type="text" id="adminName" name="adminName" class="form-control" value="{{$user->name}}">
								</div>
								<div class="form-group">
									<label for="adminPass" class="required">{{__('New Password')}}</label>
									<input type="password" id="adminPass" name="adminPass" class="form-control">
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