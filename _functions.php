<?php
function my_script_init() {
  if ( is_front_page() && is_home() || is_page(array('font_shippori','font_hina','font_syuku')) ) {
    wp_enqueue_style("reset", get_stylesheet_directory_uri() . "/css/reset.css", array(), "all");

    wp_enqueue_style("fancybox", "//cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css", array(), "all");
    wp_enqueue_style("cmn", get_stylesheet_directory_uri() . "/css/common.css", array(), filemtime(get_stylesheet_directory() . "/css/common.css"));
    wp_enqueue_style("top", get_stylesheet_directory_uri() . "/css/top.css", array(), filemtime(get_stylesheet_directory() . "/css/top.css"));
    wp_enqueue_script("fancybox", "//cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js", array(), true);
    wp_enqueue_script("gsap_min", "https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js", array(), true);
    wp_enqueue_script("gsap_scroll", "https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollTrigger.min.js", array(), true);
    wp_enqueue_script("gsap_scrollto", "https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollToPlugin.min.js", array(), true);

    wp_enqueue_script("top", get_stylesheet_directory_uri() . "/js/top.js", array(), filemtime(get_stylesheet_directory() . "/js/top.js"), true);
  }else{
    wp_enqueue_style("page", get_stylesheet_directory_uri() . "/css/page.css", array(), filemtime(get_stylesheet_directory() . "/css/page.css"));
  }
  if(is_singular( 'case' ) || is_post_type_archive('case')){
    wp_enqueue_style( "gc-list-style" );
    wp_enqueue_style( 'flickity', 'https://unpkg.com/flickity@2/dist/flickity.min.css', array(), "all");
    wp_enqueue_script( 'flickity', 'https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js', array(), "true");
    wp_enqueue_script( 'case', get_stylesheet_directory_uri() . "/js/case.js", array(), filemtime(get_stylesheet_directory() . "/js/case.js"), true);
  }
  wp_enqueue_style("slick-theme", "https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.min.css", array(), "all");
  wp_enqueue_style("slick", "https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css", array(), "all");
  wp_enqueue_style("cmn", get_stylesheet_directory_uri() . "/css/common.css", array(), filemtime(get_stylesheet_directory() . "/css/common.css"));

  // フォント
  if(is_page(array('font_shippori','font_hina','font_syuku'))){
    wp_enqueue_style("font", get_stylesheet_directory_uri() . "/css/font.css", array(), filemtime(get_stylesheet_directory() . "/css/font.css"));
  }

  wp_enqueue_script("slick", "https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js", array(), array(), true);
  wp_enqueue_script("cmn", get_stylesheet_directory_uri() . "/js/common.js", array(), filemtime(get_stylesheet_directory() . "/js/common.js"), true);
}
add_action("wp_enqueue_scripts", "my_script_init", 9999);


function my_setup() {
	unregister_nav_menu( 'footer-nav' );
	register_nav_menu( 'footer-nav1' , 'フッターメニュー1' );
	register_nav_menu( 'footer-nav2' , 'フッターメニュー2' );
	register_nav_menu( 'footer-nav3' , 'フッターメニュー3' );
	register_nav_menu( 'footer-nav4' , 'フッターメニュー4' );
	register_nav_menu( 'footer-nav5' , 'フッターメニュー5' );
	register_nav_menu( 'footer-nav6' , 'フッターメニュー6' );
}
add_action('after_setup_theme' , 'my_setup',20);


add_image_size( 'top_case', 600, 600, true );
add_image_size( 'case_list', 820, 550, true );
add_image_size( 'top_event', 750, 600, true );


