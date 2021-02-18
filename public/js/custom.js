
$(document).ready(function() {
  $(window).on('load', function () {
      // $(".loading").fadeOut("fast");       
   // $('#newsletterPopup').modal('show');
      
  });
  });
// Language Switcher trigger from header.blade
$(document).ready(function () {
  // for desktop
  $("#change_lang_bn").on('click', function (e) {
    e.preventDefault();
    var href = window.location.href;
    // var new_url = path.replace(path.split('/')[2], 'bn');
    var new_url = href.replace('en', 'bn');
    window.location.href=new_url;
});

  $("#change_lang_en").on('click', function (e) {
    e.preventDefault();
    var href = window.location.href;
    var new_url = href.replace('bn', 'en');
    window.location.href=new_url;
  });

  // for mobile touch
  $(".change_lang_bn").on('touchend', function (e) {
    e.preventDefault();
    var href = window.location.href;
    // var new_url = path.replace(path.split('/')[2], 'bn');
    var new_url = href.replace('en', 'bn');
    window.location.href=new_url;
});
  $(".change_lang_en").on('touchend', function (e) {
    e.preventDefault();
    var href = window.location.href;
    // var new_url = path.replace(path.split('/')[2], 'bn');
    var new_url = href.replace('bn', 'en');
    window.location.href=new_url;
});


});

// top-link in master blade
$( window ).resize(function() {
    var width = $(window).width(),
    height = $(window).height();
    // for mobile
    if (width <769) {
        $(".responsive-top-link-row").removeClass( "container");
        $(".mob-nav-container").removeClass( "container");
        $(".mob-nav-container").addClass( "d-flex");
    }
    // for desktop
    if (width >=769){
        $(".responsive-top-link-row").addClass( "container");
        $(".mob-nav-container").addClass( "container");
    }
}).resize();


// $(function(){
//     $('.selectpicker').selectpicker();
// });

// end of top-link in master blade

// *********************

// navbar

$(document).ready(function() {
  $(window).on('load', function () {
    if ($("body").hasClass('shuddhoraj-home')) {
      $(".product-menu").removeClass("active-menu");
      $(".contact-menu").removeClass("active-menu");
      $(".about-menu").removeClass("active-menu");
      $(".home-menu").addClass("active-menu");
    }

    else if ($("body").hasClass('product-page-body')) {
      $(".home-menu").removeClass("active-menu");
      $(".contact-menu").removeClass("active-menu");
      $(".about-menu").removeClass("active-menu");
      $(".product-menu").addClass("active-menu");
    }

    else if ($("body").hasClass('contact-us')) {
      $(".home-menu").removeClass("active-menu");
      $(".product-menu").removeClass("active-menu");
      $(".about-menu").removeClass("active-menu");
      $(".contact-menu").addClass("active-menu");
    }

    else if ($("body").hasClass('about-us')) {
      $(".home-menu").removeClass("active-menu");
      $(".product-menu").removeClass("active-menu");
      $(".contact-menu").removeClass("active-menu");
      $(".about-menu").addClass("active-menu");
    }
    else{
      $(".home-menu").removeClass("active-menu");
      $(".product-menu").removeClass("active-menu");
      $(".about-menu").removeClass("active-menu");
      $(".contact-menu").removeClass("active-menu");
    } 
      
  });
  });
// end of navbar

// *********************

// slider
$('.owl-carousel').owlCarousel({
    loop:true,
    margin:5,
    dots:true,
    nav:true,
    mouseDrag:true,
    autoplay:true,
    autoHeight:true,
    // autoWidth:true,
    animateOut: 'slideOutDown',
    animateIn: 'flipInX',
    stagePadding: 0,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1200:{
            items:1
        }
    }
});
// end of slider

// *********************

// // cart
// $(document).on('change', '#cart-qty', function() {
//     $('#set-qty').text($('#cart-qty').val());
// });

// end of cart

// *********************

// hot deal product block

