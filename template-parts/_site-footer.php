
  <footer class="footer <?php lightning_the_class_name( 'site-footer' ); ?>">
    <div class="container_l">
      <div class="footer_wrap flex">
        <div class="footer_l">
          <div class="footer_title">粋-SUI- つくば展示場</div>
          <div class="footer_text">
            茨城県つくば市研究学園 6-51-12<br>
            つくばハウジングパーク内<br>
            営業時間 / 9：00〜18：00<br>
            定休日 / 火曜日・水曜日<br>
            TEL / 029-850-5011
          </div>
        </div>
        <div class="footer_r flex">
          <div class="footer_nav_wrap">
            <div class="footer_nav_text">粋を知る</div>
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
            <div class="footer_nav_text">手がけた家</div>
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
            <div class="footer_nav_text">イベント情報</div>
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
            <div class="footer_nav_text">家づくりコラム</div>
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
			<a class="cta_pc_item" href="/event/">イベント・見学会</a>
			<a class="cta_pc_item" href="#">展示場</a>
			<a class="cta_pc_item" href="#">土地情報</a>
			<a class="cta_pc_item" href="#">資料請求</a>
		</div>
	</div>

	<div class="cta_sp_wrap">
		<div class="cta_sp">
			<a class="cta_sp_item" href="/event/">イベント<br>・見学会</a>
			<a class="cta_sp_item" href="#">展示場</a>
			<a class="cta_sp_item" href="#">土地情報</a>
			<a class="cta_sp_item" href="#">資料請求</a>
		</div>
	</div>

</body>
</html>