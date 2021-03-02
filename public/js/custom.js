$(document).ready(function() {
  $(window).on('load', function () {
      // $(".loading").fadeOut("fast");       
   // $('#newsletterPopup').modal('show');
   if ($('#email').val() != '') {
    $('#email').addClass('oldEmailActive');
   }
   else{
    $('#email').removeClass('oldEmailActive');
   }

 });


  $('#searchIdentity').change(function(event){
    if ($(this).val() == "student") {
      $('.student-search-wrapper').show();
      $('.teacher-search-wrapper').hide();
    }
    else if($(this).val() == "teacher") {
      $('.teacher-search-wrapper').show();
      $('.student-search-wrapper').hide();
    }
    else{
      $('.student-search-wrapper').hide();
      $('.teacher-search-wrapper').hide();
    }
  });


  $('input').focus(function(){
    $(this).parents('.form-group').addClass('focused');
    $('#email').removeClass('oldEmailActive');
  });

  $('input').blur(function(){
    var inputValue = $(this).val();
    if ( inputValue == "" ) {
      $(this).removeClass('filled');
      $(this).parents('.form-group').removeClass('focused');  
    } else {
      $(this).addClass('filled');
    }
  });

});
