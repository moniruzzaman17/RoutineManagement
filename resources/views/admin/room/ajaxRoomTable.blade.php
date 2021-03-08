<table class="table table-striped">
	<thead>
		<tr class="table-head">
			<th scope="col">SL</th>
			<th scope="col">Room No</th>
			<th scope="col">Floor</th>
			<th scope="col">Building</th>
			<th scope="col">Remarks</th>
			<th scope="col">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $i=1; ?>
		@foreach ($rooms as $key => $room)
		<tr>
			<th scope="row">{{$i++}}</th>
			<td>{{$room->room_no}}</td>
			<td>{{$room->floor}}</td>
			<td>{{$room->building}}</td>
			<td>{{$room->remarks}}</td>
			<td>
				<a href="" class="updateRoom text-success" data-toggle="modal" data-target="#modal{{$room->entity_id}}">
					<i class="fas fa-pencil-alt"></i>
				</a>
				<a href="{{$room->entity_id}}" class="removeRoom text-danger ml-3">
					<i class="fas fa-trash-alt"></i>
				</a>
			</td>
			<!-- Modal -->
			<div class="modal fade" id="modal{{$room->entity_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalCenterTitle">{{__('Update Class Room Information')}}</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="{{route('room.update',session()->getId())}}" method="post">
							@csrf
							<div class="modal-body text-left">
								<input type="hidden" name="roomId" class="roomId" value="{{$room->entity_id}}">
								<div class="form-group">
									<label for="roomNo" class="required">{{__('Room Number')}}</label>
									<input type="text" id="roomNo" name="roomNo" class="form-control" value="{{$room->room_no}}">
								</div>
								<div class="form-group">
									<label for="roomFloor" class="required">{{__('Floor')}}</label>
									<select class="form-control" name="roomFloor" id="roomFloor">
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
									<input type="text" id="roomBuilding" name="roomBuilding" class="form-control" value="{{$room->building}}">
								</div>
								<div class="form-group">
									<label for="roomRemarks" class="">{{__('Remarks')}}</label>
									<input type="text" id="roomRemarks" name="roomRemarks" class="form-control" value="{{$room->remarks}}">
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