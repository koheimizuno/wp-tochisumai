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
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/common/header_logo.png" alt="粋sui">
					</a>
        </<?php echo $title_tag; ?>>
      </div>
  </div>
</header>
<div class="nav_btn"><span class="cercle">・</span>Menu</div>

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
			  <div class="header_nav_wrap flex">
			  	<div class="header_nav_text">粋の家づくり</div>
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
			  	<div class="header_nav_wrap flex">
            <div class="header_nav_text"></div>
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
          <div class="header_nav_wrap flex">
            <div class="header_nav_text">まずは実際の<br>現場までどうぞ</div>
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
          <div class="header_nav_wrap flex">
            <div class="header_nav_text">粋について</div>
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
			  </div>
			</div>
    </div>
	</div>
</div>