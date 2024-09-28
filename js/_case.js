jQuery(window).on('load', function() {
  jQuery(function($) {
  setTimeout(function() {
    var $slider = $('.single-case .main-slider').slick({
      arrows: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      fade: true,
      autoplay: true,
      speed: 2200,
      autoplaySpeed: 2400,
      infinite: true,
      pauseOnHover: false,
      pauseOnFocus: false,
      cssEase: 'ease-in-out',
      dots: true
    });
    $slider.on('beforeChange', function(slick, currentSlide) {
      $('.glow_animation').addClass('glow_active');
    });
    $slider.on('afterChange', function(slick, currentSlide) {
      $('.glow_animation').removeClass('glow_active');
    });
  }, 4000)
  });
});

(function($) {
// Flickityの初期化と設定
let mainCarousel = ".tricks-slider";
let mainSlides = ".tricks-slider_slide";
let parallaxPercentage = 20;

let flkty = new Flickity(mainCarousel, {
  contain: true,
  freeScroll: true,
  percentPosition: true,
  pageDots: false,
  cellSelector: mainSlides,
  cellAlign: "left",
  resize: true,
  selectedAttraction: 0.01,
  dragThreshold: 1,
  freeScrollFriction: 0.05
});

// スクロール時の画像位置調整
flkty.on("scroll", function (progress) {
  setImagePositions();
  $(".progress_fill").css("width", `${progress * 100}%`);
});

function setImagePositions() {
  $(mainSlides).each(function (index) {
    let targetElement = $(this);
    let elementOffset =
      targetElement.offset().left +
      targetElement.width() -
      $(mainCarousel).offset().left;
    let parentWidth = $(mainCarousel).width() + targetElement.width();
    let myProgress = elementOffset / parentWidth;
    let slideProgress = parallaxPercentage * myProgress;
    if (slideProgress > parallaxPercentage) {
      slideProgress = parallaxPercentage;
    } else if (slideProgress < 0) {
      slideProgress = 0;
    }
    targetElement
      .find(".image_plallax")
      .css("transform", `translateX(-${slideProgress}%)`);
  });
}

// マウスホイールによるスライド切り替え
// $(mainCarousel).on('wheel', function(e) {
//   e.preventDefault(); // ページのスクロールを防止

//   var deltaX = e.originalEvent.deltaX; // 横方向のスクロール量を取得

//   if (deltaX > 0) {
//     flkty.next(); // 次のスライドに移動
//   } else if (deltaX < 0) {
//     flkty.previous(); // 前のスライドに移動
//   }
// });

})(jQuery);

(function($) {
  let cursor = $('.cursor');

  $(document).on('mousemove', function(e) {
    cursor.css({
      left: e.clientX + 'px',
      top: e.clientY + 'px'
    });
  });

  $(document).on('mouseenter', '.slider_box', function() {
    cursor.show(); // カーソルを表示
    cursor.find('img').attr('src', homeUrl + '/wp-content/themes/lightning_child/img/case/drag.png');
    $('body').css('cursor', 'none'); // デフォルトのカーソルを非表示
  });

  $(document).on('mouseleave', '.slider_box', function() {
    cursor.hide(); // カーソルを非表示
    $('body').css('cursor', ''); // デフォルトのカーソルを表示
  });
})(jQuery);