$(".img_producto_container")
  // tile mouse actions
  .on("mouseover", function() {
    $(this)
      .children(".img_producto")
      .css({ transform: "scale(" + $(this).attr("data-scale") + ")" });
  })
  .on("mouseout", function() {
    $(this)
      .children(".img_producto")
      .css({ transform: "scale(1)" });
  })
  .on("mousemove", function(e) {
    $(this)
      .children(".img_producto")
      .css({
        "transform-origin":
          ((e.pageX - $(this).offset().left) / $(this).width()) * 100 +
          "% " +
          ((e.pageY - $(this).offset().top) / $(this).height()) * 100 +
          "%"
      });
  });


// Url Change with modal open and close
 $('.modalDynamicUrlAnchor').click(function(event){
    event.preventDefault();
 history.pushState({}, null, $(this).attr('href'));
 });

$('.modal-close-event').on('hidden.bs.modal', function (e) {
   window.history.go(-1);
  $('body').addClass('one-home');
  // $('.largeImage').attr('src',$('.defaultImg').attr('src'));
  $('.defaultImg').show();
  $('.previewImg').hide();
  $('.previewImg').attr('src','');

});

// product quantity counter
var QtyInput = (function () {
  var $qtyInputs = $(".qty-input");

  if (!$qtyInputs.length) {
    return;
  }

  var $inputs = $qtyInputs.find(".product-qty");
  var $countBtn = $qtyInputs.find(".qty-count");
  var qtyMin = parseInt($inputs.attr("min"));
  var qtyMax = parseInt($inputs.attr("max"));

  $inputs.change(function () {
    var $this = $(this);
    var $minusBtn = $this.siblings(".qty-count--minus");
    var $addBtn = $this.siblings(".qty-count--add");
    var qty = parseInt($this.val());

    if (isNaN(qty) || qty <= qtyMin) {
      $this.val(qtyMin);
      $minusBtn.attr("disabled", true);
    } else {
      $minusBtn.attr("disabled", false);
      
      if(qty >= qtyMax){
        $this.val(qtyMax);
        $addBtn.attr('disabled', true);
      } else {
        $this.val(qty);
        $addBtn.attr('disabled', false);
      }
    }
  });

  $countBtn.click(function () {
    var operator = this.dataset.action;
    var $this = $(this);
    var $input = $this.siblings(".product-qty");
    var qty = parseInt($input.val());

    if (operator == "add") {
      qty += 1;
      if (qty >= qtyMin + 1) {
        $this.siblings(".qty-count--minus").attr("disabled", false);
      }

      if (qty >= qtyMax) {
        $this.attr("disabled", true);
      }
    } else {
      qty = qty <= qtyMin ? qtyMin : (qty -= 1);
      
      if (qty == qtyMin) {
        $this.attr("disabled", true);
      }

      if (qty < qtyMax) {
        $this.siblings(".qty-count--add").attr("disabled", false);
      }
    }

    $input.val(qty);
  });
})();




// $('.modal-close-event').on('show.bs.modal', function (e) {
//   $('body').removeClass('one-home');
// })

// end of hot deal product block

// *********************

// footer

$(document).on('click', '#show-hidden-menu', function() {
        
    // $('.hidden-menu').slideToggle("fast");
    $('.hidden-menu').fadeIn();
    $('.hidden-menu').addClass('cart-active');
    // Alternative animation for example
    // slideToggle("fast");
});

$(document).on('click', '.cart-cross', function() {
        
    // $('.hidden-menu').slideToggle("fast");
    $('.hidden-menu').fadeOut();
    $('.hidden-menu').removeClass('cart-active');
    // Alternative animation for example
    // slideToggle("fast");
});

$('.carousel').carousel({
  interval: false,
  wrap: false
});
// end of footer

// *********************
// signup form
// password strength metter
$(document).ready(function() {
  $('.input-group input').keyup( function() {
    var strength = checkPasswordStrength($(this).val());
    var $outputTarget = $(this).parent('.password-field');
    
    $outputTarget.removeClass(function (index, css) {
        return (css.match (/\level\S+/g) || []).join(' ');
    });
    
    $outputTarget.addClass('level' + strength);
    $('.password-hints').show();
    if ($(this).val() == "") {

        $outputTarget.removeClass('level0');
    $('.password-hints').hide();
    }
  });
});

