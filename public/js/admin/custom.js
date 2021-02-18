$(".sidebar-dropdown > a").click(function() {
  $(".sidebar-submenu").slideUp(200);
  if (
    $(this)
      .parent()
      .hasClass("active")
  ) {
    $(".sidebar-dropdown").removeClass("active");
    $(this)
      .parent()
      .removeClass("active");
  } else {
    $(".sidebar-dropdown").removeClass("active");
    $(this)
      .next(".sidebar-submenu")
      .slideDown(200);
    $(this)
      .parent()
      .addClass("active");
  }
});

$("#close-sidebar").click(function() {
  $(".page-wrapper").removeClass("toggled");
});
$("#show-sidebar").click(function() {
  $(".page-wrapper").addClass("toggled");
});



 // $(".click-without-refresh").on('click',function(e) {
// $(document).on('click', '.click-without-refresh', function(e) {

// $(".click-without-refresh").click(function(e) {
// var href = $(this).attr('href');
        
// if(href != undefined) {
//   e.preventDefault();
//             $(".load-content").load(href + " .load-content");
//     } 
// });

// product grid sticky header

// ===== Product Grid Sticky Header ==== 
$(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
      $(".product-grid-body").addClass( "is-sticky").fadeIn("slow");
        $('.product-grid-head').hide().animate({opacity:1}, 1000); 
        $('.scrolling-header').css("margin-top", "205px");  
    } else {
      $(".product-grid-body").removeClass( "is-sticky");   
        $('.product-grid-head').show().animate({opacity:1}, 1000); 
        $('.scrolling-header').css("margin-top", "0px");    
    }
});


// product search query
$(document).ready(function() {
  $('#searchProduct').keyup( function() {
    var keyword = $(this).val();
      var _token   = $('meta[name="csrf-token"]').attr('content');
    if (keyword != '') {
      $('.default-product').fadeOut();

      $.ajax({
        url: "product/search",
        type:"POST",
        data:{
          keyword:keyword,
          _token: _token
        },
        success:function(data){
          $('.searched-product').html(data);
        },
       });
    }
    else{
      $('.default-product').fadeIn();
    }
  });
});


// ===== Product Upload Sticky Header ==== 
$(window).scroll(function() {
    if ($(this).scrollTop() >= 200) {     
        // $('.product-upload-head').fadeOut();  
        $('.p-upload-sticky-wrapper').fadeIn();  
    } else {
        // $('.product-upload-head').fadeIn();  
        $('.p-upload-sticky-wrapper').fadeOut();   
    }
});

$("#checkAll").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
});

// upload product page
// enable product toggled
  $(function() {
    $('#status').bootstrapToggle({
      on: 'In Stock',
      off: 'Out of Stock'
    });
  })

// category select arrow key
var count = 2;
$("#category-select").click(function() {
  if (count%2==0) { 
        $('.category-dropdown-content').fadeIn();
        $('.category-select-arrow').css("transform", "rotate(180deg)"); 
  }
  else {
        $('.category-dropdown-content').fadeOut();
        $('.category-select-arrow').css("transform", "rotate(0deg)"); 
  }
  count++
});

var countSelect1 = 0;
$("#select-arrow-head1").click(function() {
  countSelect2 = 0;
  countSelect3 = 0;
  countSelect1+=1;
  if (countSelect1%2!=0) { 
        $('#des-arrow').css("transform", "rotate(180deg)"); 
        $('#shortDes-arrow').css("transform", "rotate(0deg)");
        $('#image-arrow').css("transform", "rotate(0deg)"); 
  }
  else {
        $('#des-arrow').css("transform", "rotate(0deg)"); 
        $('#shortDes-arrow').css("transform", "rotate(0deg)");
        $('#image-arrow').css("transform", "rotate(0deg)"); 
  }
});

var countSelect2 = 0;
$("#select-arrow-head2").click(function() {
  countSelect1 = 0;
  countSelect3 = 0;
  countSelect2+=1;
  if (countSelect2%2!=0) { 
        $('#shortDes-arrow').css("transform", "rotate(180deg)"); 
        $('#des-arrow').css("transform", "rotate(0deg)"); 
        $('#image-arrow').css("transform", "rotate(0deg)"); 
  }
  else {
        $('#shortDes-arrow').css("transform", "rotate(0deg)"); 
        $('#des-arrow').css("transform", "rotate(0deg)"); 
        $('#image-arrow').css("transform", "rotate(0deg)"); 
  }
});

var countSelect3 = 0;
$("#select-arrow-head3").click(function() {
  countSelect1 = 0;
  countSelect2 = 0;
  countSelect3+=1;
  if (countSelect3%2!=0) { 
        $('#image-arrow').css("transform", "rotate(180deg)"); 
        $('#des-arrow').css("transform", "rotate(0deg)"); 
        $('#shortDes-arrow').css("transform", "rotate(0deg)");
  }
  else {
        $('#image-arrow').css("transform", "rotate(0deg)"); 
        $('#des-arrow').css("transform", "rotate(0deg)"); 
        $('#shortDes-arrow').css("transform", "rotate(0deg)");
  }
});




