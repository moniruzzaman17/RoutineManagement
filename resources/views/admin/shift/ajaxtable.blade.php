<table class="table table-striped">
	<thead>
		<tr class="table-head">
			<th scope="col">SL</th>
			<th scope="col">Shift Name</th>
			<th scope="col">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $i=1; ?>
		@foreach ($shifts as $key => $shift)
		<tr>
			<th scope="row">{{$i++}}</th>
			<td>{{$shift->shift_name}}</td>
			<td>
				<a href="" class="updateShift text-success" data-toggle="modal" data-target="#modal{{$shift->entity_id}}">
					<i class="fas fa-pencil-alt"></i>
				</a>
				<a href="{{$shift->entity_id}}" class="removeShift text-danger ml-3">
					<i class="fas fa-trash-alt"></i>
				</a>
			</td>
			<!-- Modal -->
			<div class="modal fade" id="modal{{$shift->entity_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalCenterTitle">{{__('Update Shift Information')}}</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="{{route('shift.update',session()->getId())}}" method="post">
							@csrf
							<div class="modal-body text-left">
								<input type="hidden" name="shiftId" class="shiftId" value="{{$shift->entity_id}}">
								<div class="form-group">
									<label for="shiftName" class="required">{{__('Shift')}}</label>
									<input type="text" id="shiftName" name="shiftName" class="form-control" value="{{$shift->shift_name}}">
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