function checkPasswordStrength(password) {
  var strength = 0;
  
  // If password is 6 characters or longer
  if (password.length >= 6) {
    strength += 1;
  }

  // If password contains both lower and uppercase characters, increase strength value.
  if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) {
    strength += 1;
  }

  // If it has numbers and characters, increase strength value.
  if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) {
    strength += 1;
  }

  return strength;
}

// end of password strength metter
// Confirm Password validation

$(document).ready(function() {
  $('#confirmPass-e').keyup( function() {
    var strength = checkPasswordStrength($(this).val());
        if ($('#passWord-e').val() == $(this).val()) {
            $(".confirm-description-e").html("Password Matched");
            $(".confirm-description-e").css("color", "green");
            $(".action-button").prop( "disabled", false);
        }
        else {
            $(".confirm-description-e").html("Not matched");
            $(".confirm-description-e").css("color", "red");
            $(".action-button").prop( "disabled", true);
        }
  });
});
$(document).ready(function() {
  $('#confirmPass-f').keyup( function() {
    var strength = checkPasswordStrength($(this).val());
        if ($('#passWord-f').val() == $(this).val()) {
            $(".confirm-description-f").html("Password Matched");
            $(".confirm-description-f").css("color", "green");
            $(".action-button").prop( "disabled", false);
        }
        else {
            $(".confirm-description-f").html("Not matched");
            $(".confirm-description-f").css("color", "red");
            $(".action-button").prop( "disabled", true);
        }
  });
});

// end of signup page

// $(document).on('click', '.tocart', function() {
//   var pid = $('.pid').val();
//   // $('#msgDiv').load('/demo.html')
//   // alert('Working')
//     // $.ajax({
//     //   uploadUrl:"{{ route('add.to.cart',['locale'=>'app()->getLocale()', 'pid'=>'"+pid+"']) }}",
//     //   // data: data,
//     //   // type: 'GET',
//     //   success:function(data){
//     //     console.log(pid);
//     //   }
//     // });
//     // $(".tocart").click();
// });
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

// Category product ajax
$(document).ready(function(){
 $(document).on('click', '.cat-link', function(event){
  event.preventDefault();
  $.get(
    $(this).attr('href'),
    function (data) {
      $(".product-body").html(data);
    }
    );
  });
});

// catagory page pagination ajax
$(document).ready(function(){
  $(document).on('click', '#cat_product_body_content .pagination a', function(e) {
    e.preventDefault();
    $.get(
      $(this).attr('href'),
      function (data) {
        $(".product-body").html(data);
      }
      );
  });
});

// default product page pagination ajax
$(document).ready(function(){
  $(document).on('click', '#product_default_page_pagination .pagination a', function(e) {
    e.preventDefault();

    var page=$(this).attr('href').split('page=')[1];
    var url = 'product/default?page='+page;

    $.get(
      url,
      function (data) {
        $(".product-body").html(data);
      }
      );
  });
});

// default product page pagination ajax
// $(document).ready(function(){
//   if (document.location.pathname == '/product') {\
//     alert('working');
//     $.get(
//       'default'
//       ,
//       function (data) {
//         $(".product-body").html(data);
//       }
//       );
//   }
// });


// add to cart ajax
$(document).ready(function(){
        if ($('.hidden-menu').hasClass('cart-active')) {
          var cart = true;
        }
        else {
          var cart = false;
        }
  $(document).on('click', '.tocart', function(e) {
    e.preventDefault();
    // $('.hidden-menu').addClass('cart-active')
    $.get(
      $(this).attr('href'),
      function (data) {
        $(".cart-fixed").html(data);
        $(".shopping-cart").css('animation','shake 0.5s');
        if (cart==true) {
          $('.hidden-menu').show();
        }
        else {
        $('.hidden-menu').hide();
        }
      }
      );
  });
});

// remove cart items
$(document).ready(function(){
  $(document).on('click', '.remove-cart-item', function(e) {
    e.preventDefault();
    if ($('body').hasClass('shuddhoraj-home')) {
      var url = $('#locale').val()+'/'+$(this).attr('href');
    }
    else {
      var url =$(this).attr('href');
    }
    $.get(
      url,
      function (data) {
        $(".cart-fixed").html(data);
        $('.hidden-menu').fadeIn();
      }
      );
  });
});



