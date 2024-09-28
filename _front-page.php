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


  <div class="bg_fixed_wrap">
    <div class="bg_fixed">
      <video playsinline autoplay muted loop src="<?php echo get_stylesheet_directory_uri(); ?>/movie/movie.mp4">
      </video>
    </div>
  </div>
  <div class="fv_wrap main_visual">
    <div class="glow_animation"></div>
    <div class="main-slider">
  <li class="item">
    <div class="js-parallax itemImg item01 lazyload"
      style="background: url('<?php echo get_stylesheet_directory_uri(); ?>/img/top/fv_bg1.jpg') center center no-repeat; background-size: cover;"></div>
  </li>
  <li class="item">
    <div class="js-parallax itemImg item02 lazyload"
      style="background: url('<?php echo get_stylesheet_directory_uri(); ?>/img/top/fv_bg2.jpg') center center no-repeat; background-size: cover;"></div>
  </li>
  <li class="item">
    <div class="js-parallax itemImg item03 lazyload"
      style="background: url('<?php echo get_stylesheet_directory_uri(); ?>/img/top/fv_bg3.jpg') center center no-repeat; background-size: cover;"></div>
  </li>
  <li class="item">
    <div class="js-parallax itemImg item04 lazyload"
      style="background: url('<?php echo get_stylesheet_directory_uri(); ?>/img/top/fv_bg4.jpg') center center no-repeat; background-size: cover;"></div>
  </li>
  <li class="item">
    <div class="js-parallax itemImg item05 lazyload"
      style="background: url('<?php echo get_stylesheet_directory_uri(); ?>/img/top/fv_bg5.jpg') center center no-repeat; background-size: cover;"></div>
  </li>
