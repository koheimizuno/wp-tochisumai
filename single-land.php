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
	do_action( 'lightning_page_header_before', 'lightning_page_header_before' );
	if ( apply_filters( 'lightning_is_page_header', true, 'page_header' ) ) {
		lightning_get_template_part( 'template-parts/page-header' );
	}
	do_action( 'lightning_page_header_after', 'lightning_page_header_after' );
	?>

<?php
	do_action( 'lightning_breadcrumb_before', 'lightning_breadcrumb_before' );
	if ( apply_filters( 'lightning_is_breadcrumb_position_normal', true, 'breadcrumb_position_normal' ) ) {
		if ( apply_filters( 'lightning_is_breadcrumb', true, 'breadcrumb' ) ) {
			$vk_breadcrumb      = new VkBreadcrumb();
			$breadcrumb_options = array(
				'id_outer'        => 'breadcrumb',
				'class_outer'     => 'breadcrumb',
				'class_inner'     => 'container',
				'class_list'      => 'breadcrumb-list',
				'class_list_item' => 'breadcrumb-list__item',
			);
			$vk_breadcrumb->the_breadcrumb( $breadcrumb_options );
		}
	}
	do_action( 'lightning_breadcrumb_after', 'lightning_breadcrumb_after' );
	?>

<?php do_action( 'lightning_site_body_before', 'lightning_site_body_before' ); ?>

<div class="<?php lightning_the_class_name( 'site-body' ); ?>">
    <?php do_action( 'lightning_site_body_prepend', 'lightning_site_body_prepend' ); ?>
    <div class="<?php lightning_the_class_name( 'site-body-container' ); ?> container">
        <div class="land-detail-main">
            <?php
				$tag_list = get_post_meta(get_the_ID(), 'tag-list', true);
				$tagOutput = '<ul class="tag-list">';
	
				$i = 0;
				while ($i < count($tag_list)) {
					$tagOutput .= '<li class="tag-item">' . htmlspecialchars($tag_list[$i]) . '</li>'; // Add each item as a paragraph
					$i++;
				}
	
				$tagOutput .= '</ul>';
	
				echo $tagOutput;
			?>

            <div class="land-title-sec">
                <h2 class="land-title"><?php the_title(); ?></h2>
                <p class="land-subtitle"><?php the_content(); ?></p>
            </div>

            <div class="land-preview">
                <div class="swiper main-swiper">
                    <div class="swiper-wrapper">
                        <?php
                            $detail_imgs = get_post_meta(get_the_ID(), 'detail_imgs', true);
                            for ($i=0; $i < count($detail_imgs); $i++) {
                                echo '<div class="swiper-slide">';
                                echo '<img src="' . $detail_imgs[$i] . '" alt="detail-img">';
                                echo '</div>';
                            }
                        ?>
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
                <div class="swiper thumbs-swiper">
                    <div class="swiper-wrapper">
                        <?php
                            $detail_imgs = get_post_meta(get_the_ID(), 'detail_imgs', true);
                            for ($i=0; $i < count($detail_imgs); $i++) {
                                echo '<div class="swiper-slide">';
                                echo '<img src="' . $detail_imgs[$i] . '" alt="detail-img">';
                                echo '</div>';
                            }
                        ?>
                    </div>
                </div>
            </div>

            <div class=" land-detail-price">
                <p class="price-subTxt">販売価格</p>
                <span class="price"><?php echo get_post_meta(get_the_ID(), 'min_price', true); ?></span>
                <span class="price"><?php echo get_post_meta(get_the_ID(), 'max_price', true); ?></span>
                <span class="priceTxt">万円</span>
            </div>

            <table class="land-detail-table">
                <tbody>
                    <tr>
                        <th>所在地</th>
                        <td>
                            <?php echo get_post_meta(get_the_ID(), 'address', true); ?>
                            (
                            <a href="<?php echo get_post_meta(get_the_ID(), 'map_link', true); ?>"
                                class="address-map">MAP</a>
                            )
                        </td>
                    </tr>
                    <tr>
                        <th>カーナビアドレス</th>
                        <td>
                            <?php echo get_post_meta(get_the_ID(), 'car_address', true); ?>
                            <br>
                            (※現地は上記付近となります。機種により対応できない場合がございます。)
                        </td>
                    </tr>
                    <tr>
                        <th>交通</th>
                        <td><?php echo get_post_meta(get_the_ID(), 'traffic', true); ?></td>
                    </tr>
                    <tr>
                        <th>小学校 / 中学校</th>
                        <td><?php echo get_post_meta(get_the_ID(), 'school', true); ?></td>
                    </tr>
                    <tr>
                        <th>土地面積</th>
                        <td>
                            <?php echo get_post_meta(get_the_ID(), 'area_range', true); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>総区画数</th>
                        <td>
                            <?php echo get_post_meta(get_the_ID(), 'total_secnum', true); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>販売区画数</th>
                        <td>
                            <?php echo get_post_meta(get_the_ID(), 'sale_secnum', true); ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div><!-- [ /.site-body-container ] -->

    <!--/secDetailsContents-->

    <?php do_action( 'lightning_site_body_append', 'lightning_site_body_append' ); ?>