// Update cart items and increase qty
$(document).ready(function(){
  $(document).on('click', '.cart-item-plus', function(e) {
    e.preventDefault();
    if ($('body').hasClass('shuddhoraj-home')) {
      var url = $('#locale').val()+'/'+$(this).attr('href');
    }
    else {
      var url =$(this).attr('href');
    }
    $.get(
      url,
      function (data) {
        $(".cart-fixed").html(data);
        $('.hidden-menu').fadeIn();
      }
      );
  });
});


// Update cart items and decress qty
$(document).ready(function(){
  $(document).on('click', '.cart-item-minus', function(e) {
    e.preventDefault();
    if ($('body').hasClass('shuddhoraj-home')) {
      var url = $('#locale').val()+'/'+$(this).attr('href');
    }
    else {
      var url =$(this).attr('href');
    }
    $.get(
      url,
      function (data) {
        $(".cart-fixed").html(data);
        $('.hidden-menu').fadeIn();
      }
      );
  });
});

$(document).ready(function(){
if ($('.hidden-menu').hasClass('cart-active')) {
  $(window).on('load', function () {
      $(".hidden-menu").show();
      $('.hidden-menu').addClass('cart-active');
      
 });
}
else{
  $(window).on('load', function () {
      $(".hidden-menu").hide();
      
 });
}
});
  $(window).on('load', function () {
      $(".hidden-menu").hide();
      $('.hidden-menu').removeClass('cart-active');
      
 });

// Category page menu active query
$('.cat-link').click(function(){
  $('.cat-link').removeClass('cat-link-active');
  $('.cat-banner').removeClass('cat-banner-active');
  $(this).addClass('cat-link-active');
});

$('.cat-banner').click(function(){
  $('.cat-link').removeClass('cat-link-active');
  $('.cat-banner').removeClass('cat-banner-active');
  $(this).addClass('cat-banner-active');
});


// product details to add cart
// $('.detailsToCartForm').on('submit', function(event) {
$('.details-tocart').click(function(event){
      event.preventDefault();
      
      var pid = $(this).attr('href');
      var qty = $(".details-action-qty"+pid).val();
      var _token   = $('meta[name="csrf-token"]').attr('content');

      $.ajax({
        url: pid+"/details-tocart",
        type:"POST",
        data:{
          productId:pid,
          qty:qty,
          _token: _token
        },

            // shows the loader element before sending.
            // beforeSend: function() {
            //   $(".loading").fadeIn('fast');
            // },
            success:function(data){

            // $(".loading").fadeOut('fast');
            $(".cart-fixed").html(data);
            $(".hidden-menu").hide();
            $(".added-notification").html('<div class="alert alert-success w-100" role="alert" style="margin-top: 50px;"><i class="fa fa-check" aria-hidden="true"></i> Item has been Added to Cart</div>');
            $(".details-action-qty"+pid).val(1);
            $(".shopping-cart").css('animation','shake 0.5s');
            $('.added-notification').fadeIn('fast').delay(1000).fadeOut('fast');
        },
       });
  });
$('.onsaleDetails-tocart').click(function(event){
      event.preventDefault();
      
      var pid = $(this).attr('href');
      var qty = $(".onsaleDetails-action-qty"+pid).val();
      var _token   = $('meta[name="csrf-token"]').attr('content');

      $.ajax({
        url: pid+"/details-tocart",
        type:"POST",
        data:{
          productId:pid,
          qty:qty,
          _token: _token
        },

            // shows the loader element before sending.
            // beforeSend: function() {
            //   $(".loading").fadeIn('fast');
            // },
            success:function(data){

            // $(".loading").fadeOut('fast');
            $(".cart-fixed").html(data);
            $(".hidden-menu").hide();
            $(".added-notification").html('<div class="alert alert-success w-100" role="alert" style="margin-top: 50px;"><i class="fa fa-check" aria-hidden="true"></i> Item has been Added to Cart</div>');
            $(".onsaleDetails-action-qty"+pid).val(1);
            $(".shopping-cart").css('animation','shake 0.5s');
            $('.added-notification').fadeIn('fast').delay(1000).fadeOut('fast');
        },
       });
  });

