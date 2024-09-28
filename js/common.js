jQuery(function($){
  $('.nav_btn_wrap').on('click',function(){
      $(this).toggleClass('active');
      $('.header_nav').toggleClass('active');
      $('body').toggleClass('nav-open');
  });
});


jQuery(function($){
  $('.header_nav_text').on('click', function(){
    $(this).toggleClass('header-active').next('.footer_nav').slideToggle();
  });
});
