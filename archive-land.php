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

        <div class="sec-search">
            <div class="sec-search-title-wrapper">
                <p class="sec-search-title">条件で絞り込む</p>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/land/close.png" alt="close">
            </div>
            <div class="sec-search-content"></div>
        </div>

        <div class="perpagesortsec">
            <div class="itemSelect">
                <label for="listrows">表示件数</label>
                <div class="custom-select" id="listrows">
                    <div class="select-box" id="selectBox1"><?php echo (isset($_GET['listrows']) && $_GET['listrows']) ? $_GET['listrows'] . '件' : "表示件数"; ?></div>
                    <div class="options-container" id="optionsContainer1">
                    <div class="option <?php echo (isset($_GET['listrows']) && $_GET['listrows'] == 2) ? 'active-option' : ''; ?>" data-value="2">2件</div>
                    <div class="option <?php echo (isset($_GET['listrows']) && $_GET['listrows'] == 3) ? 'active-option' : ''; ?>" data-value="3">3件</div>
                    <div class="option <?php echo (isset($_GET['listrows']) && $_GET['listrows'] == 4) ? 'active-option' : ''; ?>" data-value="4">4件</div>
                    </div>
                </div>
            </div>
            <div class="itemSelect">
                <label for="order">並び替え</label>
                <div class="custom-select" id="sort">
                    <?php
                        function get_sort_options_str($sort) {
                            switch ($sort) {
                                case "modified_DESC":
                                    return "新着順";
                                case "price_ASC":
                                    return "価格が安い";
                                case "price_DESC":
                                    return "価格が高い";
                                case "land_DESC":
                                    return "土地面積が広い";
                                case "land_ASC":
                                    return "土地面積が狭い";
                            }
                        }
                    ?>
                    <div class="select-box" id="selectBox1"><?php echo (isset($_GET['sort']) && $_GET['sort']) ? get_sort_options_str($_GET['sort']) : "新着順"; ?></div>
                    <div class="options-container" id="optionsContainer1">
                        <div class="option <?php echo (isset($_GET['sort']) && $_GET['sort'] == "modified_DESC") ? 'active-option' : ''; ?>" data-value="modified_DESC">新着順</div>
                        <div class="option <?php echo (isset($_GET['sort']) && $_GET['sort'] == "price_ASC") ? 'active-option' : ''; ?>" data-value="price_ASC">価格が安い</div>
                        <div class="option <?php echo (isset($_GET['sort']) && $_GET['sort'] == "price_DESC") ? 'active-option' : ''; ?>" data-value="price_DESC">価格が高い</div>
                        <div class="option <?php echo (isset($_GET['sort']) && $_GET['sort'] == "land_DESC") ? 'active-option' : ''; ?>" data-value="land_DESC">土地面積が広い</div>
                        <div class="option <?php echo (isset($_GET['sort']) && $_GET['sort'] == "land_ASC") ? 'active-option' : ''; ?>" data-value="land_ASC">土地面積が狭い</div>
                    </div>
                </div>
            </div>            
        </div>

        <?php
        // Define how many posts you want per page
        $posts_per_page = isset($_GET['listrows']) ? intval($_GET['listrows']) : 3;

        // Get the current page number
        $paged = isset($_GET['pager']) ? intval($_GET['pager']) : 1;

        $query_sort = isset($_GET['sort']) ? $_GET['sort'] : "modified_DESC";

        $sort_meta_key = '';
        $sort_order = '';
        $sort_orderby = [];

        switch ($query_sort) {
            case 'price_ASC':
                $sort_meta_key = "min_price";
                $sort_orderby = array(
                    'meta_value_num' => 'ASC',
                    'date' => 'DESC',
                );
                $sort_order = null;
                break;
            case 'price_DESC':
                $sort_meta_key = "max_price";
                $sort_orderby = array(
                    'meta_value_num' => 'DESC',
                    'date' => 'DESC',
                );
                $sort_order = null;
                break;
            case 'land_DESC':
                $sort_meta_key = "min_area";
                $sort_orderby = array(
                    'meta_value_num' => 'DESC',
                    'date' => 'DESC',
                );
                $sort_order = null;
                break;
            case 'land_ASC':
                $sort_meta_key = "max_area";
                $sort_orderby = array(
                    'meta_value_num' => 'ASC',
                    'date' => 'DESC',
                );
                $sort_order = null;
                break;
            default:
                $sort_meta_key = null;
                $sort_orderby = 'date';
                $sort_order = 'DESC';
                break;
        }

        $args = array(
            'post_type' => 'land',
            'posts_per_page' => -1,
            'meta_key' => "",
            'paged' => $paged,
            'meta_key' => $sort_meta_key,
            'orderby' => $sort_orderby,
            'order' => $sort_order,
            // 'meta_query' => array(
            //     array(
            //         'key' => 'subtitle',
            //         'value' => '菅谷東小',
            //         'compare' => 'LIKE',
            //         'type' => 'CHAR' 
            //     ),
            // ),
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
                        <span class="min-price"><?php echo number_format(get_post_meta(get_the_ID(), 'min_price', true)); ?></span>
                        <?php
                        $max_price = get_post_meta(get_the_ID(), 'max_price', true);
                        if ($max_price !== "") {
                            echo '
                                <span class="max-price">
                                '. (is_numeric($max_price) ? number_format((float)$max_price) : '') .'
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