$('.newDetails-tocart').click(function(event){
      event.preventDefault();
      
      var pid = $(this).attr('href');
      var qty = $(".newDetails-action-qty"+pid).val();
      var _token   = $('meta[name="csrf-token"]').attr('content');

      $.ajax({
        url: pid+"/details-tocart",
        type:"POST",
        data:{
          productId:pid,
          qty:qty,
          _token: _token
        },

            // shows the loader element before sending.
            // beforeSend: function() {
            //   $(".loading").fadeIn('fast');
            // },
            success:function(data){

            // $(".loading").fadeOut('fast');
            $(".cart-fixed").html(data);
            $(".hidden-menu").hide();
            $(".added-notification").html('<div class="alert alert-success w-100" role="alert" style="margin-top: 50px;"><i class="fa fa-check" aria-hidden="true"></i> Item has been Added to Cart</div>');
            $(".newDetails-action-qty"+pid).val(1);
            $(".shopping-cart").css('animation','shake 0.5s');
            $('.added-notification').fadeIn('fast').delay(1000).fadeOut('fast');
        },
       });
  });

$('.bestDetails-tocart').click(function(event){
      event.preventDefault();
      
      var pid = $(this).attr('href');
      var qty = $(".bestDetails-action-qty"+pid).val();
      var _token   = $('meta[name="csrf-token"]').attr('content');

      $.ajax({
        url: pid+"/details-tocart",
        type:"POST",
        data:{
          productId:pid,
          qty:qty,
          _token: _token
        },

            // shows the loader element before sending.
            // beforeSend: function() {
            //   $(".loading").fadeIn('fast');
            // },
            success:function(data){

            // $(".loading").fadeOut('fast');
            $(".cart-fixed").html(data);
            $(".hidden-menu").hide();
            $(".added-notification").html('<div class="alert alert-success w-100" role="alert" style="margin-top: 50px;"><i class="fa fa-check" aria-hidden="true"></i> Item has been Added to Cart</div>');
            $(".bestDetails-action-qty"+pid).val(1);
            $(".shopping-cart").css('animation','shake 0.5s');
            $('.added-notification').fadeIn('fast').delay(1000).fadeOut('fast');
        },
       });
  });

// search query

$(document).ready(function() {
  $('#deskSearch').keyup( function() {
    var keyword = $(this).val();
      var _token   = $('meta[name="csrf-token"]').attr('content');
    if (keyword != '') {
      $('.shuddhoraj-search-body').show();

      $.ajax({
        url: "search",
        type:"POST",
        data:{
          keyword:keyword,
          _token: _token
        },
        success:function(data){
          $('.shuddhoraj-search-body').html(data);
        },
       });
    }
    else{
      $('.shuddhoraj-search-body').hide();
    }
  });
});

// ===============================================================
// ===============================================================
// ===============================================================
// checkout cart update Functionality

// remove cart items
$(document).ready(function(){
  $(document).on('click', '.remove-cart-item-checkout', function(e) {
    e.preventDefault();
      var url = 'checkout/'+$(this).attr('href');
    $.get(
      url,
      function (data) {
        $(".default-cart-items").hide();
        $(".checkout-cart-info").html(data);
      }
      );
  });
});



// Update cart items and increase qty
$(document).ready(function(){
  $(document).on('click', '.cart-item-plus-checkout', function(e) {
    e.preventDefault();

      var url = 'checkout/'+$(this).attr('href');

    $.get(
      url,
      function (data) {
        $(".default-cart-items").hide();
        $(".checkout-cart-info").html(data);
      }
      );
  });
});


// Update cart items and decress qty
$(document).ready(function(){
  $(document).on('click', '.cart-item-minus-checkout', function(e) {
    e.preventDefault();

      var url = 'checkout/'+$(this).attr('href');
    $.get(
      url,
      function (data) {
        $(".default-cart-items").hide();
        $(".checkout-cart-info").html(data);
      }
      );
  });
});

