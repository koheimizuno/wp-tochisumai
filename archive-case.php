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

	<?php
	do_action( 'lightning_page_header_before', 'lightning_page_header_before' );
	if ( apply_filters( 'lightning_is_page_header', true, 'page_header' ) ) {
		lightning_get_template_part( 'template-parts/page-header' );
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
/**
 * Archive main template
 *
 * @package Lightning G3
 */

// Exclude to in case of filter search.

$taxonomies = array('sense', 'style', 'situation', 'area'); // タクソノミーのスラッグを配列に追加
$has_tags = false;

foreach ($taxonomies as $taxonomy) {
    if (isset($_GET[$taxonomy]) && !empty($_GET[$taxonomy])) {
        $has_tags = true;
        break;
    }
}

if ( !is_search() && !$has_tags )
{

	/**
	 * Archive title
	 */
	$archive_header_html = '';
	$post_top_info       = VK_Helpers::get_post_top_info();
	// Use post top page（ Archive title wrap to div ）.
	if ( $post_top_info['use'] || get_post_type() !== 'post' ) {
		if ( is_year() || is_month() || is_day() || is_tag() || is_tax() || is_category() ) {
			$archive_title       = get_the_archive_title();
			$archive_header_html = '<header class="archive-header"><h1 class="archive-header-title">' . $archive_title . '</h1></header>';

			// Warning : 'lightning_archive-header' is old hook name that this line is old filter name fall back.
			$archive_header_html = apply_filters( 'lightning_archive-header', $archive_header_html );

			echo wp_kses_post( apply_filters( 'lightning_archive_header', $archive_header_html ) );
		}
	}

	/**
	 * Archive description
	 */
	$archive_description_html = '';
	if ( is_category() || is_tax() || is_tag() ) {
		$archive_description = term_description();
		$page_number         = get_query_var( 'paged', 0 );
		if ( ! empty( $archive_description ) && 0 === $page_number ) {
			$archive_description_html = '<div class="archive-description">' . $archive_description . '</div>';
			echo wp_kses_post( apply_filters( 'lightning_archive_description', $archive_description_html ) );
		}
	}
}

$post_type_info = VK_Helpers::get_post_type_info();

do_action( 'lightning_loop_before' );
?>



	<div class="<?php lightning_the_class_name( 'post-list' ); ?> vk_posts vk_posts-mainSection">



<?php get_template_part('template-parts/tag_search'); ?>

	<?php echo do_shortcode("[case_list]"); ?>

	</div><!-- [ /.post-list ] -->



	<?php
	$args = array(
		'mid_size'           => 1,
		'prev_text'          => '&laquo;',
		'next_text'          => '&raquo;',
		'type'               => 'list',
		'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'lightning' ) . ' </span>',
	);
	$args = apply_filters( 'lightning_pagenation_array', $args );
	the_posts_pagination( $args );
	?>


<?php do_action( 'lightning_loop_after' ); ?>


			<?php do_action( 'lightning_main_section_append', 'lightning_main_section_append' ); ?>
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