</div>

    <div class="container">
      <!-- <h1 class="fv_text_main"><span class="big">粋</span>と<span class="big">共</span>に、 <br><span class="big">粋</span>にくらす。</h1> -->
      <h1 class="fv_text_main"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/top/fv_text.png" alt=""></h1>
      <p class="fv_text_sub">Living with<br>sophisticated</p>
    </div>
  </div>
  <div class="enjoy">
    <h2 class="enjoy_title"><span class="small en">About sui</span>粋を知る</h2>
    <div class="enjoy_container">
      <div class="enjoy_wrap1 flex">
        <div class="enjoy_text_wrap loop1">
          <a href="#" class="enjoy_text enjoy_text1">陰翳礼讃の<br>美意識</a>
          <a href="#" class="enjoy_text enjoy_text2">日本文学にみる<br>「明るさ」の定義</a>
          <a href="#" class="enjoy_text enjoy_text3">大和比 白銀比</a>
          <a href="#" class="enjoy_text enjoy_text4">濡縁(ぬれえん)に腰掛け<br>庭を眺める</a>
          <a href="#" class="enjoy_text enjoy_text5">自然との<br>調和を尊し</a>
          <a href="#" class="enjoy_text enjoy_text6">もののあはれ</a>
          <a href="#" class="enjoy_text enjoy_text7">日本の四季</a>
          <a href="#" class="enjoy_text enjoy_text8">光と陰が織りなす風流</a>
          <a href="#" class="enjoy_text enjoy_text9">「一室一灯」から<br>「多灯分散」へ</a>
          <a href="#" class="enjoy_text enjoy_text10">幽玄</a>
          <a href="#" class="enjoy_text enjoy_text11">「内」と「外」を<br>ゆるやかに隔てる</a>
          <a href="#" class="enjoy_text enjoy_text12">景色を切り取る<br>「借景」</a>
          <a href="#" class="enjoy_text enjoy_text13">静謐さ</a>
          <a href="#" class="enjoy_text enjoy_text14">頑丈で強い<br>イメージの石が鎮座する</a>
          <a href="#" class="enjoy_text enjoy_text15">和庭に静けさ</a>
        </div>
        <div class="enjoy_text_wrap loop1">
          <a href="#" class="enjoy_text enjoy_text1">陰翳礼讃の<br>美意識</a>
          <a href="#" class="enjoy_text enjoy_text2">日本文学にみる<br>「明るさ」の定義</a>
          <a href="#" class="enjoy_text enjoy_text3">大和比 白銀比</a>
          <a href="#" class="enjoy_text enjoy_text4">濡縁(ぬれえん)に腰掛け<br>庭を眺める</a>
          <a href="#" class="enjoy_text enjoy_text5">自然との<br>調和を尊し</a>
          <a href="#" class="enjoy_text enjoy_text6">もののあはれ</a>
          <a href="#" class="enjoy_text enjoy_text7">日本の四季</a>
          <a href="#" class="enjoy_text enjoy_text8">光と陰が織りなす風流</a>
          <a href="#" class="enjoy_text enjoy_text9">「一室一灯」から<br>「多灯分散」へ</a>
          <a href="#" class="enjoy_text enjoy_text10">幽玄</a>
          <a href="#" class="enjoy_text enjoy_text11">「内」と「外」を<br>ゆるやかに隔てる</a>
          <a href="#" class="enjoy_text enjoy_text12">景色を切り取る<br>「借景」</a>
          <a href="#" class="enjoy_text enjoy_text13">静謐さ</a>
          <a href="#" class="enjoy_text enjoy_text14">頑丈で強い<br>イメージの石が鎮座する</a>
          <a href="#" class="enjoy_text enjoy_text15">和庭に静けさ</a>
        </div>
      </div>
      <div class="enjoy_wrap2 flex">
        <div class="enjoy_text_en_wrap loop2">
          <a href="#" class="enjoy_text enjoy_text_en1 en">Yamatohi</a>
          <a href="#" class="enjoy_text enjoy_text_en2 en">Akarusa</a>
          <a href="#" class="enjoy_text enjoy_text_en3 en">Tatoubunsan</a>
          <a href="#" class="enjoy_text enjoy_text_en4 en">Uchi to soto</a>
        </div>
        <div class="enjoy_text_en_wrap loop2">
          <a href="#" class="enjoy_text enjoy_text_en1 en">Yamatohi</a>
          <a href="#" class="enjoy_text enjoy_text_en2 en">Akarusa</a>
          <a href="#" class="enjoy_text enjoy_text_en3 en">Tatoubunsan</a>
          <a href="#" class="enjoy_text enjoy_text_en4 en">Uchi to soto</a>
        </div>
      </div>
      <div class="enjoy_wrap3 flex">
        <div class="enjoy_img_wrap loop3">
          <div class="enjoy_img1"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/top/enjoy_img2.jpg" alt="粋"></div>
          <div class="enjoy_img2"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/top/enjoy_img5.jpg" alt="粋"></div>
          <div class="enjoy_img3"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/top/enjoy_img1.jpg" alt="粋"></div>
          <div class="enjoy_img4"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/top/enjoy_img4.jpg" alt="粋"></div>
          <div class="enjoy_img5"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/top/enjoy_img3.jpg" alt="粋"></div>
          <div class="enjoy_img6"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/top/enjoy_img6.jpg" alt="粋"></div>
        </div>
        <div class="enjoy_img_wrap loop3">
          <div class="enjoy_img1"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/top/enjoy_img2.jpg" alt="粋"></div>
          <div class="enjoy_img2"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/top/enjoy_img5.jpg" alt="粋"></div>
          <div class="enjoy_img3"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/top/enjoy_img1.jpg" alt="粋"></div>
          <div class="enjoy_img4"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/top/enjoy_img4.jpg" alt="粋"></div>
          <div class="enjoy_img5"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/top/enjoy_img3.jpg" alt="粋"></div>
          <div class="enjoy_img6"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/top/enjoy_img6.jpg" alt="粋"></div>
        </div>
      </div>
      <!-- <div class="enjoy_btn_wrap">
        <a href="#" class="enjoy_btn btn_hover_w">詳しくはこちら</a>
      </div> -->
    </div>
  </div>