</div><!-- [ /.site-body ] -->

<div class="secDetailsContents">
    <div class="container">
        <ul class="pageLinkList">
            <li>
                <a href="#pagePlan">
                    <p>PLAN</p>
                    <p>区画図・間取り</p>
                </a>
            </li>
            <li>
                <a href="#pageLocation">
                    <p>LOCATION</p>
                    <p>周辺環境</p>
                </a>
            </li>
            <li>
                <a href="#pageAccess">
                    <p>ACCESS</p>
                    <p>地図</p>
                </a>
            </li>
            <li>
                <a href="#pageOverview">
                    <p>OVERVIEW</p>
                    <p>物件概要</p>
                </a>
            </li>
        </ul>
        <div class="sec-plan land-section">
            <div class="contentsTit">
                <p class="enTit">PLAN</p>
                <p class="jpTit">区画図・間取り</p>
            </div>
            <div class="mainImgBox">
                <div>
                    <img src="<?php echo get_post_meta(get_the_ID(), 'floor_plan', true);?>"
                        alt="">
                </div>
            </div>
            <div class="table-group">
                <?php 
                    $price_box = get_post_meta(get_the_ID(), 'priceBox', true);
                    foreach ($price_box as $item) {
                        echo '<div class="table-item">
                            <div class="th-row">
                                <p>区画</p>
                                <p>面積</p>
                                <p>土地価格</p>
                            </div>
                            <div class="td-row">
                                <p>'. $item['section'] .'</p>
                                <p>'. $item['land_price'] .'</p>
                                <p>
                                    <span>'. $item['land_area'] .'</span>
                                    <span>万円</span>
                                </p>
                            </div>
                        </div>';
                    }
                ?>
            </div>
        </div>
        <div class="sec-location land-section">
            <div class="contentsTit">
                <p class="enTit">LOCATION</p>
                <p class="jpTit">周辺環境</p>
            </div>
            <ul class="loclist">
                <?php
                    $surround_imgarea = get_post_meta(get_the_ID(), 'surround_imgarea', true);
                    for ($i=0; $i < count($surround_imgarea); $i++) { 
                        $class = ($i === 0 || $i === 1) ? 'lg-card' : 'sm-card';
                        echo '
                        <li class="' . $class .  '">
                            <img src="'. $surround_imgarea[$i]['image'] .'"
                                alt="">
                            <div>
                                <h5>' . $surround_imgarea[$i]['title'] . '</h5>
                                <p>' . $surround_imgarea[$i]['description'] . '</p>
                            </div>
                        </li>';
                    }
                ?>
            </ul>
            <ul class="loclist noImg">
                <?php
                    $surround_area = get_post_meta(get_the_ID(), 'surround_area', true);
                    for ($i=0; $i < count($surround_area); $i++) { 
                        echo '
                        <li>
                            <div>
                                <p>' . $surround_area[$i]['title'] . '</p>
                        ';
                        if($surround_area[$i]['icon']) { 
                            echo '
                                <span>
                                    <img src="'. get_stylesheet_directory_uri() . '/img/land/iconLoc02.webp"
                                        alt="">
                                </span>
                            ';
                        };
                        echo '
                            </div>
                            <p>' . $surround_area[$i]['description'] . '</p>
                        </li>';
                    }
                ?>
            </ul>
        </div>
        <div class="sec-access land-section">
            <div class="contentsTit">
                <p class="enTit">ACCESS</p>
                <p class="jpTit">地図</p>
            </div>
            <div class="mapBox">
                <iframe src="<?php echo get_post_meta(get_the_ID(), 'map_embed_url', true);?>" style="border:0;"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
        <dic class="sec-overview">
            <div class="contentsTit">
                <p class="enTit">OVERVIEW</p>
                <p class="jpTit">物件概要</p>
            </div>
            <div class="tablelist">
                <div class="table-item">
                    <h5>所在地</h5>
                    <p>
                        <span><?php echo get_post_meta(get_the_ID(), 'address', true);?></span>
                        (
                        <a href="<?php echo get_post_meta(get_the_ID(), 'map_link', true);?>">MAP</a>
                        )
                    </p>
                </div>
                <div class="table-item">
                    <h5>交通</h5>
                    <p><?php echo get_post_meta(get_the_ID(), 'traffic', true);?></p>
                </div>
                <div class="table-item">
                    <h5>販売価格</h5>
                    <p class="land-pricearea">
                        <span>
                            <?php echo get_post_meta(get_the_ID(), 'min_price', true); ?>
                        </span>
                        ～
                        <span><?php echo get_post_meta(get_the_ID(), 'max_price', true); ?></span>
                        万円
                    </p>
                </div>
                <div class="table-item">
                    <h5>土地面積</h5>
                    <p><?php echo get_post_meta(get_the_ID(), 'area_range', true); ?></p>
                </div>
                <div class="table-item">
                    <h5>学区</h5>
                    <p><?php echo get_post_meta(get_the_ID(), 'school', true); ?></p>
                </div>
                <div class="table-item">
                    <h5>総区画数</h5>
                    <p><?php echo get_post_meta(get_the_ID(), 'total_secnum', true); ?></p>
                </div>
                <div class="table-item">
                    <h5>販売区画数</h5>
                    <p><?php echo get_post_meta(get_the_ID(), 'sale_secnum', true); ?></p>
                </div>
                <div class="table-item">
                    <h5>地目</h5>
                    <p><?php echo get_post_meta(get_the_ID(), 'land_use', true); ?></p>
                </div>
                <div class="table-item">
                    <h5>用途地域</h5>
                    <p><?php echo get_post_meta(get_the_ID(), 'use_area', true); ?></p>
                </div>
                <div class="table-item">
                    <h5>都市計画</h5>
                    <p><?php echo get_post_meta(get_the_ID(), 'city_plan', true); ?></p>
                </div>
                <div class="table-item">
                    <h5>開発許可番号</h5>
                    <p><?php echo get_post_meta(get_the_ID(), 'dev_pernum', true); ?></p>
                </div>
                <div class="table-item">
                    <h5>開発面積</h5>
                    <p><?php echo get_post_meta(get_the_ID(), 'dev_area', true); ?></p>
                </div>
                <div class="table-item">
                    <h5>道路</h5>
                    <p><?php echo get_post_meta(get_the_ID(), 'road', true); ?></p>
                </div>
                <div class="table-item">
                    <h5>建ぺい率</h5>
                    <p><?php echo get_post_meta(get_the_ID(), 'break_ratio', true); ?></p>
                </div>
                <div class="table-item">
                    <h5>容積率</h5>
                    <p><?php echo get_post_meta(get_the_ID(), 'floor_ratio', true); ?></p>
                </div>
                <div class="table-item">
                    <h5>設備</h5>
                    <p><?php echo get_post_meta(get_the_ID(), 'facility', true); ?></p>
                </div>
                <div class="table-item">
                    <h5>取引形態</h5>
                    <p><?php echo get_post_meta(get_the_ID(), 'trans_type', true); ?></p>
                </div>
                <div class="table-item">
                    <h5>権利(土地権利)</h5>
                    <p><?php echo get_post_meta(get_the_ID(), 'rights', true); ?></p>
                </div>
                <div class="table-item">
                    <h5>施工・設計会社名</h5>
                    <p><?php echo get_post_meta(get_the_ID(), 'com_name', true); ?></p>
                </div>
                <div class="table-item">
                    <h5>その他特記事項</h5>
                    <p><?php echo get_post_meta(get_the_ID(), 'other_point', true); ?></p>
                </div>
                <div class="table-item">
                    <h5>最終更新日</h5>
                    <p><?php echo get_post_meta(get_the_ID(), 'updatedAt', true); ?></p>
                </div>
            </div>
        </dic>
    </div>
</div>

<div class="land-form">
    <div class="container">
        <div class="form-wrap">
            <div class="form-title">
                <h3>土地見学予約フォーム</h3>
                <p>
                    下記フォームに必要項目をご入力ください。
                    <br>
                    必須項目は必ずご記入ください。
                </p>
            </div>
            <?php
                echo do_shortcode('[mwform_formkey key="2634"]');
            ?>
        </div>
    </div>
</div>


<?php if ( is_active_sidebar( 'footer-before-widget' ) ) : ?>
<div class=" site-body-bottom">
    <div class="container">
        <?php dynamic_sidebar( 'footer-before-widget' ); ?>
    </div>
</div>
<?php endif; ?>

<?php
do_action( 'lightning_site_footer_before', 'lightning_site_footer_before' );
if ( apply_filters( 'lightning_is_site_footer', true, 'site_footer' ) ) {
	lightning_get_template_part( 'template-parts/site-footer' );
}
do_action( 'lightning_site_footer_after', 'lightning_site_footer_after' );
?>

<?php lightning_get_template_part( 'footer' ); ?>