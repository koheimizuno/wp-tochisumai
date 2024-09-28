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

		<div class="main-section" id="main" role="main">
			<?php do_action( 'lightning_main_section_prepend', 'lightning_main_section_prepend' ); ?>

            <div class="event-list">

                <?php
                // 1ページあたり6件の投稿を表示する設定
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
                $args = array(
                    'post_type' => 'post', 
                    'posts_per_page' => 6, 
                    'paged' => $paged, 
                    'category_name' => 'event',
                );

                // クエリをカスタマイズ
                $custom_query = new WP_Query($args);

                // 投稿があるか確認
                if ( $custom_query->have_posts() ) : 
                    echo '<ul class="event-list-ul">';

                    while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
                        <li class="event-list-item">
                            <a href="<?php the_permalink(); ?>">
								<div class="event-list-img">
								<?php if ( has_post_thumbnail() ) : ?>
									<img src="<?php echo esc_url( get_the_post_thumbnail_url( null, 'full' ) ); ?>" alt="<?php the_title(); ?>" />
								<?php endif; ?>
								</div>
								<h2 class="event-list-title"><?php the_title(); ?></h2>
								<p class="event-list-date"><?php echo get_the_date(); ?></p>
								<p class="event-list-desc"><?php echo wp_trim_words( get_the_content(), 70, '...' ); ?></p>
							</a>
                        </li>
                    <?php endwhile;

                    echo '</ul>'; 

                    $pagination_args = array(
                        'mid_size'           => 1,
                        'prev_text'          => '&laquo;',
                        'next_text'          => '&raquo;',
                        'type'               => 'list',
                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'lightning' ) . ' </span>',
                    );
                    $pagination_args = apply_filters( 'lightning_pagenation_array', $pagination_args );
                    the_posts_pagination( $pagination_args );

                endif;

                // クエリのリセット
                wp_reset_postdata();
                ?>
            </div>

			<?php do_action( 'lightning_main_section_append', 'lightning_main_section_append' ); ?>
		</div><!-- [ /.main-section ] -->

		<?php
		// do_action( 'lightning_sub_section_before', 'lightning_sub_section_before' );
		// if ( lightning_is_subsection() ) {
		// 	if ( lightning_is_woo_page() ) {
		// 		do_action( 'woocommerce_sidebar' );
		// 	} else {
		// 		lightning_get_template_part( 'sidebar', get_post_type() );
		// 	}
		// }
		// do_action( 'lightning_sub_section_after', 'lightning_sub_section_after' );
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
