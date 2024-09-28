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

		<header class="<?php lightning_the_class_name( 'entry-header' ); ?>">
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
		</header>

	<?php endif; ?>

	<?php do_action( 'lightning_entry_body_before' ); ?>

	<link rel='stylesheet' id='modelhouse-css' href='<?php echo home_url(); ?>/wp-content/themes/lightning_child/css/modelhouse.css' type='text/css' media='all' />

	<div class="<?php lightning_the_class_name( 'entry-body' ); ?>">
		<?php do_action( 'lightning_entry_body_prepend' ); ?>
		<?php //the_content(); ?>
		<div class="content-inner">
    <div class="wrap">
      <div class="mv">
        <p class="mv__title">sui</p>
        <div class="mv__img">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/modelhouse/fv.png" alt="SUI">
        </div>
      </div>
  
      <div class="intro">
        <div class="intro__inner ">
          <div class="intro__img">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/modelhouse/intro.png" alt="店舗の外観">
          </div>
          <div class="intro__body">
            <div class="intro__bg">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/modelhouse/intro-bg.png" alt="image">
            </div>
            <div class="intro__head-wrap">
              <p class="intro__head">家づくりを考え始めたら、<br>まずはノーブルホームに<br>お越しください。</p>
              <p class="intro__text">みなさまに、ノーブルホームの家づくりに<br>触れていただけるスタジオをご用意しております。<br>是非一度スタジオにお越し下さい。<br>みなさまにお会い出来る日を楽しみに、<br>スタッフ一同心よりお待ちしております。</p>
            </div>
          </div>
        </div>
      </div>
  
      <div class="merit l-merit">
        <div class="merit__inner">
          <div class="merit__head-wrap">
            <div class="merit__head">
              <p class="merit__head-lead">初めての家づくりが具体的に進む</p>
              <p class="merit__head-lead section-heading-ja"><span>3</span>つのメリット</p>
            </div>
            <div class="merit__bg u-desktop">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/modelhouse/merit-bg.png" alt="image">
            </div>
          </div>
          <ol class="merit__card merit-card">
            <p class="merit-card__hrading section-heading-en">merit</p>
            <li class="merit-card__item">
              <div class="merit-card__img">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/modelhouse/merit01.png" alt="メリット1">
              </div>
              <div class="merit-card__body">
                <p class="merit-card__title">住宅の質感を体感できます</p>
                <p class="merit-card__description">カタログや資料だけではなく、高機密・高断熱の木の住まいや、家事動線や収納スペースの女性目線で叶った工夫など、資料やサンプルを見ながら、触ってご体感いただけます。</p>
              </div>
            </li>
            <li class="merit-card__item">
              <div class="merit-card__img">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/modelhouse/merit02.png" alt="メリット2">
              </div>
              <div class="merit-card__body">
                <p class="merit-card__title">過去の間取り図が見れる</p>
                <p class="merit-card__description">当社で建てた間取り図を参考までに閲覧いただく事が可能です。これから家づくりを検討する際に、間取りやそれに合った広さの健闘、敷地の検討をする際などに役立ちます。</p>
              </div>
            </li>
            <li class="merit-card__item">
              <div class="merit-card__img">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/modelhouse/merit03.png" alt="メリット3">
              </div>
              <div class="merit-card__body">
                <p class="merit-card__title">3人1組で幅広くプランニング</p>
                <p class="merit-card__description">専任のプランナーが3人1組で、お客様のご希望やライフスタイルに合わせたプランニングを行います。理想の住まいを実現するための最適な提案を行い、家づくりの全プロセスをサポートします。
                </p>
              </div>
            </li>
          </ol>
        </div>
      </div>
  
      <div class="bg-img">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/modelhouse/bg01.png" alt="庭の写真">
      </div>

      <div class="cta">
        <div class="cta__inner wrap">
          <div class="section-inner">
            <p class="cta__message">家づくり、まずは始めてみましょう</p>
            <p class="cta__message">思い立ったら、ノーブルホームまでどうぞ</p>
            <div class="cta__btn-wrap">
              <a href="#" class="cta-btn">
              来店予約
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="model-house">
        <div class="model-house__inner">
          <div class="model-house__body">
            <div class="model-house__head">
              <p class="model-house__heading section-heading-ja">モデルハウス</p>
              <div class="model-house__img-wrap">
                <p class="model-house__heading-en section-heading-en">model house</p>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/modelhouse/modelhouse01.png" alt="モデルハウスの写真">
              </div>
            </div>
            <div class="model-house__about wrap">
              <div class="model-house__about-inner  section-inner">
                <p class="model-house__title">ノーブルホーム</p>
                <div class="model-house__text-wrap">
                  <p class="model-house__description">茨城県つくば市、つくばハウジングパーク内に粋のモデルハウスがございます。<br>粋のモデルハウスは、先人たちの優れた美意識や、世界に誇れる建築技法を現代の日本人にもお伝えしたい、そんなコンセプトで建てられました。他のメーカーでは見られない本物の和の家を、是非ご覧になって下さい。</p>
                  <div class="model-house__btn-wrap">
                    <a href="#" class="model-house__btn cta-btn">
                      来店予約</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="model-house__gallery">
            <div class="model-house__gallery-inner wrap">
              <div class="model-house__gallery-intro">
                <div class="model-house__gallery-intro-img">
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/modelhouse/modelhouse02.png" alt="モデルハウスの写真">
                </div>
                <!-- <p class="model-house__gallery-intro-text">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p> -->
              </div>
              <div class="model-house__gallery-images">
                <div class="model-house__gallery-image image01">
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/modelhouse/modelhouse03.png" alt="モデルハウスの写真">
                </div>
                <div class="model-house__gallery-image image02">
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/modelhouse/modelhouse04.png" alt="モデルハウスの写真">
                </div>
                <div class="model-house__gallery-image image03">
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/modelhouse/modelhouse05.png" alt="モデルハウスの写真">
                </div>
                <div class="model-house__gallery-image  image04">
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/modelhouse/modelhouse06.png" alt="モデルハウスの写真">
                </div>
                <div class="model-house__gallery-image image05">
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/modelhouse/modelhouse07.png" alt="モデルハウスの写真">
                </div>
                <div class="model-house__gallery-image image06">
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/modelhouse/modelhouse08.png" alt="モデルハウスの写真">
                </div>
                <div class="model-house__gallery-image image07">
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/modelhouse/modelhouse09.png" alt="モデルハウスの写真">
                </div>
                <div class="model-house__gallery-image image08">
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/modelhouse/modelhouse10.png" alt="モデルハウスの写真">
                </div>
  
              </div>
              <div class="model-house__gallery-map">
                <p class="model-house__gallery-map-text">
                  モデルハウス間取り図<span></span>
                </p>
                <div class="model-house__gallery-map-img">
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/modelhouse/modelhouse11.png" alt="モデルハウス間取り図">
                </div>
              </div>

            </div>
          </div>

          <!-- <div class="model-house__section">
            <div class="model-house__img">
              <div class="model-house__img-inner wrap">
                <div class="section-inner">
                  <p class="model-house__img-title">タイトルタイトルタイトルタイトル</p>
                  <p class="model-house__img-description">テキストテキストテキストテキストテキストテキスト
                    テキストテキストテキストテキストテキスト</p>
                </div>
              </div>
            </div>
            <div class="model-house__img">
              <div class="model-house__img-inner wrap">
                <div class="section-inner">
                  <p class="model-house__img-title">タイトルタイトルタイトルタイトル</p>
                  <p class="model-house__img-description">テキストテキストテキストテキストテキストテキスト
                    テキストテキストテキストテキストテキスト</p>
                </div>
              </div>
            </div>
          </div> -->
        </div>
      </div>

      <div class="map l-map">
        <div class="map__inner">
          <div class="map__img-wrap">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3224.362391663743!2d140.0872236881325!3d36.08465313670949!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60220bccd80990fd%3A0x3d9a4fbef0015023!2zKOagqinjg47jg7zjg5bjg6vjg5vjg7zjg6Ag44Gk44GP44Gw57eP5ZCI5bGV56S65aC0!5e0!3m2!1sja!2sjp!4v1726204431410!5m2!1sja!2sjp" width="1070" height="618" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
          <div class="map__text-wrap">
            <p class="map__heading section-heading-ja section-heading--line-left">マップ</p>
            <div class="map__address">
              <p class="map__address-title">ノーブルホーム</p>
              <div class="map__address-text">
                <p class="map__address-item">〒310-0852 茨城県水戸市笠原町1196-15</p>
                <p class="map__address-item">営業時間：9：30〜18：00（火・水曜日定休）</p>
                <p class="map__address-item">TEL：029-305-5555</p>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="message l-message">
        <div class="message__inner section-inner">
          <div class="message__items">
            <div class="message__item">
              <div class="message__item-img">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/modelhouse/message01.png" alt="子供がいても安心です">
              </div>
              <div class="message__item-body">
                <p class="message__item-title">子供がいても安心です</p>
                <div class="message__item-text-wrap">
                  <p class="message__item-text">お子様連れの方が多いため、キッズスペースをご用意しています。絵本やDVDなどをご用意し、お父様お母様がお打合せに専念していただけるようにしております。お気に入りのDVDをご持参いただくことも可能ですので、是非お子様も一緒にお打合せいらしてください。</p>
                </div>
              </div>
            </div>
            <div class="message__item">
              <div class="message__item-img">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/modelhouse/message02.png" alt="お気軽にご相談ください">
              </div>
              <div class="message__item-body">
                <p class="message__item-title">お気軽にご相談ください</p>
                <div class="message__item-text-wrap">
                  <p class="message__item-text">・まったく何から始めたらよいか分からないので相談したい</p>
                  <p class="message__item-text">・土地を持っているが、そこにノーブルホームの家が建つのか確認したい</p>
                  <p class="message__item-text">・良いなと思っている土地と同じような条件の土地が他にあるか教えて欲しい</p>
                  <p class="message__item-text">・間取りを考えてみたい</p>
                  <p class="message__item-text">・資金計画の相談をしてみたい</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="message__main-text-wrap">
          <div class="message__main-text-inner wrap">
            <p class="message__main-text">1つずつ解決していきましょう<br>私たちがお手伝いします！</p>
          </div>
        </div>
      </div>


      <div class="flow l-flow">
        <div class="flow__inner section-inner">
          <div class="flow__head">
            <p class="flow__heading section-heading-ja">ご来店の流れ</p>
          </div>
          <p class="flow__heading-en section-heading-en">flow</p>
          <ul class="flow__list flow-list">
            <li class="flow-list__item">
              <div class="flow-list__inner">
                <div class="flow-list__body">
                  <p class="flow-list__title">下記のフォームを<br class="sp-br">送信し<br class="pc-br">来店予約</p>
                  <p class="flow-list__description">来場希望日前日までにご予約を願います。<br>当日等お急ぎの場合はお電話でご連絡ください。</p>
                </div>
                <div class="flow-list__img">
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/modelhouse/flow01.png" alt="STEP1">
                </div>
              </div>
            </li>
              <li class="flow-list__item">
                <div class="flow-list__inner">
                  <div class="flow-list__body">
                    <p class="flow-list__title">スタッフから<br>日時のご案内</p>
                    <p class="flow-list__description">スタッフから、ご来店いただく日時のご連絡、<br class="pc-br">ご一報させていただきます。</p>
                  </div>
                  <div class="flow-list__img">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/modelhouse/flow02.png" alt="STEP2">
                  </div>
                </div>
              </li>
              <li class="flow-list__item">
                <div class="flow-list__inner">
                  <div class="flow-list__body">
                    <p class="flow-list__title">来店・相談</p>
                    <p class="flow-list__description">ご来店の上、土地や間取り・プランなどについてのご相談、資料等がありましたら、お待ちください。</p>
                  </div>
                  <div class="flow-list__img">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/modelhouse/flow03.png" alt="STEP3">
                  </div>
                </div>
              </li>
              <li class="flow-list__item">
                <div class="flow-list__inner">
                  <div class="flow-list__body">
                    <p class="flow-list__title">住宅見学のご予約や<br class="sp-br">プランの<br class="pc-br">無料相談</p>
                    <p class="flow-list__description">専門のスタッフがヒアリングを行い、お客様の<br class="pc-br">ご希望に沿ってご提案させていただきます。</p>
                  </div>
                  <div class="flow-list__img">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/modelhouse/flow04.png" alt="STEP4">
                  </div>
                </div>
              </li>
          </ul>
        </div>
      </div>


      <div class="cta cta--02 l-cta--02">
        <div class="cta__inner wrap">
          <div class="section-inner">
            <p class="cta__message">家づくり、まずは始めてみましょう</p>
            <p class="cta__message">思い立ったら、ノーブルホームまでどうぞ</p>
          </div>
        </div>
      </div>
  
    </div>
  </div>

		<?php do_action( 'lightning_entry_body_apppend' ); ?>
	</div>

	<?php do_action( 'lightning_entry_body_after' ); ?>

	<?php
	$args = array(
		'before'      => '<nav class="page-link"><dl><dt>Pages :</dt><dd>',
		'after'       => '</dd></dl></nav>',
		'link_before' => '<span class="page-numbers">',
		'link_after'  => '</span>',
		'echo'        => 1,
	);
	wp_link_pages( $args );
	?>

	<?php do_action( 'lightning_entry_footer_before' ); ?>

	<?php if ( apply_filters( 'lightning_is_entry_footer', true ) ) : ?>

		<?php
			/**********************************************
			 * Category and tax data
			 */
			$args           = array(
				// translators: taxonomy name.
				'template'      => __( '<dl><dt>%s</dt><dd>%l</dd></dl>', 'lightning' ), // phpcs:ignore
				'term_template' => '<a href="%1$s">%2$s</a>',
			);
			$taxonomies     = VK_Helpers::get_display_taxonomies( get_the_ID(), $args );
			$taxnomies_html = '';

			if ( $taxonomies ) :
				?>

				<div class="<?php lightning_the_class_name( 'entry-footer' ); ?>">

					<?php
					foreach ( $taxonomies as $key => $value ) {
						$taxnomies_html .= '<div class="entry-meta-data-list entry-meta-data-list--' . $key . '">' . $value . '</div>';
					} // foreach

					$taxnomies_html = apply_filters( 'lightning_taxnomiesHtml', $taxnomies_html ); // phpcs:ignore
					echo wp_kses_post( $taxnomies_html );

					// tag list.
					$tags_list = get_the_tag_list();
					if ( $tags_list ) {
						?>
						<div class="entry-meta-data-list entry-meta-data-list--post_tag">
							<dl>
							<dt><?php esc_html_e( 'Tags', 'lightning' ); ?></dt>
							<dd class="tagcloud"><?php echo wp_kses_post( $tags_list ); ?></dd>
							</dl>
						</div><!-- [ /.entry-tag ] -->
					<?php } ?>
					<?php do_action( 'lightning_entry_footer_append' ); ?>
				</div><!-- [ /.entry-footer ] -->

		<?php endif; ?>

	<?php endif; ?>

</<?php echo esc_attr( $entry_tag ); ?>><!-- [ /#post-<?php the_ID(); ?> ] -->