// checkout page step navigation
$(document).ready(function(){
  $(document).on('click', '.checkout-step-next', function(e) {
    e.preventDefault();

      
      // $('.name_overview').text($('#cus_name').val());
      // $.get(
      //   'checkout/paymentinfo',
      //   function (data) {
      //     $(".payment-info").html(data);
      //   }
      // );
var name      =  $('#cus_name').val();
var mob       =  $('#deliveryphnNumber').val();
var area      =  $('#deliveryArea').val();
var address   =  $('#detailsAddress').val();
      var _token   = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
        url: "checkout/paymentinfo",
        type:"POST",
        data:{
          name:name,
          mob:mob,
          area:area,
          address:address,
          _token: _token
        },
        success:function(data){
          $('.payment-info').html(data);
        },
       });


    if ($('.step-1').hasClass('active')) {
      $('.step-2').addClass('active');
      $('.step-1').removeClass('active');
      $('.checkout-step-prev').show();

      $('.num-step2').addClass('active-numberCircle');
      $('.content-step2').addClass('active-content');

      $('.num-step1').removeClass('active-numberCircle');
      $('.content-step1').removeClass('active-content');


    }

    else if ($('.step-2').hasClass('active')) {


      if ($('#cus_name').val() != '' && $('#deliveryphnNumber').val() != '' && $('#deliveryArea').val() != '' && $('#detailsAddress').val() != '') {
        var reg = /^(?:\+88|88)?(01[3-9]\d{8})$/;
        if (reg.test($('#deliveryphnNumber').val())) {
          $('.step-2').removeClass('active');
          $('.step-3').addClass('active');
          $('.checkout-step-next').hide();
          $('.checkout-step-place').show();

          $('.num-step3').addClass('active-numberCircle');
          $('.content-step3').addClass('active-content');

          $('.num-step2').removeClass('active-numberCircle');
          $('.content-step2').removeClass('active-content');
        }
        else{
           $('.deliveryMobileError').text('Phone number starts with +8801 or 01 and is followed by 9 numbers').fadeIn().delay(2000).fadeOut();
        }


      }
      else{
        if ($('#cus_name').val() == '') {
          $('.deliveryNameError').fadeIn().delay(2000).fadeOut();
        }
        else if ($('#deliveryphnNumber').val() == '') {
          $('.deliveryMobileError').fadeIn().delay(2000).fadeOut();
        }
        else if ($('#deliveryArea').val() == '') {
          $('.deliveryAreaError').fadeIn().delay(2000).fadeOut();
        }
        else{
          $('.deliveryDetailError').fadeIn().delay(2000).fadeOut();
        }
      }

    }
    else {
      $('.checkout-step-next').hide();
      $('.checkout-step-place').show();

      $('.num-step1').addClass('active-numberCircle');
      $('.content-step1').addClass('active-content');
    }
  });
  $(document).on('click', '.checkout-step-prev', function(e) {
    e.preventDefault();

    if ($('.step-3').hasClass('active')) {
      $('.step-2').addClass('active');
      $('.step-3').removeClass('active');
      $('.checkout-step-place').hide();
      $('.checkout-step-next').show();

      $('.num-step2').addClass('active-numberCircle');
      $('.content-step2').addClass('active-content');

      $('.num-step3').removeClass('active-numberCircle');
      $('.content-step3').removeClass('active-content');
    }

    else if ($('.step-2').hasClass('active')) {
      $('.step-1').addClass('active');
      $('.step-2').removeClass('active');
      $('.checkout-step-prev').hide();

      $('.num-step1').addClass('active-numberCircle');
      $('.content-step1').addClass('active-content');

      $('.num-step2').removeClass('active-numberCircle');
      $('.content-step2').removeClass('active-content');
    }
    else{
      $('.checkout-step-prev').hide();

      $('.num-step1').addClass('active-numberCircle');
      $('.content-step1').addClass('active-content');
    }
  });
});


// clear cart condition
$(document).ready(function(){
  $(document).on('click', '.clear-coupon', function(e) {
    e.preventDefault();

      var url = 'checkout/'+$(this).attr('href');
    $.get(
      url,
      function (data) {
        $(".default-cart-items").hide();
        $(".checkout-cart-info").html(data);
      }
      );
  });
});

// add condition to cart 


