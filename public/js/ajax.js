// class ajax
$(document).on('click','.removeClass',function(e){
	e.preventDefault();
	if (confirm('Are you sure you want to delete this?')) {
		var classId = $(this).attr('href');
		var _token   = $('meta[name="csrf-token"]').attr('content');

		$.ajax({
			url: "/class/remove",
			type:"POST",
			data:{
				classId:classId,
				_token: _token
			},

      // shows the loader element before sending.
      // beforeSend: function() {
      //   $(".loading").fadeIn('fast');
      // },
      success:function(data){
      	$(".defaultClass").hide();
      	$(".class-table").html(data);
      },
  });
	}
});

// shift ajax
$(document).on('click','.removeShift',function(e){
	e.preventDefault();
	if (confirm('Are you sure you want to delete this?')) {
		var shiftId = $(this).attr('href');
		var _token   = $('meta[name="csrf-token"]').attr('content');

		$.ajax({
			url: "/shift/remove",
			type:"POST",
			data:{
				shiftId:shiftId,
				_token: _token
			},

			success:function(data){
				$(".defaultShift").hide();
				$(".shift-table").html(data);
			},
		});
	}
});

// Group ajax
$(document).on('click','.removeGroup',function(e){
	e.preventDefault();
	if (confirm('Are you sure you want to delete this group?')) {
		var groupId = $(this).attr('href');
		var _token   = $('meta[name="csrf-token"]').attr('content');

		$.ajax({
			url: "/group/remove",
			type:"POST",
			data:{
				groupId:groupId,
				_token: _token
			},
			
			success:function(data){
				$(".defaultGroup").hide();
				$(".group-table").html(data);
			},
		});
	}
});

// Section ajax
$(document).on('click','.removeSection',function(e){
	e.preventDefault();
	if (confirm('Are you sure you want to delete this Section?')) {
		var sectionId = $(this).attr('href');
		var _token   = $('meta[name="csrf-token"]').attr('content');

		$.ajax({
			url: "/section/remove",
			type:"POST",
			data:{
				sectionId:sectionId,
				_token: _token
			},
			
			success:function(data){
				$(".defaultSection").hide();
				$(".section-table").html(data);
			},
		});
	}
});

// show class wise section
$(document).on('change', '#classWiseSection', function() {
		var classId = $(this).val();
		var _token   = $('meta[name="csrf-token"]').attr('content');

		$.ajax({
			url: "/classwise/section",
			type:"POST",
			data:{
				classId:classId,
				_token: _token
			},
			
			success:function(data){
				$(".defaultSection").hide();
				$(".section-table").html(data);
			},
		});
});
// end of section

// Section ajax
$(document).on('click','.removeSubject',function(e){
	e.preventDefault();
	if (confirm('Are you sure you want to delete this subject?')) {
		var subjectId = $(this).attr('href');
		var _token   = $('meta[name="csrf-token"]').attr('content');

		$.ajax({
			url: "/subject/remove",
			type:"POST",
			data:{
				subjectId:subjectId,
				_token: _token
			},
			
			success:function(data){
				$(".defaultSubject").hide();
				$(".subject-table").html(data);
			},
		});
	}
});

// Class Room ajax
$(document).on('click','.removeRoom',function(e){
	e.preventDefault();
	if (confirm('Are you sure you want to delete Selected ClassRoom?')) {
		var roomId = $(this).attr('href');
		var _token   = $('meta[name="csrf-token"]').attr('content');

		$.ajax({
			url: "/room/remove",
			type:"POST",
			data:{
				roomId:roomId,
				_token: _token
			},
			
			success:function(data){
				$(".defaultRoom").hide();
				$(".room-table").html(data);
			},
		});
	}
});

// Period Remove ajax
$(document).on('click','.removePeriod',function(e){
	e.preventDefault();
	if (confirm('Are you sure you want to delete Selected Period?')) {
		var periodId = $(this).attr('href');
		var _token   = $('meta[name="csrf-token"]').attr('content');

		$.ajax({
			url: "/period/remove",
			type:"POST",
			data:{
				periodId:periodId,
				_token: _token
			},
			
			success:function(data){
				$(".defaultPeriod").hide();
				$(".period-table").html(data);
			},
		});
	}
});

// Period Remove ajax
$(document).on('click','.removeTeacher',function(e){
	e.preventDefault();
	if (confirm('Are you sure you want to delete Selected Teacher Info?')) {
		var teacherId = $(this).attr('href');
		var _token   = $('meta[name="csrf-token"]').attr('content');

		$.ajax({
			url: "/teacher/remove",
			type:"POST",
			data:{
				teacherId:teacherId,
				_token: _token
			},
			
			success:function(data){
				$(".defaultTeacher").hide();
				$(".teacher-table").html(data);
			},
		});
	}
});

// Admin Remove ajax
$(document).on('click','.removeAdmin',function(e){
	e.preventDefault();
	if (confirm('Are you sure you want to delete this admin?')) {
		var adminId = $(this).attr('href');
		var _token   = $('meta[name="csrf-token"]').attr('content');

		$.ajax({
			url: "/admin/remove",
			type:"POST",
			data:{
				adminId:adminId,
				_token: _token
			},
			
			success:function(data){
				$(".defaultAdmin").hide();
				$(".admin-table").html(data);
			},
		});
	}
});

// Assign group to clss remove ajax
$(document).on('click','.removeGrouptoclass',function(e){
	e.preventDefault();
	if (confirm('Are you sure you want to delete this?')) {
		var assigngrouptoclassId = $(this).attr('href');
		var _token   = $('meta[name="csrf-token"]').attr('content');

		$.ajax({
			url: "/assigngrouptoclass/remove",
			type:"POST",
			data:{
				assigngrouptoclassId:assigngrouptoclassId,
				_token: _token
			},
			
			success:function(data){
				$(".defaultGrouptoclass").hide();
				$(".grouptoclass-table").html(data);
			},
		});
	}
});

// dependent group in Assign group to clss
$(document).on('change','#dependentGroup',function(e){
	e.preventDefault();
		var selectedClassId = $(this).val();
		var _token   = $('meta[name="csrf-token"]').attr('content');
		console.log(selectedClassId);

		$.ajax({
			url: "/dependentGroupforClass",
			type:"POST",
			data:{
				selectedClassId:selectedClassId,
				_token: _token
			},
			
			success:function(data){
				// $(".dependentGroup").hide();
				$(".dependentGroup").html(data);
			},
		});
});
