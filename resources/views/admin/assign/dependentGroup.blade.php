<label for="group" class="required">Group</label>
<select class="form-control" name="group_id" id="group">
	<option class="d-none"></option>
	{{-- @foreach ($groups as $key => $group)
	@if(count($classgroups)>0)
	@foreach ($classgroups as $key => $classgroup)
	@if($selectedClassId == $classgroup->class_id && $classgroup->group_id == $group->entity_id)
	@continue
	@else
	<option value="{{$group->entity_id}}">{{$group->group_name}}</option>
	@endif
	@endforeach
	@else
	<option value="{{$group->entity_id}}">{{$group->group_name}}</option>
	@endif
	@endforeach --}}
	{{-- ///////////////// --}}
	@if(count($groupExists)>0)
	<?php $increment = 0 ?>
	@foreach ($groups as $key => $group)
	@if($increment < count($groupExists))
		@if($group->entity_id != $groupExists[$increment])
		<option value="{{$group->entity_id}}">{{$group->group_name}}</option>
		@endif
	@else
		<option value="{{$group->entity_id}}">{{$group->group_name}}</option>
	@endif

	<?php $increment++ ?>
	@endforeach
	@else
	@foreach ($groups as $key => $group)
	<option value="{{$group->entity_id}}">{{$group->group_name}}</option>
	@endforeach
	@endif
</select>