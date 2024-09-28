<?php
// カスタムタクソノミーのスラッグを指定
$taxonomy = 'case_category';

// カテゴリー一覧を取得
$categories = get_terms(array(
    'taxonomy' => $taxonomy,
    'hide_empty' => false,
));

if (!empty($categories) && !is_wp_error($categories)) {
    echo '<div class="cat_search_wrap">';
    foreach ($categories as $category) {
        echo '<a class="btn_hover_w" href="' . esc_url(get_term_link($category)) . '">' . esc_html($category->name) . '</a>';
    }
    echo '</div>';
}
?>
<?php
// カスタムタクソノミーのスラッグを指定
$taxonomy = 'case_tag';

// カテゴリー一覧を取得
$categories = get_terms(array(
    'taxonomy' => $taxonomy,
    'hide_empty' => false,
));
?>

<div class="tag_search">
<?php
if (!empty($categories) && !is_wp_error($categories)) {
    echo '<div class="tag_search_wrap">';
    echo '<div class="tag_search_wrap_title">スタイル・素材・設備・<br class="d-md-none">こだわりで絞り込む</div>';
    echo '<div class="tag_search_item_wrap">';
    foreach ($categories as $category) {
        echo '<a href="' . esc_url(get_term_link($category)) . '">#' . esc_html($category->name) . '</a>';
    }
    echo '</div>';
    echo '</div>';
}
?>
<div class="tag_search_btn">
	<a href="#">検索する</a>
</div>
<div class="tag_search_right"><a href="#">部屋別・外観から探す</a></div>
</div>