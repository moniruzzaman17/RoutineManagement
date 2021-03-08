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