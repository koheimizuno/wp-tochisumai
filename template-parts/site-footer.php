
<?php
// カテゴリーを取得
$categories = get_the_category();
$category_classes = [];

if ( ! empty( $categories ) ) {
    foreach ( $categories as $category ) {
        // カテゴリー名をクラス用にスラッグ化（スペースや特殊文字を取り除く）
        $category_classes[] = 'footer-' . sanitize_html_class( $category->slug );
    }
}
?>
<section class="bg_panel bg_panel1 <?php echo esc_attr( implode( ' ', $category_classes ) ); ?>">
    <div class="container">
      <div class="bg_panel_box flex">
        <div class="bg_panel_wrap">
          <div class="panel_item">
            <h2 class="title">家づくり相談会</h2>
            <p class="text">候補地探しからの家づくりや、ご要望<br class="d-none d-lg-block">に合わせた設計プランをご相談頂けます</p>
            <a href="<?php echo esc_url( home_url('/contact/house-form/')) ?>" class="btn btn_hover_w">ご予約ページへ</a>
          </div>
        </div>
        <div class="bg_panel_wrap">
          <div class="panel_item">
            <h2 class="title">土地探しのご相談</h2>
            <p class="text">お客様にぴったりの土地を<br>ご提案いたします</p>
            <a href="<?php echo esc_url( home_url('/contact/land-form/')) ?>" class="btn btn_hover_w">土地情報ページへ</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="bg_panel bg_panel2">
    <div class="sns_wrap">
      <div class="sns_item">
        <a href="https://www.youtube.com/@user-oq7ij8ln3r" target="_blank" rel="noopener noreferrer">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/top/youtube.jpg" alt="Youtube">
        </a>
      </div>
      <div class="sns_item">
        <a href="https://www.instagram.com/1994noblehome/" target="_blank" rel="noopener noreferrer">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/top/instagram.jpg" alt="Instagram">
        </a>
      </div>
    </div>
    <div class="footer_logo">
      <div class="container">
        <div class="footer_logo_wrap">
          <div class="footer_logo_img">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/common/logo_w.png" alt="粋sui">
          </div>
          <p class="footer_logo_text">
            粋suiと叶える誰にも模倣できない<br>
            お客様だけの暮らし<br><br>
            百聞は一見に如かず。<br>
            和のプロフェッショナルたちが手掛けた<br>
            珠玉の家々をご覧ください。
          </p>
          <div class="footer_logo_btn_wrap">
            <a href="<?php echo esc_url( home_url('/contact/event-form/')) ?>" class="footer_logo_btn btn btn_hover_w">イベント・見学会はこちら</a>
            <a href="<?php echo esc_url( home_url('/mirai-style/modelhouse/')) ?>" class="footer_logo_btn btn btn_hover_w">展示場への来場はこちら</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

	<footer class="footer <?php lightning_the_class_name( 'site-footer' ); ?>">
    <div class="container_l">
      <div class="footer_wrap flex">
        <div class="footer_l">
          <div class="footer_title">粋-SUI-</div>
          <div class="footer_text">
            茨城県つくば市研究学園 6-51-12<br>
            つくばハウジングパーク内<br>
            営業時間 / 9：00〜18：00<br>
            定休日 / 火曜日・水曜日<br>
            TEL / 029-850-5011
          </div>
        </div>
        <div class="footer_r">
          <div class="footer_nav_wrap">
            <div class="footer_nav_text">
              <a href="<?php echo esc_url( home_url('/')) ?>">
                粋を知る
              </a>
            </div>
            <?php if ( has_nav_menu( 'footer-nav1' ) ) : ?>
	          <?php
	          	wp_nav_menu(
	          		array(
	          			'theme_location'  => 'footer-nav1',
	          			'container'       => 'nav',
	          			'container_class' => 'footer-nav footer_nav',
	          			'items_wrap'      => '<ul id="%1$s" class="%2$s ' . lightning_get_the_class_name( 'footer-nav-list' ) . ' nav">%3$s</ul>',
	          			'fallback_cb'     => '',
	          			'depth'           => 1,
	          		)
	          	);
	          	?>
	          <?php endif; ?>
          </div>
          <div class="footer_nav_wrap">
            <div class="footer_nav_text">
              <a href="<?php echo esc_url( home_url('/case')) ?>">
                手がけた家

              </a>
            </div>
            <?php if ( has_nav_menu( 'footer-nav2' ) ) : ?>
	          <?php
	          	wp_nav_menu(
	          		array(
	          			'theme_location'  => 'footer-nav2',
	          			'container'       => 'nav',
	          			'container_class' => 'footer-nav footer_nav',
	          			'items_wrap'      => '<ul id="%1$s" class="%2$s ' . lightning_get_the_class_name( 'footer-nav-list' ) . ' nav">%3$s</ul>',
	          			'fallback_cb'     => '',
	          			'depth'           => 1,
	          		)
	          	);
	          	?>
	          <?php endif; ?>
          </div>
          <div class="footer_nav_wrap">
            <div class="footer_nav_text">展示場</div>
            <?php if ( has_nav_menu( 'footer-nav3' ) ) : ?>
	          <?php
	          	wp_nav_menu(
	          		array(
	          			'theme_location'  => 'footer-nav3',
	          			'container'       => 'nav',
	          			'container_class' => 'footer-nav footer_nav',
	          			'items_wrap'      => '<ul id="%1$s" class="%2$s ' . lightning_get_the_class_name( 'footer-nav-list' ) . ' nav">%3$s</ul>',
	          			'fallback_cb'     => '',
	          			'depth'           => 1,
	          		)
	          	);
	          	?>
	          <?php endif; ?>
          </div>
          <div class="footer_nav_wrap">
            <div class="footer_nav_text">
              <a href="<?php echo esc_url( home_url('/event')) ?>">
                イベント情報
              </a>
            </div>
            <?php if ( has_nav_menu( 'footer-nav4' ) ) : ?>
	          <?php
	          	wp_nav_menu(
	          		array(
	          			'theme_location'  => 'footer-nav4',
	          			'container'       => 'nav',
	          			'container_class' => 'footer-nav footer_nav',
	          			'items_wrap'      => '<ul id="%1$s" class="%2$s ' . lightning_get_the_class_name( 'footer-nav-list' ) . ' nav">%3$s</ul>',
	          			'fallback_cb'     => '',
	          			'depth'           => 1,
	          		)
	          	);
	          	?>
	          <?php endif; ?>
          </div>
					<div class="footer_nav_wrap">
            <div class="footer_nav_text">
              <a href="<?php echo esc_url( home_url('/column')) ?>">
                家づくりコラム
              </a>
            </div>
            <?php if ( has_nav_menu( 'footer-nav5' ) ) : ?>
	          <?php
	          	wp_nav_menu(
	          		array(
	          			'theme_location'  => 'footer-nav5',
	          			'container'       => 'nav',
	          			'container_class' => 'footer-nav footer_nav',
	          			'items_wrap'      => '<ul id="%1$s" class="%2$s ' . lightning_get_the_class_name( 'footer-nav-list' ) . ' nav">%3$s</ul>',
	          			'fallback_cb'     => '',
	          			'depth'           => 1,
	          		)
	          	);
	          	?>
	          <?php endif; ?>
          </div>
					<div class="footer_nav_wrap">
            <div class="footer_nav_text">その他・お問い合わせ</div>
            <?php if ( has_nav_menu( 'footer-nav6' ) ) : ?>
	          <?php
	          	wp_nav_menu(
	          		array(
	          			'theme_location'  => 'footer-nav6',
	          			'container'       => 'nav',
	          			'container_class' => 'footer-nav footer_nav',
	          			'items_wrap'      => '<ul id="%1$s" class="%2$s ' . lightning_get_the_class_name( 'footer-nav-list' ) . ' nav">%3$s</ul>',
	          			'fallback_cb'     => '',
	          			'depth'           => 1,
	          		)
	          	);
	          	?>
	          <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="copyright">Copyright ©  2022 粋 | ノーブルホーム</div>
    </div>
  </footer>

	<div class="cta_pc_wrap">
		<div class="cta_pc">
			<a class="cta_pc_item" href="<?php echo esc_url( home_url('/event')) ?>">イベント・見学会</a>
			<a class="cta_pc_item" href="<?php echo esc_url( home_url('/mirai-style/modelhouse/')) ?>">展示場</a>
			<a class="cta_pc_item" href="<?php echo esc_url( home_url('/land')) ?>">土地情報</a>
			<a class="cta_pc_item" href="<?php echo esc_url( home_url('/contact/brochure-form/')) ?>">資料請求</a>
		</div>
	</div>

	<div class="cta_sp_wrap">
		<div class="cta_sp">
			<a class="cta_sp_item" href="<?php echo esc_url( home_url('/event')) ?>">イベント<br>・見学会</a>
			<a class="cta_sp_item" href="<?php echo esc_url( home_url('/mirai-style/modelhouse/')) ?>">展示場</a>
			<a class="cta_sp_item" href="<?php echo esc_url( home_url('/land')) ?>">土地情報</a>
			<a class="cta_sp_item" href="<?php echo esc_url( home_url('/contact/brochure-form/')) ?>">資料請求</a>
		</div>
	</div>

</body>
</html>