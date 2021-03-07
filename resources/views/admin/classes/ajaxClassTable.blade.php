<table class="table table-striped">
	<thead>
		<tr class="table-head">
			<th scope="col">SL</th>
			<th scope="col">Class Name</th>
			<th scope="col">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $i=1; ?>
		@foreach ($classes as $key => $class)
		<tr>
			<th scope="row">{{$i++}}</th>
			<td>{{$class->class_name}}</td>
			<td>
				<a href="" class="updateClass text-success" data-toggle="modal" data-target="#modal{{$class->entity_id}}">
					<i class="fas fa-pencil-alt"></i>
				</a>
				<a href="{{$class->entity_id}}" class="removeClass text-danger ml-3">
					<i class="fas fa-trash-alt"></i>
				</a>
			</td>
			<!-- Modal -->
			<div class="modal fade" id="modal{{$class->entity_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalCenterTitle">{{__('Update Class Information')}}</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="{{route('class.update',session()->getId())}}" method="post">
							@csrf
							<div class="modal-body text-left">
								<input type="hidden" name="classId" class="classId" value="{{$class->entity_id}}">
								<div class="form-group">
									<label for="className" class="required">{{__('Class Name')}}</label>
									<input type="text" id="className" name="className" class="form-control" value="{{$class->class_name}}">
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