/*
Big Thanks To:
https://developer.mozilla.org/en-US/docs/Rich-Text_Editing_in_Mozilla#Executing_Commands
*/

// $('#editControls a').click(function(e) {
//   switch($(this).data('role')) {
//     case 'h1':
//     case 'h2':
//     case 'p':
//       document.execCommand('formatBlock', false, $(this).data('role'));
//       break;
//     default:
//       document.execCommand($(this).data('role'), false, null);
//       break;
//     }
//   update_output();
// })

// $('#editor').bind('blur keyup paste copy cut mouseup', function(e) {
//   update_output();
// })

// function update_output() {
//   $('#output').val($('#editor').html());
// }



$(document).ready(function() {
  if (window.File && window.FileList && window.FileReader) {
    $("#files").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<span class=\"pip\">" +
            "<a href=\"#preview\"><img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/></a>" +
            "<br/><span class=\"remove\">Remove</span>" +
            "</span>").insertAfter("#files");

          $(".remove").click(function(){
            $(this).parent(".pip").remove();
          });
          
          // Old code here
          /*$("<img></img>", {
            class: "imageThumb",
            src: e.target.result,
            title: file.name + " | Click to remove"
          }).insertAfter("#files").click(function(){$(this).remove();});*/
          
        });
        fileReader.readAsDataURL(f);
      }
      console.log(files);
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
});

// date clear query

$(".fromSpecialDate-close").click(function() {
  $('.fromSpecialDate').val(""); 
});

$(".toSpecialDate-close").click(function() {
  $('.toSpecialDate').val(""); 
});

$(".fromnewDate-close").click(function() {
  $('.fromnewDate').val(""); 
});

$(".tonewDate-close").click(function() {
  $('.tonewDate').val(""); 
});



// print invoice

$(document).ready(function(){
  $(document).on('click', '.print-invoice-btn', function(e) {
    e.preventDefault();

    var mywindow = window.open('', 'Shuddhoraj Invoice', 'height=600,width=1000');
    mywindow.document.write('<html><head><title>Invoice</title>');
    //mywindow.document.write("<link rel=\"stylesheet\" href=\"css/bootstrap.min.css\" type=\"text/css\" media=\"print\" />");
    // mywindow.document.write('<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"');
    mywindow.document.write('<style type="text/css" media="print">@page{size:landscape!important;margin-left: 5px!important;margin-right: 2px!important;font-family:Arial!important;}.invoice{ padding: 0!important; width: 100%!important}.invoice-logo{width: 165px!important;}.invoice-col1{width:49%!important;padding-left:8px!important;padding-right:2px!important;}.invoice-col2{width:49%!important;padding-left:4px!important;padding-right:2px!important;}.item-table tr{text-align:center!important;}</style>');
    mywindow.document.write('</head><body >');
    mywindow.document.write($("#invoice").html());
    mywindow.document.write('</body></html>');
      mywindow.document.close();
      mywindow.focus();
    setTimeout(function () {
      mywindow.print();
    },1000);


  });
});

// ===== Order Grid Dynamic Content ==== 

// product search query
$(document).ready(function() {
  $('#orderSearchBox').keyup( function() {
    var keyword = $(this).val();
      var _token   = $('meta[name="csrf-token"]').attr('content');
    if (keyword != '' || keyword != null) {
      $('.default-tbody').fadeOut();
      $('.searched-order').fadeIn();

      $.ajax({
        url: "order/search",
        type:"POST",
        data:{
          keyword:keyword,
          _token: _token
        },
        success:function(data){
          $('.searched-order').html(data);
        },
       });
    }
    else{
      $('.default-tbody').fadeIn();
      $('.searched-order').fadeOut();
    }
  });
});
// ===== End of Order Grid Dyanamic Content ==== 

// ===== Customer Grid Dynamic Content ==== 

// product search query
$(document).ready(function() {
  $('#customerSearchBox').keyup( function() {
    var keyword = $(this).val();
      var _token   = $('meta[name="csrf-token"]').attr('content');
    if (keyword != '' || keyword != null) {
      $('.default-customer').hide();
      $('.searched-customer').show();

      $.ajax({
        url: "customer/search",
        type:"POST",
        data:{
          keyword:keyword,
          _token: _token
        },
        success:function(data){
          $('.default-customer').hide();
          $('.searched-customer').html(data);
        },
       });
    }
    else{
      $('.searched-customer').hide();
      $('.default-customer').show();
    }
  });
});
// ===== End of Customer Grid Dyanamic Content ==== 