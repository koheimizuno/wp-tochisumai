<?php if(is_front_page()){ ?>
<div id="loading"></div>
<div id="loading-bar"></div>
<div id="loading_box">
  <img id="loading_logo" src="<?php echo get_stylesheet_directory_uri(); ?>/img/common/logo_w.png" alt="粋sui">
</div>
<div id="loading_stoker">
  <div class="loader__cursor"></div>
</div>
<?php } ?>

<header id="site-header" class="<?php lightning_the_class_name( 'site-header' ); ?> header">

  <div id="site-header-container" class="<?php lightning_the_class_name( 'site-header-container' ); ?> container container_c">
	  <?php
		if ( is_front_page() ) {
			$title_tag = 'h1';
		} else {
			$title_tag = 'div';
		}
		?>
      <div class="header_wrap flex">
        <<?php echo $title_tag; ?> class="header_logo">
				  <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/common/logo_w.png" alt="粋sui">
					</a>
        </<?php echo $title_tag; ?>>
      </div>
  </div>
</header>
<div class="nav_btn_wrap">
	<div class="nav_btn">
		<div class="nav_btn_line1"></div>
		<div class="nav_btn_line2"></div>
		<div class="nav_btn_text">MENU</div>
	</div>
</div>

		<?php
		// if ( class_exists( 'VK_Description_Walker' ) ) {
		// 	wp_nav_menu(
		// 		array(
		// 			'theme_location'  => 'global-nav',
		// 			'container'       => 'nav',
		// 			'container_class' => lightning_get_the_class_name( 'global-nav' ),
		// 			'container_id'    => 'global-nav',
		// 			'items_wrap'      => '<ul id="%1$s" class="%2$s vk-menu-acc global-nav-list nav">%3$s</ul>',
		// 			'fallback_cb'     => '',
		// 			'echo'            => true,
		// 			'walker'          => new VK_Description_Walker(),
		// 		)
		// 	);
		// }
		?>

<div class="header_nav">
	<div class="container">
		<div class="header_nav_cont flex">
			<div class="header_nav_l">
				<div class="header_nav_logo">
				  <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/common/header_logo.png" alt="粋sui">
					</a>
				</div>
			</div>
			<div class="header_nav_r flex">
			  <div class="header_nav_wrap">
			  	<div class="header_nav_link">
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
	            			'container_class' => 'footer-nav footer_nav footer_nav_open',
	            			'items_wrap'      => '<ul id="%1$s" class="%2$s ' . lightning_get_the_class_name( 'footer-nav-list' ) . ' nav">%3$s</ul>',
	            			'fallback_cb'     => '',
	            			'depth'           => 1,
		        			)
		        		);
			    		?>
	          <?php endif; ?>
			  	</div>
			  	<div class="header_nav_wrap">
            <div class="header_nav_text">手がけた家</div>
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
          <div class="header_nav_wrap">
            <div class="header_nav_text">展示場</div>
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
          <div class="header_nav_wrap">
            <div class="header_nav_text">イベント情報</div>
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
					<div class="header_nav_wrap">
            <div class="header_nav_text">家づくりコラム</div>
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
					<div class="header_nav_wrap">
            <div class="header_nav_text">その他・お問い合わせ</div>
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
    </div>
	</div>
</div>