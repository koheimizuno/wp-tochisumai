<?php
/**
 * Lightning G3 index.php common template-file
 *
 * @package vektor-inc/lightning
 */

use VektorInc\VK_Breadcrumb\VkBreadcrumb;

?><?php lightning_get_template_part( 'header' ); ?>

<?php
do_action( 'lightning_site_header_before', 'lightning_site_header_before' );
if ( apply_filters( 'lightning_is_site_header', true, 'site_header' ) ) {
	lightning_get_template_part( 'template-parts/site-header' );
}
do_action( 'lightning_site_header_after', 'lightning_site_header_after' );
?>

<?php
if ( is_front_page() ) {
	if ( apply_filters( 'lightning_default_slide_display', true ) ) {
		LTG_G3_Slider::display_html();
	}
}
?>

<?php if ( ! is_front_page() ) : ?>
	<div class="fv_wrap main_visual">
    <div class="glow_animation"></div>
		<div class="main-slider">
  <?php
  // 画像一覧取得
  if ($post_id == '') {
    $post_id = get_the_ID();
    $title = get_the_title($post_id);
  }
  $myupload_images = get_post_meta($post_id, 'myupload_images', true ); 
  $myupload_div_l = ''; // 変数を初期化
  if($myupload_images) {
      foreach( $myupload_images as $key => $img_id ){
          $thumb_src_l = wp_get_attachment_image_src($img_id, 'gc-slide-large');
          $thumb_src_l = $thumb_src_l[0];
          $myupload_div_l .= '<li class="item">';
          $myupload_div_l .= '<div class="js-parallax itemImg lazyload" style="background: url(' . esc_url($thumb_src_l) . ') center center no-repeat; background-size: cover;"></div>';
          $myupload_div_l .= '</li>';
      }
  }
  ?>
  <?php echo $myupload_div_l; ?>
</div>

    <div class="fv_wrap_text">
      <!-- <h1 class="fv_text_main"><span class="big">粋</span>と<span class="big">共</span>に、 <br><span class="big">粋</span>にくらす。</h1> -->
      <h1 class="case_text_main">住宅の作品集</h1>
			<div class="case_text_sub_wrap">
			<?php
// 投稿のタクソノミー用語を取得
$terms = get_the_terms( get_the_ID(), 'case_category' );
if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
    // 最初のタクソノミー用語を取得
    $first_term = $terms[0];
    echo '<div class="cat">' . esc_html( $first_term->name ) . '</div>';
}
?>

				<p class="case_text_sub"><?php the_title(); ?></p>
			</div>
    </div>
  </div>

	<?php
	do_action( 'lightning_page_header_before', 'lightning_page_header_before' );
	if ( apply_filters( 'lightning_is_page_header', true, 'page_header' ) ) {
		// lightning_get_template_part( 'template-parts/page-header' );
	}
	do_action( 'lightning_page_header_after', 'lightning_page_header_after' );
	?>

	<?php
	do_action( 'lightning_breadcrumb_before', 'lightning_breadcrumb_before' );
	if ( apply_filters( 'lightning_is_breadcrumb_position_normal', true, 'breadcrumb_position_normal' ) ) {
		if ( apply_filters( 'lightning_is_breadcrumb', true, 'breadcrumb' ) ) {
			$vk_breadcrumb      = new VkBreadcrumb();
			$breadcrumb_options = array(
				'id_outer'        => 'breadcrumb',
				'class_outer'     => 'breadcrumb',
				'class_inner'     => 'container',
				'class_list'      => 'breadcrumb-list',
				'class_list_item' => 'breadcrumb-list__item',
			);
			$vk_breadcrumb->the_breadcrumb( $breadcrumb_options );
		}
	}
	do_action( 'lightning_breadcrumb_after', 'lightning_breadcrumb_after' );
	?>

<?php endif; ?>

<?php do_action( 'lightning_site_body_before', 'lightning_site_body_before' ); ?>

<div class="<?php lightning_the_class_name( 'site-body' ); ?>">
	<?php do_action( 'lightning_site_body_prepend', 'lightning_site_body_prepend' ); ?>
	<div class="<?php lightning_the_class_name( 'site-body-container' ); ?> container">

		<div class="<?php lightning_the_class_name( 'main-section' ); ?>" id="main" role="main">
			<?php do_action( 'lightning_main_section_prepend', 'lightning_main_section_prepend' ); ?>

			<?php
			if ( apply_filters( 'lightning_is_main_section_template', true, 'main_section_template' ) ) {
				if ( lightning_is_woo_page() ) {
					lightning_get_template_part( 'template-parts/main-woocommerce' );
				} else {
					if ( apply_filters( 'lightning_is_singular', is_singular() ) ) {
						lightning_get_template_part( 'template-parts/main-singular' );
					} else {
						if ( is_404() ) {
							lightning_get_template_part( 'template-parts/main-404' );
						} else {
							lightning_get_template_part( 'template-parts/main-archive' );
						}
					}
				}
			}
			?>

			<?php
			do_action( 'lightning_main_section_append', 'lightning_main_section_append' ); ?>
		</div><!-- [ /.main-section ] -->

		<?php
		do_action( 'lightning_sub_section_before', 'lightning_sub_section_before' );
		if ( lightning_is_subsection() ) {
			if ( lightning_is_woo_page() ) {
				do_action( 'woocommerce_sidebar' );
			} else {
				lightning_get_template_part( 'sidebar', get_post_type() );
			}
		}
		do_action( 'lightning_sub_section_after', 'lightning_sub_section_after' );
		?>

	</div><!-- [ /.site-body-container ] -->

	<?php do_action( 'lightning_site_body_append', 'lightning_site_body_append' ); ?>

</div><!-- [ /.site-body ] -->

<?php if ( is_active_sidebar( 'footer-before-widget' ) ) : ?>
<div class="site-body-bottom">
	<div class="container">
		<?php dynamic_sidebar( 'footer-before-widget' ); ?>
	</div>
</div>
<?php endif; ?>

<?php
do_action( 'lightning_site_footer_before', 'lightning_site_footer_before' );
if ( apply_filters( 'lightning_is_site_footer', true, 'site_footer' ) ) {
	lightning_get_template_part( 'template-parts/site-footer' );
}
do_action( 'lightning_site_footer_after', 'lightning_site_footer_after' );
?>

<?php lightning_get_template_part( 'footer' ); ?>
