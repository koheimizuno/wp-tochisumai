<?php
// カスタムタクソノミーのスラッグを指定
$taxonomy = 'case_category';

// カテゴリー一覧を取得
$categories = get_terms(array(
    'taxonomy' => $taxonomy,
    'hide_empty' => false,
));

// if (!empty($categories) && !is_wp_error($categories)) {
//     echo '<div class="cat_search_wrap">';
//     foreach ($categories as $category) {
//         echo '<a class="btn_hover_w" href="' . esc_url(get_term_link($category)) . '">' . esc_html($category->name) . '</a>';
//     }
//     echo '</div>';
// }
// ?>



<div class="tag_search">
    <form method="get" action="<?php echo esc_url(home_url('/')); ?>case/">
        <div class="tag_search_wrap">
            <div class="tag_search_cat_wrap open">
                <div class="tag_search_wrap_title">
                    <?php echo esc_html(get_taxonomy('sense')->label); ?>で選ぶ
                    <span class="toggle-btn"></span>
                </div>
                <div class="tag_search_item_wrap">
                    <?php
                    $terms = get_terms(array(
                        'taxonomy' => 'sense',
                        'hide_empty' => false,
                    ));
                    if (!empty($terms) && !is_wp_error($terms)) :
                        foreach ($terms as $term) : ?>
                            <label>
                                <input type="checkbox" name="sense[]" value="<?php echo esc_attr($term->slug); ?>">
                                <span class="cat_label">
                                    <?php echo esc_html($term->name); ?>
                                </span>
                            </label>
                        <?php endforeach;
                    endif;
                    ?>
                </div>
            </div>
            <div class="additional-filters">
                <?php
                $taxonomies = array('style', 'situation', 'area'); // 他のタクソノミーのスラッグを配列に追加
                foreach ($taxonomies as $taxonomy) {
                    $terms = get_terms(array(
                        'taxonomy' => $taxonomy,
                        'hide_empty' => false,
                    ));
                    if (!empty($terms) && !is_wp_error($terms)) : ?>
                        <div class="tag_search_cat_wrap collapsed">
                            <div class="tag_search_wrap_title">
                                <?php echo esc_html(get_taxonomy($taxonomy)->label); ?>で選ぶ
                            </div>
                            <div class="tag_search_item_wrap">
                                <?php foreach ($terms as $term) : ?>
                                    <label>
                                        <input type="checkbox" name="<?php echo esc_attr($taxonomy); ?>[]" value="<?php echo esc_attr($term->slug); ?>">
                                        <span class="cat_label">
                                            <?php echo esc_html($term->name); ?>
                                        </span>
                                    </label>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif;
                }
                ?>
            </div>
        </div>
        <div class="tag_search_btn">
            <button type="submit">検索する</button>
        </div>
    </form>
    <div class="tag_search_right"><a href="#">部屋別・外観から探す</a></div>
</div>

<script>
    jQuery(document).ready(function($) {
    $('.toggle-btn').on('click', function() {
        $(this).closest('.tag_search_wrap').toggleClass('open');
        $('.additional-filters').slideToggle();
    });
    });
</script>
