<?php
/**
 * Lightning G3 index.php common template-file
 *
 * @package vektor-inc/lightning
 */

use VektorInc\VK_Breadcrumb\VkBreadcrumb;
?>
<?php lightning_get_template_part('header'); ?>

<!-- Site Header -->
<?php
do_action('lightning_site_header_before', 'lightning_site_header_before');
if (apply_filters('lightning_is_site_header', true, 'site_header')) {
    lightning_get_template_part('template-parts/site-header');
}
do_action('lightning_site_header_after', 'lightning_site_header_after');
?>

<div class="<?php lightning_the_class_name('land-page-header'); ?>">

    <!-- Page Header -->
    <?php
    do_action('lightning_page_header_before', 'lightning_page_header_before');
    if (apply_filters('lightning_is_page_header', true, 'page_header')) {
        lightning_get_template_part('template-parts/page-header');
    }
    do_action('lightning_page_header_after', 'lightning_page_header_after');
    ?>

    <!-- Breadcrumb -->
    <?php
    do_action('lightning_breadcrumb_before', 'lightning_breadcrumb_before');
    if (apply_filters('lightning_is_breadcrumb_position_normal', true, 'breadcrumb_position_normal')) {
        if (apply_filters('lightning_is_breadcrumb', true, 'breadcrumb')) {
            $vk_breadcrumb      = new VkBreadcrumb();
            $breadcrumb_options = array(
                'id_outer'        => 'breadcrumb',
                'class_outer'     => 'breadcrumb',
                'class_inner'     => 'container',
                'class_list'      => 'breadcrumb-list',
                'class_list_item' => 'breadcrumb-list__item',
            );
            $vk_breadcrumb->the_breadcrumb($breadcrumb_options);
        }
    }
    do_action('lightning_breadcrumb_after', 'lightning_breadcrumb_after');
    ?>

</div><!-- [ /.land-page-header ] -->


