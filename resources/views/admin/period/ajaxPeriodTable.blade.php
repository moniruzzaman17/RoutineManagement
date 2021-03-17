<table class="table table-striped">
	<thead>
		<tr class="table-head">
			<th scope="col">SL</th>
			<th scope="col">Period</th>
			<th scope="col">Shift</th>
			<th scope="col">Start Time</th>
			<th scope="col">End Time</th>
			<th scope="col">Duration</th>
			<th scope="col">Remarks</th>
			<th scope="col">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $i=1; ?>
		@foreach ($periods as $key => $period)
		<tr>
			<th scope="row">{{$i++}}</th>
			<td>{{$period->period_name}}</td>
			<td>{{$period->shift->shift_name}}</td>
			<td>{{date("h:i A", strtotime($period->start_time))}}</td>
			<td>{{date("h:i A", strtotime($period->end_time))}}</td>
			<td>{{$period->duration}} Minutes</td>
			<td>{{$period->remarks}}</td>
			<td>
				<a href="" class="updatePeriod text-success" data-toggle="modal" data-target="#modal{{$period->entity_id}}">
					<i class="fas fa-pencil-alt"></i>
				</a>
				<a href="{{$period->entity_id}}" class="removePeriod text-danger ml-3">
					<i class="fas fa-trash-alt"></i>
				</a>
			</td>
			<!-- Modal -->
			<div class="modal fade" id="modal{{$period->entity_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalCenterTitle">{{__('Update Period Information')}}</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="{{route('period.update',session()->getId())}}" method="post">
							@csrf
							<div class="modal-body text-left">
								<input type="hidden" name="periodId" value="{{$period->entity_id}}">
								<div class="form-group">
									<label for="periodName" class="required">{{__('Period Name')}}</label>
									<div class="form-control">
										{{$period->period_name}}
									</div>
								</div>
								<div class="form-group">
									<div class="md-form">
										<label for="startTime" class="required">{{__('Select New Start Time')}}</label><br>
										{{date("h:i A", strtotime($period->start_time))}}
										<input placeholder="Selected time" type="time" id="startTime" name="startTime" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label for="duration" class="required">{{__('Period Duration (Minute)')}}</label>
									<input type="number" id="duration" name="duration" class="form-control" value="{{$period->duration}}">
								</div>
								<div class="form-group">
									<label for="shift" class="required">{{__('Select')}}</label>
									<div class="form-control">
										{{$period->shift->shift_name}}
									</div>
								</div>
								<div class="form-group">
									<label for="remarks" class="">{{__('Remarks (if any)')}}</label>
									<input type="text" id="remarks" name="remarks" class="form-control" value="{{ $period->remarks }}">
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