<div class="about_wrap">
  <!-- <section id="about1" class="about">
    <div class="container">
      <div class="about_wrap flex">
        <div class="about_wrap_box flex">
          <h2 class="about_title1"><span class="small">About sui</span>粋を知る</h2>
          <div class="about_text_wrap flex">
            <h3 class="about_title2">ノーブルホームが手掛ける<br>本物の和の住宅</h3>
            <p class="about_text">
              古来より日本人が大切にしてきた感性や美意識。<br>
              今日でも気づかぬうちに<br>
              私たちのDＮＡに脈々と受け継がれています。<br>
              この先人たちの知恵を活かした住まいを<br>
              茨城県住宅着工棟数ランキング8年連続ナンバー1の<br>
              ノーブルホームの新ブランド「粋s u i 」が叶えます。
            </p>
            <a href="#" class="about_btn">詳しくはこちら</a>
          </div>
        </div>
      </div>
    </div>
  </section> -->
  <div id="about1" class="about"></div>
  <section id="about2" class="about">
    <div class="container">
      <div class="about_wrap flex">
        <div class="about_wrap_box flex">
          <h2 class="about_title1"><span class="small en">Works</span>手がけた家</h2>
          <div class="about_text_wrap">
            <p class="about_text_top">粋の手がけた作品集一覧です。</p>
            <?php
            $args = array(
    'post_type' => 'case',
    'post_status' => 'publish',
    'posts_per_page' => 6,
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
		$thumb_src = wp_get_attachment_image_src($myupload_images[0],'top_case');
	 	$img = '<img src="'.$thumb_src[0].'" alt="">';
	}
?>
    	<div class="gc_gallery-item">
    		<a href="<?php the_permalink(); ?>">
    			<?php echo $img; ?>
					<h2 class="gc_post-title"><?php the_title();?></h2>
    		</a>
    	</div>
    	
	<?php endwhile; wp_reset_query(); ?>
</div>
<?php else : // 記事なし ?>
	<p>現在ギャラリーはありません</p>
<?php endif; ?>
            <a href="<?php echo esc_url(home_url()); ?>/case/" class="about_btn btn_hover_w">詳しくはこちら</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="about3" class="about">
    <div class="container">
      <div class="about_wrap flex">
        <div class="about_wrap_box flex">
          <h2 class="about_title1"><span class="small en">Event</span>イベント情報</h2>
          <div class="about_text_wrap">
          <p class="about_text_top">粋の家ではイベントを<br class="d-md-none">実施しています。</p>

          <?php
            $args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 3,
);
	$catarr = array(
    'tax_query'      => array(
	    array(
	      'taxonomy' => 'category',
	      'field'    => 'slug',
	      'terms'    =>  'event'
	    )
	  )
	);
	$args += $catarr;
query_posts($args);
?>
<div class="top_event_wrap">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    		<a class="top_event_item" href="<?php the_permalink(); ?>">
          <?php if ( has_post_thumbnail() ) : ?>
              <div class="top_event_thumbnail">
                  <?php the_post_thumbnail('top_event'); ?>
              </div>
          <?php endif; ?>
					<h2 class="top_event_title"><?php the_title();?></h2>
    		</a>
	<?php endwhile; wp_reset_query(); ?>
</div>
<?php else : // 記事なし ?>
	<p>現在イベントはありません</p>
