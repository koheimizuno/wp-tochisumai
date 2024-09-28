<?php
/**
 * Singular entry template
 *
 * @package lightning
 */

if ( is_page() ) {
	$entry_tag = 'div';
} else {
	$entry_tag = 'article';
}
?>
<<?php echo esc_attr( $entry_tag ); ?> id="post-<?php the_ID(); ?>" <?php post_class( apply_filters( 'lightning_article_outer_class', 'entry entry-full' ) ); ?>>

	<?php
	// check single or loop that true.
	$is_entry_header_display = false; // is_page() and so on .
	if ( is_single() || is_archive() ) {
		$is_entry_header_display = apply_filters( 'lightning_is_entry_header', true );
	}
	?>

	<?php if ( $is_entry_header_display ) : ?>

		<!-- <header class="<?php lightning_the_class_name( 'entry-header' ); ?>">
			<h1 class="entry-title">
				<?php if ( is_single() ) : ?>
					<?php the_title(); ?>
				<?php else : ?>
					<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
					</a>
				<?php endif; ?>
			</h1>
			<?php lightning_the_entry_meta(); ?>
		</header> -->

	<?php endif; ?>

	<?php do_action( 'lightning_entry_body_before' ); ?>

	<div class="<?php lightning_the_class_name( 'entry-body' ); ?> single_case_entry">
		<?php do_action( 'lightning_entry_body_prepend' ); ?>
		<?php
		//  echo do_shortcode('[case_post]');
		  ?>
<div class="cursor-wrapper">
	<div class="cursor pr_cursor cursor_default">
		<img src="<?php echo esc_url(home_url()); ?>/wp-content/themes/lightning_child/img/case/drag.png" loading="lazy" alt="drag" class="image-56"/>
	</div>
	<!-- <div class="w-embed"></div> -->
</div>
<style>
.cursor-wrapper{
 pointer-events: none;
}
</style>
		<?php
/**
* ギャラリー記事表示用
*/

// 画像一覧取得
if ($post_id == '') {
	$post_id = get_the_ID();
	$title = get_the_title($post_id);
}
$myupload_images = get_post_meta($post_id, 'myupload_images', true ); 
if($myupload_images) {
foreach( $myupload_images as $key => $img_id ){
    $thumb_src_l = wp_get_attachment_image_src($img_id, 'gc-slide-large');
    $thumb_src_s = wp_get_attachment_image_src($img_id, 'gc-slide-thumbnail');
    $thumb_src_l = $thumb_src_l[0];
    $thumb_src_s = $thumb_src_s[0];
    $myupload_div_l.= "<img src=\"$thumb_src_l\" alt=\"$title\">\n";
    $myupload_div_s.= "<img src=\"$thumb_src_s\" alt=\"\">\n";
  }
}

// 投稿コンテンツ取得
$content_post = get_post($post_id);

// カスタムフィールドの値を取得
$scf_arr = "";
if( class_exists('SCF') ) {
	$scf_data = SCF::gets($post_id);
	foreach ($scf_data as $key => $val) { // カスタムフィールドの値を追加
		if ($val != "") {
			$scf_arr.= "<tr><th>$key</th><td>$val</td></tr>\n";
		}
	}
}

// カテゴリを取得
$terms = get_the_terms($post_id, 'case_category'); 
$t_slug=''; 
foreach((array)$terms as $term) { 
	$term_name = $term->name; $t_slug = $t_slug.$term_name.',';
} 
$t_slug = substr($t_slug, 0, -1);	
?>

<article id="gc_gallery_post">
	<!-- <header class="gc-gallery-head">
		<div class="head-meta">
			<time datetime="<?php the_time('Y.m.d'); ?>" class="f-serif"><?php the_time('Y.m.d'); ?></time>
			<?php if($t_slug != '') : ?><div class="gc-category"><?php echo $t_slug ?></div><?php endif; ?>
		</div>
		<h1 class="entry-title"><span><?php the_title();?></span></h1>
	</header> -->

	<div class="single_case_top flex">
    <div class="single_case_top_l">
		  <?php if(!empty($myupload_div_l)) :
				if($myupload_images) {
					$img_id = reset($myupload_images); // 最初の画像IDを取得
					$thumb_src_l = wp_get_attachment_image_src($img_id, 'gc-slide-large');
					$thumb_src_l = $thumb_src_l[0];
					$myupload_div_l_first = "<img src=\"$thumb_src_l\" alt=\"$title\">\n";
			  } ?>
	    	<?php echo $myupload_div_l_first; ?>
	    <?php endif; ?>
		</div>
    <div class="single_case_top_r">
			<?php the_content(); ?>
		</div>
	</div>

	<div class="single_case_content flex">
		<div class="single_case_content_l">
			<h2 class="single_case_content">粋の作品集</h2>
		</div>
		<div class="single_case_content_r">
		  <?php if(!empty($myupload_div_l)) :
				if($myupload_images) {
					$first_image = true; // 最初の画像をスキップするためのフラグ
					foreach( $myupload_images as $key => $img_id ){
							if ($first_image) {
									$first_image = false;
									continue; // 最初の画像をスキップ
							}
							$thumb_src_l = wp_get_attachment_image_src($img_id, 'gc-slide-large');
							$thumb_src_l = $thumb_src_l[0];
							$myupload_div_l_second.= "<img src=\"$thumb_src_l\" alt=\"$title\">\n";
							$myupload_div_s.= "<img src=\"$thumb_src_s\" alt=\"\">\n";
					}
			  } ?>
	      <div class="slider slider-for">
	      	<?php echo $myupload_div_l_second; ?>
		    </div>
	    <?php endif; ?>
		</div>
	</div>

