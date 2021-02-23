$(document).ready(function() {
  $(window).on('load', function () {
      // $(".loading").fadeOut("fast");       
   // $('#newsletterPopup').modal('show');

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
});