<?php endif; ?>
<a href="<?php echo esc_url(home_url()); ?>/event/" class="about_btn btn_hover_w">詳しくはこちら</a>

      </div>
    </div>
  </section>

  
  <section class="aesthetics about">
    <div class="container">
      <div class="text_wrap flex">
        <h2 class="aesthetics_title">日本人の感性</h2>
        <p class="aesthetics_text">
        古来より日本人が大切にしてきた感性や美意識。<br>
        今でも気づかぬうちに私たちのDNAに<br>
        脈々と受け継がれています。<br>
        <br>
        粋の考える「和の家」とは<br>
        ・本物であること<br>
        ・普遍的な価値があること<br>
        ・唯一無二の存在であること<br>
        ・社会性があること<br>
        ・自由度の高い設計ができること<br>
        ・自然素材へのこだわりがあること
        </p>
      </div>
    </div>
  </section>
  </div>
  <div class="bg_cover">
    <div class="aesthetics_img1_wrap">
      <div class="aesthetics_img1">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/top/aesthetics_img1.jpg" alt="日本という美学">
      </div>
    </div>
    <div class="aesthetics_img2_wrap">
      <div class="container">
        <div class="container_wide_right">
          <div class="aesthetics_img2">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/top/aesthetics_img2.jpg" alt="日本という美学">
          </div>
        </div>
      </div>
    </div>
    <div class="aesthetics_img3_wrap">
      <div class="aesthetics_img3">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/top/aesthetics_img3.jpg" alt="日本という美学">
      </div>
    </div>
  </div>
  <section class="seasons">
    <div class="seasons_container">
      <div class="seasons_text_wrap">
        <div class="text_wrap">
          <div class="seasons_text_wrap">
            <!-- <p class="seasons_subtitle">Wabi sabi</p> -->
            <h2 class="seasons_title">粋 -sui-</h2>
            <p class="seasons_text">
              住宅街で建物に囲まれた立地のデメリットを、間取りと窓の配置で上手く解消したお宅。<br>
              中庭を配することで、外部には閉じ、中には開く計画としました。<br><br>
              建築地によって、周辺環境の条件は無数にありますが、メリットを生かし、デメリットを最小化できるのは注文住宅ならでは。<br>
              キッチンやTVボードなどもオリジナルの造作品にこだわり、お施主様ならではのこだわりの詰まった家になりました。
            </p>
          </div>
          <a href="/case/" class="seasons_btn">詳細はこちら</a>
        </div>
        <div class="text_wrap">
          <div class="seasons_text_wrap">
            <!-- <p class="seasons_subtitle">Kisubunka</p> -->
            <h2 class="seasons_title">環を描く和の家</h2>
            <p class="seasons_text">
              住宅街の中で存在感を放つ瓦葺の家。<br>
              大きく吹き降ろした瓦屋根が、どっしりとした邸宅の印象を与えます。プライバシーに配慮し、道路側には大きな窓を設けず、格子組が目隠しと意匠を両立させています。<br>
              桧や漆喰などの和の素材感もさることながら、苔山と白砂利からなる中庭も、和の印象をグッと引き立てています。<br>
              造作の葦戸越しに、水盤に揺らぐ水面を眺めると、心に涼やかな風が流れるようです。
            </p>
          </div>
          <a href="/case/" class="seasons_btn">詳細はこちら</a>
        </div>
        <div class="text_wrap">
          <div class="seasons_text_wrap">
            <!-- <p class="seasons_subtitle">Aimaisa</p> -->
            <h2 class="seasons_title">和の家</h2>
            <p class="seasons_text">
              お施主様は和の文化や伝統にとても関心をお持ちの方。<br>
              そこで、素材や色合いなどとにかく「和を感じるもの」「和の伝統に裏付けされたもの」を使用することにしました。<br>
              贈答品の箱などに使われる事の多い「うるし紙」を壁紙代わりに使用したり、茶室のにじり口にインスパイアされた書斎を設けたり、紫や紅色などの日本伝統色を随所に設えたり。<br>
              まさに、「古きを温め新しきを知る」を地で行くお家です。
            </p>
          </div>
          <a href="/case/" class="seasons_btn">詳細はこちら</a>
        </div>
      </div>
      <div class="seasons_img_wrap">
        <div class="seasons_img">
          <figure class="img" data-original="<?php echo get_stylesheet_directory_uri(); ?>/img/top/seasons_bg1.jpg" alt="春夏秋冬"></figure>
        </div>
        <div class="seasons_img">
          <figure class="img" data-original="<?php echo get_stylesheet_directory_uri(); ?>/img/top/seasons_bg2.jpg" alt="春夏秋冬"></figure>
        </div>
        <div class="seasons_img">
          <figure class="img" data-original="<?php echo get_stylesheet_directory_uri(); ?>/img/top/seasons_bg3.jpg" alt="春夏秋冬"></figure>
        </div>
      </div>
    </div>
  </section>
  <div class="experience_bg">
  <section class="scent">
    <div class="scent_bg">
      <div class="container">
        <h2 class="scent_title">和の建築における工夫</h2>
        <p class="scent_text">
        日本人ならではの美意識は、<br>
        様々な形で日本の建築に表現されています。<br><br>
        そんな先人たちの知恵を見直すことが、<br class="d-none d-md-block">
        現代で建築を手掛ける私たちにも<br class="d-none d-md-block">
        必要なのかもしれません。
        </p>
      </div>
    </div>
  </section>
  <div class="experience">
    <div class="experience_container">
      <div class="movie_wrap">
        <div class="movie">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/top/modelhouse1.jpg" alt="MODEL HOUSE">
        </div>
        <div class="arrow">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/top/experience_arrow.png" alt="再生ボタン">
        </div>
      </div>
      <div class="experience_text_wrap">
        <div class="experience_text_left">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/top/experience_text1.png" alt="MODEL HOUSE">
        </div>
        <div class="experience_text_right">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/top/experience_text.png" alt="EXPERIENCE">
        </div>
      </div>
      <div class="modelhouse_wrap1">
        <div class="modelhouse_item">
          <h2 class="title">粋 -sui つくば展示場</h2>
          <p class="text">茨城県つくば市研究学園6-51-12つくばハウジングパーク内</p>
          <a href="#" class="btn btn_hover_w">展示場に行ってみる</a>
        </div>
      </div>
    </div>
  </div>

  <div class="modelhouse_wrap modelhouse_wrap2">
    <div class="modelhouse_item fadein">
      <div class="img">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/top/modelhouse2.jpg" alt="MODEL HOUSE">
      </div>
      <h2 class="title">環を描く和の家</h2>
      <p class="text">茨城県つくば市谷田部（陣場）</p>
      <a href="#" class="btn btn_hover_w">展示場に行ってみる</a>
    </div>
  </div>
  <div class="modelhouse_wrap modelhouse_wrap3">
    <div class="modelhouse_item fadein">
      <div class="img">
        <a data-fancybox  href="<?php echo get_stylesheet_directory_uri(); ?>/movie/movie_mito.mp4">
          <video src="<?php echo get_stylesheet_directory_uri(); ?>/movie/movie_mito.mp4"  autoplay muted playsinline></video>
          <div class="arrow">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/top/experience_arrow.png" alt="再生ボタン">
          </div>
        </a>
      </div>
      <h2 class="title">和の家</h2>
      <p class="text">茨城県水戸市笠原町83-32</p>
      <a href="#" class="btn btn_hover_w">展示場に行ってみる</a>
    </div>
  </div>
  </div>
  <div class="bg_panel_wrap">
    <div class="bg_panel bg_panel1_0"></div>


  <?php
do_action( 'lightning_site_footer_before', 'lightning_site_footer_before' );
if ( apply_filters( 'lightning_is_site_footer', true, 'site_footer' ) ) {
	lightning_get_template_part( 'template-parts/site-footer' );
}
do_action( 'lightning_site_footer_after', 'lightning_site_footer_after' );
?>

<?php lightning_get_template_part( 'footer' ); ?>