<?php if(!empty($myupload_div_l)) :
  if($myupload_images) {
  	foreach( $myupload_images as $key => $img_id ){
  			$thumb_src_l = wp_get_attachment_image_src($img_id, 'gc-slide-large');
  			$thumb_src_l = $thumb_src_l[0];
				$myupload_div_l_slide.= "<div class='tricks-slider_slide'><img class='image_plallax' src=\"$thumb_src_l\" alt=\"$title\">\n</div>";
			}}
		?>
<div class="slider_box">
	<div class="tricks-slider">
		<?php echo $myupload_div_l_slide; ?>
	</div>
	<div class="progress"><div class="progress_fill"></div></div>
</div>
<?php endif; ?>



	<!-- <div class="gc-gallery-meta">
		<div class="gc-entry"><?php echo wpautop($content_post->post_content); ?></div>
		<?php if($scf_arr != "") { // カスタムフィールドの値を表示
			echo "<table class=\"gc-meta-table\">\n";
			echo $scf_arr."\n";
			echo "</table>\n";
		} ?>
	</div> -->

	

	<?php
$args = array(
    'post_type' => 'case',
    'post_status' => 'publish',
    'posts_per_page' => 3,
);
if ($ids != 0) {
	$ids = explode(',',$ids);
	$args += array('post__in' => $ids);
}
if($cat != '') { // カテゴリ指定
	$catarr = array(
    'tax_query'      => array(
	    array(
	      'taxonomy' => 'case_category',
	      'field'    => 'slug',
	      'terms'    =>  $cat
	    )
	  )
	);
	$args += $catarr;
}
query_posts($args);
?>
<div class="gc_gallery-wrap">
<?php 
if ( have_posts() ) : while ( have_posts() ) : the_post();
	$img = "";
	$myupload_images = get_post_meta(get_the_ID(), 'myupload_images', true ); 
	if (count($myupload_images) > 0) {
		$thumb_src = wp_get_attachment_image_src($myupload_images[0],'case_list');
	 	$img = '<img src="'.$thumb_src[0].'" alt="">';
	}
?>
    	<div class="gc_gallery-item">
    		<a href="<?php the_permalink(); ?>">
    			<?php echo $img; ?>
					<h2 class="gc_post-title"><?php the_title();?></h2>
					<div class="cat"><?php
					        $categories = get_the_terms(get_the_ID(), 'case_category');
									if (!empty($categories) && !is_wp_error($categories)) {
											// 最初のカテゴリを取得
											$first_category = $categories[0];
											echo esc_html($first_category->name);
									}
					?></div>
    		</a>
    	</div>
    	
	<?php endwhile; wp_reset_query(); ?>
</div>
<?php else : // 記事なし ?>
	<p>現在ギャラリーはありません</p>
<?php endif; ?>

<a href="<?php echo esc_url(home_url()); ?>/case/" class="btn btn_hover_w">一覧を見る</a>

<?php get_template_part('template-parts/tag_search'); ?>
</article>
    <?php
		//  get_template_part('module_loop_post_meta');
		 ?>
		<?php
		//  the_content();
		  ?>
		<?php do_action( 'lightning_entry_body_apppend' ); ?>
	</div>

	<?php do_action( 'lightning_entry_body_after' ); ?>

	<?php
	// $args = array(
	// 	'before'      => '<nav class="page-link"><dl><dt>Pages :</dt><dd>',
	// 	'after'       => '</dd></dl></nav>',
	// 	'link_before' => '<span class="page-numbers">',
	// 	'link_after'  => '</span>',
	// 	'echo'        => 1,
	// );
	// wp_link_pages( $args );
	?>

	<?php do_action( 'lightning_entry_footer_before' ); ?>

	<?php if ( apply_filters( 'lightning_is_entry_footer', true ) ) : ?>



	<?php endif; ?>

</<?php echo esc_attr( $entry_tag ); ?>><!-- [ /#post-<?php the_ID(); ?> ] -->

<script>
    var homeUrl = '<?php echo esc_url( home_url( '/' ) ); ?>'; // PHPで生成されたURLをJavaScriptに渡す
</script>