$(document).ready(function() {
  $(document).on('click', '.coupon-apply-btn', function(e) {
    e.preventDefault();

      var code = $(".coupon_code").val();
      var _token   = $('meta[name="csrf-token"]').attr('content');

      var url = 'checkout/condition/add';

      $.ajax({
        url: url,
        type:"POST",
        data:{
          coupon_code:code,
          _token: _token
        },
        success:function(data){
        $(".default-cart-items").hide();
        $(".checkout-cart-info").html(data);
        $(".coupon_code_display").html('Coupon "<b>'+code+'</b>" has been accepted');
        $(".coupon-action-success-msg").fadeIn();
        },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
                $(".coupon-action-error-msg").fadeIn().delay(3000).fadeOut(0);
          }
       });
  });
});


// payment method selection

$(document).ready(function(){
  $(document).on('click', '.payment-cod-btn', function(e) {
    e.preventDefault();
    $('.payment_method').val('Cash On Delivery');
    $('.payment-bkash-btn').removeClass('focused');
    $('.payment-nagad-btn').removeClass('focused');
    $(this).addClass('focused');
  });
  $(document).on('click', '.payment-bkash-btn', function(e) {
    e.preventDefault();
    $('.payment_method').val('Pay With bKash');
    $('.payment-cod-btn').removeClass('focused');
    $('.payment-nagad-btn').removeClass('focused');
    $(this).addClass('focused');
  });
  $(document).on('click', '.payment-nagad-btn', function(e) {
    e.preventDefault();
    $('.payment_method').val('Pay With Nagad');
    $('.payment-cod-btn').removeClass('focused');
    $('.payment-bkash-btn').removeClass('focused');
    $(this).addClass('focused');
  });
});


// update profile ajax
// $(document).ready(function() {
// $('#profile-update').click(function(event){
//     event.preventDefault();

//     var cus_name  = $("#cus_name").val();
//     var cus_email = $("#cus_email").val();
//     var cus_phone = $("#cus_phone").val();

//     var delivery_name       = $("#delivery_name").val();
//     var delivery_phone      = $("#delivery_phone").val();
//     var detail_address      = $("#detail_address").val();
//     var delivery_postcode   = $("#postcode").val();
//     var area                = $("#area").val();
//       var _token   = $('meta[name="csrf-token"]').attr('content');
//       $.ajax({
//         url: "profilecontent",
//         type:"POST",
//         data:{
//           _token: _token,
//           cus_name:cus_name,
//           cus_email: cus_email,
//           cus_phone: cus_phone,
//           delivery_name: delivery_name,
//           delivery_phone: delivery_phone,
//           detail_address: detail_address,
//           delivery_postcode: delivery_postcode,
//           area: area,
//         },
//         success:function(data){
//           $('.default-profile-content').hide();
//           $('.update-profile-success').fadeIn().delay(2000).fadeOut();
//           $('.profile-content').html(data);
//         },
//        });
//   });
// });

$(document).ready(function(){
    $(".changepassCheck").change(function() {
      if(this.checked) {
        $('#changePassFormGroup').fadeIn();    // display
      }
      else {
        $('#changePassFormGroup').fadeOut();    // display
      }
  });
});


// get-touch.php
// radio on change event
$(document).on('change', '#company', function() {
    $('#for-company').css("display", "block");    // display
});
$(document).on('change', '#individual', function() {
    $('.company-name').val('');
    $('.website').val('');
    $('#for-company').css("display", "none");    // display
});

// end of get-touch.php

// multiple product thumb view 
// $('#thumbs img').click(function(){
//     $('#largeImage').attr('src',$(this).attr('src').replace('thumb','large'));
//     $('.onsaleImg').attr('src',$(this).attr('src').replace('thumb','large'));
//     $('.bestSellerImg').attr('src',$(this).attr('src').replace('thumb','large'));
//     $('.newImg').attr('src',$(this).attr('src').replace('thumb','large'));
//     $('.productModalImg').attr('src',$(this).attr('src').replace('thumb','large'));
//     $('.catNameProdImg').attr('src',$(this).attr('src').replace('thumb','large'));
// });
// $('#thumbs1 img').click(function(){
//     $('.onsaleImg').attr('src',$(this).attr('src').replace('thumb','large'));
// });
// $('#thumbs2 img').click(function(){
//     $('.newImg').attr('src',$(this).attr('src').replace('thumb','large'));
// });
$('.individualProductThumb img').click(function(){
    $('.individualProductThumbImgPrev').attr('src',$(this).attr('src').replace('thumb','large'));
});