<div class="<?php lightning_the_class_name('site-body'); ?>">

    <?php do_action('lightning_site_body_prepend', 'lightning_site_body_prepend'); ?>
    <div class="<?php lightning_the_class_name('site-body-container'); ?> container">

        <div class="perpagesortsec">
            <div class="itemSelect">
                <label for="listrows">表示件数</label>
                <select name="listrows" id="listrows">
                    <option value="10">10件</option>
                    <option value="30" selected="">30件</option>
                    <option value="50">50件</option>
                </select>
            </div>
            <div class="itemSelect">
                <label for="order">並び替え</label>
                <select name="order" id="order">
                    <option value="modified_DESC" selected="">新着順</option>
                    <option value="price_ASC">価格が安い</option>
                    <option value="price_DESC">価格が高い</option>
                    <option value="land_DESC">土地面積が広い</option>
                    <option value="land_ASC">土地面積が狭い</option>
                </select>
            </div>
        <?php
            function enqueue_custom_scripts() {
                wp_enqueue_script('custom-land-script', get_stylesheet_directory_uri() . '/js/land.js', array('jquery'), null, true);
                
                wp_localize_script('custom-land-script', 'ajax_object', array(
                    'ajax_url' => admin_url('admin-ajax.php'),
                    'nonce'    => wp_create_nonce('process_selection_nonce'),
                ));
            }
            add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');
            
            function process_selection_callback() {
                check_ajax_referer('process_selection_nonce', 'security');
            
                $selected_value = sanitize_text_field($_POST['selected_value']);
                echo "<script>console.log('" . $selected_value . "');</script>";
                // Do something with $selected_value
                // For example, save it to a database or use it in some way
                
                wp_send_json_success("Received value: " . $selected_value);
            
                wp_die(); // Required to terminate immediately and return a proper response
            }
            add_action('wp_ajax_process_selection', 'process_selection_callback');
            add_action('wp_ajax_nopriv_process_selection', 'process_selection_callback');
            
        ?>
            <div class="custom-select">
                <div class="select-box" id="selectBox"`>Select an option</div>
                <div class="options-container" id="optionsContainer">
                    <div class="option">Option 1</div>
                    <div class="option">Option 2</div>
                    <div class="option">Option 3</div>
                    <div class="option">Option 4</div>
                </div>
            </div>
        </div>

        <?php
        // Define how many posts you want per page
        $posts_per_page = 2;

        // Get the current page number
        $paged = isset($_GET['pager']) ? intval($_GET['pager']) : 1;

        // Custom query to fetch the latest 6 "News" posts
        $args = array(
            'post_type' => 'land', // Custom post type for 'news'
            'posts_per_page' => $posts_per_page,  // Limit to 6 posts
            'orderby' => 'date',    // Order by date
            'order' => 'DESC', //ASC or DESC
            'paged' => $paged, // Add the current page number to the query
        );

        $land_query = new WP_Query($args);
        
        if ($land_query->have_posts()) :
            echo '<ul class="land-archive">'; // Optional: Add a wrapper for styling
            while ($land_query->have_posts()) : $land_query->the_post();
        ?>

        <li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <a class="land-row" href="<?php the_permalink(); ?>">
                <div class="land-thumbnail">
                    <img src="<?php echo get_post_meta(get_the_ID(), 'thumbnail_img', true); ?>" alt="">
                </div>
                <div class="land-item-info">
                    <?php 
                    $tag_list = get_post_meta(get_the_ID(), 'tag-list', true);
                    $tagOutput = '<ul class="tag-list">';

                    if (is_array($tag_list) && count($tag_list) !== 0) {
                        $i = 0;
                        while ($i < count($tag_list)) {
                            if ($i < 4) $tagOutput .= '<li class="tag-item">' . htmlspecialchars($tag_list[$i]) . '</li>';
                            $i++;
                        }
                    }

                    if (is_array($tag_list) && count($tag_list) > 4) $tagOutput .= "...";

                    $tagOutput .= '</ul>';

                    echo $tagOutput;
                    ?>
                    <h2 class="land-title"><?php the_title(); ?></h2>
                    <p class="land-address">
                        <?php echo get_post_meta(get_the_ID(), 'address', true); ?>
                    </p>
                    <div class="land-pricearea">
                        <span class="min-price"><?php echo get_post_meta(get_the_ID(), 'minmax_price', true)['min']; ?></span>
                        <?php
                        $max_price = get_post_meta(get_the_ID(), 'minmax_price', true)['max'];
                        if ($max_price !== null) {
                            echo '
                                <span class="max-price">
                                '. $max_price .'
                                </span>
                            ';
                        }
                        ?>
                        万円
                    </div>
                    <p class="land-subtitle">
                        <?php echo get_post_meta(get_the_ID(), 'subtitle', true); ?>
                    </p>
                    <table class="table-pc">
                        <tbody>
                            <tr>
                                <td>総区画数</td>
                                <td>販売区画数</td>
                                <td>土地面積</td>
                            </tr>
                            <tr>
                                <td><?php echo get_post_meta(get_the_ID(), 'total_secnum', true); ?></td>
                                <td><?php echo get_post_meta(get_the_ID(), 'sale_secnum', true); ?></td>
                                <td>
                                    <?php echo get_post_meta(get_the_ID(), 'area_range', true); ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table-sp">
                        <tbody>
                            <tr>
                                <td>総区画数</td>
                                <td><?php echo get_post_meta(get_the_ID(), 'total_secnum', true); ?></td>
                            </tr>
                            <tr>
                                <td>販売区画数</td>
                                <td><?php echo get_post_meta(get_the_ID(), 'sale_secnum', true); ?></td>
                            </tr>
                            <tr>
                                <td>土地面積</td>
                                <td>
                                    <?php echo get_post_meta(get_the_ID(), 'area_range', true); ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </a>
        </li>

        <?php
            endwhile;
            echo '</ul>';
            // Pagination
            $total_pages = $land_query->max_num_pages;

            if ($total_pages > 1) {
                // Use the correct variable for the current page
                $current_page = max(1, $paged);
                $pagination_args = array(
                    'current' => $current_page,
                    'total' => $total_pages,
                    'mid_size' => 1,
                    'prev_text' => __('«'),
                    'next_text' => __('»'),
                    'type' => 'array', // Return an array of pagination links
                    'before_page_number' => '<span class="page-number">', // Add custom HTML before each page number
                    'after_page_number' => '</span>', // Add custom HTML after each page number
                    'format' => '?pager=%#%', // Custom format for pagination
                );

                // Generate the pagination links
                $pagination_links = paginate_links($pagination_args);

                // Output the pagination
                echo '<div class="pagination">';
                if (is_array($pagination_links)) {
                    foreach ($pagination_links as $link) {
                        // Add a custom class to the active page link
                        if (strpos($link, 'current') !== false) {
                            $link = str_replace('page-number', 'page-number active', $link);
                        }
                        echo '<div class="pagination-item">' . $link . '</div>'; // Wrap each link with a custom class
                    }
                }
                echo '</div>';
            }

            // Reset the post data to the default query
            wp_reset_postdata();
        else :
            echo '<p class="land-nofound">現在、物件情報がございません。</p>';
        endif;
        ?>
    </div><!-- [ /.site-body-container ] -->
    <?php do_action('lightning_site_body_append', 'lightning_site_body_append'); ?>

</div><!-- [ /.site-body ] -->

<?php if (is_active_sidebar('footer-before-widget')) : ?>
<div class="site-body-bottom">
    <div class="container">
        <?php dynamic_sidebar('footer-before-widget'); ?>
    </div>
</div>
<?php endif; ?>

<?php
do_action('lightning_site_footer_before', 'lightning_site_footer_before');
if (apply_filters('lightning_is_site_footer', true, 'site_footer')) {
    lightning_get_template_part('template-parts/site-footer');
}
do_action('lightning_site_footer_after', 'lightning_site_footer_after');
?>

<?php lightning_get_template_part('footer'); ?>