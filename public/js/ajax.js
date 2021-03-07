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

      // shows the loader element before sending.
      // beforeSend: function() {
      //   $(".loading").fadeIn('fast');
      // },
      success:function(data){
      	$(".defaultShift").hide();
      	$(".shift-table").html(data);
      },
  });
	}
});