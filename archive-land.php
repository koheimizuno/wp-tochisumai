<?php
/**
 * Lightning G3 index.php common template-file
 *
 * @package vektor-inc/lightning
 */

use VektorInc\VK_Breadcrumb\VkBreadcrumb;
?>
<?php lightning_get_template_part('header'); ?>

<!-- Site Header -->
<?php
do_action('lightning_site_header_before', 'lightning_site_header_before');
if (apply_filters('lightning_is_site_header', true, 'site_header')) {
    lightning_get_template_part('template-parts/site-header');
}
do_action('lightning_site_header_after', 'lightning_site_header_after');
?>

<div class="<?php lightning_the_class_name('land-page-header'); ?>">

    <!-- Page Header -->
    <?php
    do_action('lightning_page_header_before', 'lightning_page_header_before');
    if (apply_filters('lightning_is_page_header', true, 'page_header')) {
        lightning_get_template_part('template-parts/page-header');
    }
    do_action('lightning_page_header_after', 'lightning_page_header_after');
    ?>

    <!-- Breadcrumb -->
    <?php
    do_action('lightning_breadcrumb_before', 'lightning_breadcrumb_before');
    if (apply_filters('lightning_is_breadcrumb_position_normal', true, 'breadcrumb_position_normal')) {
        if (apply_filters('lightning_is_breadcrumb', true, 'breadcrumb')) {
            $vk_breadcrumb      = new VkBreadcrumb();
            $breadcrumb_options = array(
                'id_outer'        => 'breadcrumb',
                'class_outer'     => 'breadcrumb',
                'class_inner'     => 'container',
                'class_list'      => 'breadcrumb-list',
                'class_list_item' => 'breadcrumb-list__item',
            );
            $vk_breadcrumb->the_breadcrumb($breadcrumb_options);
        }
    }
    do_action('lightning_breadcrumb_after', 'lightning_breadcrumb_after');
    ?>

</div><!-- [ /.land-page-header ] -->


<div class="<?php lightning_the_class_name('site-body'); ?>">

    <?php do_action('lightning_site_body_prepend', 'lightning_site_body_prepend'); ?>
    <div class="<?php lightning_the_class_name('site-body-container'); ?> container">

        <div class="sec-search accordion-active">
            <div class="sec-search-header">
                <p>条件で絞り込む</p>
                <span class="icon">+</span>
            </div>
            <div class="sec-search-content">
                <div class="search-row">
                    <div class="itemSelect">
                        <label for="location">エリア</label>
                        <div class="custom-select" id="location" reload="0">
                            <div class="select-box">
                                <?php echo (isset($_GET['location']) && $_GET['location']) ? location_from_query($_GET['location']) : "選択してください"; ?>
                            </div>
                            <div class="options-container">
                                <?php
                                    $json_file = file_get_contents(get_stylesheet_directory() . '/js/address.json');
                                    $address_data = json_decode($json_file, true);
                                ?>
                                <div class="option <?php echo (isset($_GET['location']) && $_GET['location'] == 0) ? 'active-option' : ''; ?>" data-value="all" data-cities="<?php echo htmlspecialchars(json_encode($address_data['選択してください']), ENT_QUOTES, 'UTF-8'); ?>">選択してください</div>
                                <div class="option <?php echo (isset($_GET['location']) && $_GET['location'] == 1) ? 'active-option' : ''; ?>" data-value="1" data-cities="<?php echo htmlspecialchars(json_encode($address_data['茨城県北エリア']), ENT_QUOTES, 'UTF-8'); ?>">茨城県北エリア</div>
                                <div class="option <?php echo (isset($_GET['location']) && $_GET['location'] == 2) ? 'active-option' : ''; ?>" data-value="2" data-cities="<?php echo htmlspecialchars(json_encode($address_data['茨城県央エリア']), ENT_QUOTES, 'UTF-8'); ?>">茨城県央エリア</div>
                                <div class="option <?php echo (isset($_GET['location']) && $_GET['location'] == 3) ? 'active-option' : ''; ?>" data-value="3" data-cities="<?php echo htmlspecialchars(json_encode($address_data['茨城県南エリア']), ENT_QUOTES, 'UTF-8'); ?>">茨城県南エリア</div>
                                <div class="option <?php echo (isset($_GET['location']) && $_GET['location'] == 4) ? 'active-option' : ''; ?>" data-value="4" data-cities="<?php echo htmlspecialchars(json_encode($address_data['茨城県鹿行エリア']), ENT_QUOTES, 'UTF-8'); ?>">茨城県鹿行エリア</div>
                                <div class="option <?php echo (isset($_GET['location']) && $_GET['location'] == 5) ? 'active-option' : ''; ?>" data-value="5" data-cities="<?php echo htmlspecialchars(json_encode($address_data['茨城県西エリア']), ENT_QUOTES, 'UTF-8'); ?>">茨城県西エリア</div>
                                <div class="option <?php echo (isset($_GET['location']) && $_GET['location'] == 6) ? 'active-option' : ''; ?>" data-value="6" data-cities="<?php echo htmlspecialchars(json_encode($address_data['栃木県北エリア']), ENT_QUOTES, 'UTF-8'); ?>">栃木県北エリア</div>
                                <div class="option <?php echo (isset($_GET['location']) && $_GET['location'] == 7) ? 'active-option' : ''; ?>" data-value="7" data-cities="<?php echo htmlspecialchars(json_encode($address_data['栃木県央エリア']), ENT_QUOTES, 'UTF-8'); ?>">栃木県央エリア</div>
                                <div class="option <?php echo (isset($_GET['location']) && $_GET['location'] == 8) ? 'active-option' : ''; ?>" data-value="8" data-cities="<?php echo htmlspecialchars(json_encode($address_data['栃木県南エリア']), ENT_QUOTES, 'UTF-8'); ?>">栃木県南エリア</div>
                                <div class="option <?php echo (isset($_GET['location']) && $_GET['location'] == 9) ? 'active-option' : ''; ?>" data-value="9" data-cities="<?php echo htmlspecialchars(json_encode($address_data['千葉東葛エリア内']), ENT_QUOTES, 'UTF-8'); ?>">千葉東葛エリア内</div>
                                <div class="option <?php echo (isset($_GET['location']) && $_GET['location'] == 10) ? 'active-option' : ''; ?>" data-value="10" data-cities="<?php echo htmlspecialchars(json_encode($address_data['千葉東葛エリア外']), ENT_QUOTES, 'UTF-8'); ?>">千葉東葛エリア外</div>
                            </div>
                        </div>
                    </div>
                    <script>
                        jQuery(document).ready(function($) {
                            $('#location .option').on('click', function() {
								let locationValue = $(this).data('value');
								let locationText = $(this).text();
								$('.location-select .select-box').text(locationText);
								$('#city .select-box').text("選択してください");
								$('#city .options-container').empty();

								// Update the URL query parameters for location
								const url = new URL(window.location.href);
								url.searchParams.set('location', locationValue);
								history.replaceState(null, '', url);

								// AJAX request to load cities
								$.ajax({
									url: '<?php echo admin_url('admin-ajax.php'); ?>',
									type: 'POST',
									data: {
										action: 'update_cities',
										location: locationValue
									},
									success: function(response) {
										$('#city .options-container').html(response);

										// Add event handler for city selection
										$('#city .options-container').on('click', '.option', function() {
											let cityValue = $(this).data('value');
											$('#city .select-box').text($(this).text());
											$('#city .options-container').removeClass('select-open');
											$('#selected_city').val(cityValue);

											// Update URL with city parameter
											url.searchParams.set('city', cityValue);
											history.replaceState(null, '', url);
										});
									},
									error: function() {
										alert('Failed to load cities');
									}
								});
							});
                        });
                    </script>
                    <div class="itemSelect">
						<label for="city">市区町村</label>
						<div class="custom-select" id="city" reload="0">
							<div class="select-box">
								<?php
									// Check if location and city are set in the URL
									echo isset($_GET['city']) ? 
										 (isset($_GET['location']) ? $address_data[location_from_query($_GET['location'])][intval($_GET['city'])] : $address_data['選択してください'][intval($_GET['city'])]) 
										 : "選択してください";
								?>
							</div>
							<div class="options-container">
								<?php 
									$location = isset($_GET['location']) ? location_from_query($_GET['location']) : '選択してください';
									foreach ($address_data[$location] as $key => $city) : 
								?>
									<div class="option <?php echo (isset($_GET['city']) && $_GET['city'] == $key) ? 'active-option' : ''; ?>" data-value="<?php echo $key === 0 ? "all" : $key; ?>"><?php echo $city; ?></div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
                    <div class="sm-row">
                        <label for="price-title" >価格</label>
                        <div class="price-range-row">
                            <div class="itemSelect">
                                <div class="custom-select" id="price_min" reload="0">
                                    <div class="select-box"><?php echo (isset($_GET['price_min']) && $_GET['price_min']) ? $_GET['price_min'] . '万円' : "下限なし"; ?></div>
                                    <div class="options-container">
                                        <div class="option" data-value="all">下限なし</div>
                                        <div class="option <?php echo (isset($_GET['price_min']) && $_GET['price_min'] == 1000) ? 'active-option' : ''; ?>" data-value="1000">1,000万円</div>
                                        <div class="option <?php echo (isset($_GET['price_min']) && $_GET['price_min'] == 1500) ? 'active-option' : ''; ?>" data-value="1500">1,500万円</div>
                                        <div class="option <?php echo (isset($_GET['price_min']) && $_GET['price_min'] == 2000) ? 'active-option' : ''; ?>" data-value="2000">2,000万円</div>
                                        <div class="option <?php echo (isset($_GET['price_min']) && $_GET['price_min'] == 2500) ? 'active-option' : ''; ?>" data-value="2500">2,500万円</div>
                                        <div class="option <?php echo (isset($_GET['price_min']) && $_GET['price_min'] == 3000) ? 'active-option' : ''; ?>" data-value="3000">3,000万円</div>
                                        <div class="option <?php echo (isset($_GET['price_min']) && $_GET['price_min'] == 3500) ? 'active-option' : ''; ?>" data-value="3500">3,500万円</div>
                                        <div class="option <?php echo (isset($_GET['price_min']) && $_GET['price_min'] == 4000) ? 'active-option' : ''; ?>" data-value="4000">4,000万円</div>
                                        <div class="option <?php echo (isset($_GET['price_min']) && $_GET['price_min'] == 4500) ? 'active-option' : ''; ?>" data-value="4500">4,500万円</div>
                                        <div class="option <?php echo (isset($_GET['price_min']) && $_GET['price_min'] == 5000) ? 'active-option' : ''; ?>" data-value="5000">5,000万円</div>
                                        <div class="option <?php echo (isset($_GET['price_min']) && $_GET['price_min'] == 5500) ? 'active-option' : ''; ?>" data-value="5500">5,500万円</div>
                                        <div class="option <?php echo (isset($_GET['price_min']) && $_GET['price_min'] == 6000) ? 'active-option' : ''; ?>" data-value="6000">6,000万円</div>
                                        <div class="option <?php echo (isset($_GET['price_min']) && $_GET['price_min'] == 6500) ? 'active-option' : ''; ?>" data-value="6500">6,500万円</div>
                                        <div class="option <?php echo (isset($_GET['price_min']) && $_GET['price_min'] == 7000) ? 'active-option' : ''; ?>" data-value="7000">7,000万円</div>
                                        <div class="option <?php echo (isset($_GET['price_min']) && $_GET['price_min'] == 7500) ? 'active-option' : ''; ?>" data-value="7500">7,500万円</div>
                                        <div class="option <?php echo (isset($_GET['price_min']) && $_GET['price_min'] == 8000) ? 'active-option' : ''; ?>" data-value="8000">8,000万円</div>
                                        <div class="option <?php echo (isset($_GET['price_min']) && $_GET['price_min'] == 8500) ? 'active-option' : ''; ?>" data-value="8500">8,500万円</div>
                                        <div class="option <?php echo (isset($_GET['price_min']) && $_GET['price_min'] == 9000) ? 'active-option' : ''; ?>" data-value="9000">9,000万円</div>
                                        <div class="option <?php echo (isset($_GET['price_min']) && $_GET['price_min'] == 9500) ? 'active-option' : ''; ?>" data-value="9500">9,500万円</div>
                                    </div>
                                </div>
                            </div>
                            <span>~</span>
                            <div class="itemSelect">
                                <div class="custom-select" id="price_max" reload="0">
                                    <div class="select-box"><?php echo (isset($_GET['price_max']) && $_GET['price_max']) ? $_GET['price_max'] . '万円' : "上限なし"; ?></div>
                                    <div class="options-container">
                                        <div class="option" data-value="all">上限なし</div>
                                        <div class="option <?php echo (isset($_GET['price_max']) && $_GET['price_max'] == 1000) ? 'active-option' : ''; ?>" data-value="1000">1,000万円</div>
                                        <div class="option <?php echo (isset($_GET['price_max']) && $_GET['price_max'] == 1500) ? 'active-option' : ''; ?>" data-value="1500">1,500万円</div>
                                        <div class="option <?php echo (isset($_GET['price_max']) && $_GET['price_max'] == 2000) ? 'active-option' : ''; ?>" data-value="2000">2,000万円</div>
                                        <div class="option <?php echo (isset($_GET['price_max']) && $_GET['price_max'] == 2500) ? 'active-option' : ''; ?>" data-value="2500">2,500万円</div>
                                        <div class="option <?php echo (isset($_GET['price_max']) && $_GET['price_max'] == 3000) ? 'active-option' : ''; ?>" data-value="3000">3,000万円</div>
                                        <div class="option <?php echo (isset($_GET['price_max']) && $_GET['price_max'] == 3500) ? 'active-option' : ''; ?>" data-value="3500">3,500万円</div>
                                        <div class="option <?php echo (isset($_GET['price_max']) && $_GET['price_max'] == 4000) ? 'active-option' : ''; ?>" data-value="4000">4,000万円</div>
                                        <div class="option <?php echo (isset($_GET['price_max']) && $_GET['price_max'] == 4500) ? 'active-option' : ''; ?>" data-value="4500">4,500万円</div>
                                        <div class="option <?php echo (isset($_GET['price_max']) && $_GET['price_max'] == 5000) ? 'active-option' : ''; ?>" data-value="5000">5,000万円</div>
                                        <div class="option <?php echo (isset($_GET['price_max']) && $_GET['price_max'] == 5500) ? 'active-option' : ''; ?>" data-value="5500">5,500万円</div>
                                        <div class="option <?php echo (isset($_GET['price_max']) && $_GET['price_max'] == 6000) ? 'active-option' : ''; ?>" data-value="6000">6,000万円</div>
                                        <div class="option <?php echo (isset($_GET['price_max']) && $_GET['price_max'] == 6500) ? 'active-option' : ''; ?>" data-value="6500">6,500万円</div>
                                        <div class="option <?php echo (isset($_GET['price_max']) && $_GET['price_max'] == 7000) ? 'active-option' : ''; ?>" data-value="7000">7,000万円</div>
                                        <div class="option <?php echo (isset($_GET['price_max']) && $_GET['price_max'] == 7500) ? 'active-option' : ''; ?>" data-value="7500">7,500万円</div>
                                        <div class="option <?php echo (isset($_GET['price_max']) && $_GET['price_max'] == 8000) ? 'active-option' : ''; ?>" data-value="8000">8,000万円</div>
                                        <div class="option <?php echo (isset($_GET['price_max']) && $_GET['price_max'] == 8500) ? 'active-option' : ''; ?>" data-value="8500">8,500万円</div>
                                        <div class="option <?php echo (isset($_GET['price_max']) && $_GET['price_max'] == 9000) ? 'active-option' : ''; ?>" data-value="9000">9,000万円</div>
                                        <div class="option <?php echo (isset($_GET['price_max']) && $_GET['price_max'] == 9500) ? 'active-option' : ''; ?>" data-value="9500">9,500万円</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="itemSelect">
                        <label for="freeword">フリーワード</label>
                        <input type="text" id="freeword">
                    </div>
                    <div class="sm-row">
                        <label for="price-title" >土地面積</label>
                        <div class="price-range-row">
                            <div class="itemSelect">
                                <div class="custom-select" id="land_area_min" reload="0">
                                    <div class="select-box"><?php echo (isset($_GET['land_area_min']) && $_GET['land_area_min']) ? $_GET['land_area_min'] . 'm²' : "下限なし"; ?></div>
                                    <div class="options-container">
                                        <div class="option" data-value="all">下限なし</div>
                                        <div class="option <?php echo (isset($_GET['land_area_min']) && $_GET['land_area_min'] == 50) ? 'active-option' : ''; ?>" data-value="50">50m²</div>
                                        <div class="option <?php echo (isset($_GET['land_area_min']) && $_GET['land_area_min'] == 60) ? 'active-option' : ''; ?>" data-value="60">60m²</div>
                                        <div class="option <?php echo (isset($_GET['land_area_min']) && $_GET['land_area_min'] == 70) ? 'active-option' : ''; ?>" data-value="70">70m²</div>
                                        <div class="option <?php echo (isset($_GET['land_area_min']) && $_GET['land_area_min'] == 80) ? 'active-option' : ''; ?>" data-value="80">80m²</div>
                                        <div class="option <?php echo (isset($_GET['land_area_min']) && $_GET['land_area_min'] == 90) ? 'active-option' : ''; ?>" data-value="90">90m²</div>
                                        <div class="option <?php echo (isset($_GET['land_area_min']) && $_GET['land_area_min'] == 100) ? 'active-option' : ''; ?>" data-value="100">100m²</div>
                                        <div class="option <?php echo (isset($_GET['land_area_min']) && $_GET['land_area_min'] == 110) ? 'active-option' : ''; ?>" data-value="110">110m²</div>
                                        <div class="option <?php echo (isset($_GET['land_area_min']) && $_GET['land_area_min'] == 120) ? 'active-option' : ''; ?>" data-value="120">120m²</div>
                                        <div class="option <?php echo (isset($_GET['land_area_min']) && $_GET['land_area_min'] == 150) ? 'active-option' : ''; ?>" data-value="150">150m²</div>
                                        <div class="option <?php echo (isset($_GET['land_area_min']) && $_GET['land_area_min'] == 180) ? 'active-option' : ''; ?>" data-value="180">180m²</div>
                                        <div class="option <?php echo (isset($_GET['land_area_min']) && $_GET['land_area_min'] == 200) ? 'active-option' : ''; ?>" data-value="200">200m²</div>
                                    </div>
                                </div>
                            </div>
                            <span>~</span>
                            <div class="itemSelect">
                                <div class="custom-select" id="land_area_max" reload="0">
                                    <div class="select-box"><?php echo (isset($_GET['land_area_max']) && $_GET['land_area_max']) ? $_GET['land_area_max'] . 'm²' : "上限なし"; ?></div>
                                    <div class="options-container">
                                        <div class="option" data-value="all">上限なし</div>
                                        <div class="option <?php echo (isset($_GET['land_area_max']) && $_GET['land_area_max'] == 50) ? 'active-option' : ''; ?>" data-value="50">50m²</div>
                                        <div class="option <?php echo (isset($_GET['land_area_max']) && $_GET['land_area_max'] == 60) ? 'active-option' : ''; ?>" data-value="60">60m²</div>
                                        <div class="option <?php echo (isset($_GET['land_area_max']) && $_GET['land_area_max'] == 70) ? 'active-option' : ''; ?>" data-value="70">70m²</div>
                                        <div class="option <?php echo (isset($_GET['land_area_max']) && $_GET['land_area_max'] == 80) ? 'active-option' : ''; ?>" data-value="80">80m²</div>
                                        <div class="option <?php echo (isset($_GET['land_area_max']) && $_GET['land_area_max'] == 90) ? 'active-option' : ''; ?>" data-value="90">90m²</div>
                                        <div class="option <?php echo (isset($_GET['land_area_max']) && $_GET['land_area_max'] == 100) ? 'active-option' : ''; ?>" data-value="100">100m²</div>
                                        <div class="option <?php echo (isset($_GET['land_area_max']) && $_GET['land_area_max'] == 110) ? 'active-option' : ''; ?>" data-value="110">110m²</div>
                                        <div class="option <?php echo (isset($_GET['land_area_max']) && $_GET['land_area_max'] == 120) ? 'active-option' : ''; ?>" data-value="120">120m²</div>
                                        <div class="option <?php echo (isset($_GET['land_area_max']) && $_GET['land_area_max'] == 150) ? 'active-option' : ''; ?>" data-value="150">150m²</div>
                                        <div class="option <?php echo (isset($_GET['land_area_max']) && $_GET['land_area_max'] == 180) ? 'active-option' : ''; ?>" data-value="180">180m²</div>
                                        <div class="option <?php echo (isset($_GET['land_area_max']) && $_GET['land_area_max'] == 200) ? 'active-option' : ''; ?>" data-value="200">200m²</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="btn-wrapper">
                <button class="btn-search">この条件で検索する</button>
                <button class="btn-clear">
                    検索条件をクリア
                </button>
            </div>
            <div class="searchNum">
                <p class="txtNum">
                    <span class="num"></span>
                    区画の物件情報が見つかりました。<br class="brSp">
                </p>
            </div>
        </div>

        
        <?php
        $posts_per_page = isset($_GET['listrows']) ? intval($_GET['listrows']) : 30;
        $paged = isset($_GET['pager']) ? intval($_GET['pager']) : 1;

        $query_sort = isset($_GET['sort']) ? $_GET['sort'] : "modified_DESC";
        $sort = sort_from_query($query_sort);

        $area_query = isset($_GET['location']) ? intval($_GET['location']) : null;
        $city_query = isset($_GET['city']) ? intval($_GET['city']) : null;

        $city = isset($address_data[location_from_query($area_query)][$city_query]) ? $address_data[location_from_query($area_query)][$city_query] : null;
        
        $price_min = isset($_GET['price_min']) ? intval($_GET['price_min']) : null;
        $price_max = isset($_GET['price_max']) ? intval($_GET['price_max']) : null;
        $land_area_min = isset($_GET['land_area_min']) ? intval($_GET['land_area_min']) : null;
        $land_area_max = isset($_GET['land_area_max']) ? intval($_GET['land_area_max']) : null;
        $freeword = isset($_GET['freeword']) ? $_GET['freeword'] : null;
        $args = array(
            'post_type' => 'land',
            'posts_per_page' => -1,
            'paged' => $paged,
            'meta_key' => $sort['sort_meta_key'],
            'orderby' => $sort['sort_orderby'],
            'order' => $sort['sort_order'],
            'meta_query' => array()
        );

        if ($price_min !== null && $price_min !== '') {
            $args['meta_query'][] = array(
                'key' => 'min_price',
                'value' => $price_min,
                'compare' => '>=',
                'type' => 'NUMERIC'
            );
        }

        if ($price_max !== null && $price_max !== '') {
            $args['meta_query'][] = array(
                'key' => 'max_price',
                'value' => $price_max,
                'compare' => '<=',
                'type' => 'NUMERIC'
            );
        }

        if ($land_area_min !== null && $land_area_min !== '') {
            $args['meta_query'][] = array(
                'key' => 'min_area',
                'value' => $land_area_min,
                'compare' => '>=',
                'type' => 'NUMERIC'
            );
        }

        if ($land_area_max !== null && $land_area_max !== '') {
            $args['meta_query'][] = array(
                'key' => 'max_area',
                'value' => $land_area_max,
                'compare' => '<=',
                'type' => 'NUMERIC'
            );
        }

        if ($city !== null && $city !== '') {
            $args['meta_query'][] = array(
                'key' => 'address',
                'value' => $city === "選択してください" ? null : $city,
                'compare' => 'LIKE',
                'type' => 'CHAR'
            );
        } else if ($area_query !== null && $area_query !== '') {
            $city_meta_query = array('relation' => 'OR');
            foreach ($address_data[location_from_query($area_query)] as $value) {
                if ($value !== "選択してください") {
                    $city_meta_query[] = array(
                        'key' => 'address',
                        'value' => $value,
                        'compare' => 'LIKE',
                        'type' => 'CHAR'
                    );
                }
            }
            $args['meta_query'][] = $city_meta_query;
        }

        if ($freeword !== null && $freeword !== '') {
            $args['meta_query'][] = array(
                'relation' => 'OR',
                array(
                    'key' => 'title',
                    'value' => $freeword,
                    'compare' => 'LIKE'
                ),
                array(
                    'key' => 'subtitle',
                    'value' => $freeword,
                    'compare' => 'LIKE'
                ),
                array(
                    'key' => 'address',
                    'value' => $freeword,
                    'compare' => 'LIKE'
                ),
            );
            $args['s'] = $freeword;
        }

        $total_sections = 0;

        $all_posts = get_posts($args);
        foreach ($all_posts as $post) {
            $priceBox = get_post_meta($post->ID, 'priceBox', true);
            if (is_array($priceBox)) {
                $total_sections += count($priceBox);
            }
        }

        echo "<script>document.querySelector('.searchNum .num').textContent = '$total_sections';</script>";

        $args['posts_per_page'] = $posts_per_page;

        $land_query = new WP_Query($args);

        if ($land_query->have_posts()) : ?>
            <div class="perpagesortsec">
                <div class="itemSelect">
                    <label for="listrows">表示件数</label>
                    <div class="custom-select" id="listrows" reload="1">
                        <div class="select-box"><?php echo (isset($_GET['listrows']) && $_GET['listrows']) ? $_GET['listrows'] . '件' : "表示件数"; ?></div>
                        <div class="options-container">
                            <div class="option <?php echo (isset($_GET['listrows']) && $_GET['listrows'] == 10) ? 'active-option' : ''; ?>" data-value="10">10件</div>
                            <div class="option <?php echo (isset($_GET['listrows']) && $_GET['listrows'] == 30) ? 'active-option' : ''; ?>" data-value="30">30件</div>
                            <div class="option <?php echo (isset($_GET['listrows']) && $_GET['listrows'] == 50) ? 'active-option' : ''; ?>" data-value="50">50件</div>
                        </div>
                    </div>
                </div>
                <div class="itemSelect">
                    <label for="order">並び替え</label>
                    <div class="custom-select" id="sort" reload="1">
                        <?php
                            function get_sort_options_str($sort) {
                                switch ($sort) {
                                    case "modified_DESC":
                                        return "新着順";
                                    case "price_ASC":
                                        return "価格が安い";
                                    case "price_DESC":
                                        return "価格が高い";
                                    case "land_DESC":
                                        return "土地面積が広い";
                                    case "land_ASC":
                                        return "土地面積が狭い";
                                }
                            }
                        ?>
                        <div class="select-box"><?php echo (isset($_GET['sort']) && $_GET['sort']) ? get_sort_options_str($_GET['sort']) : "新着順"; ?></div>
                        <div class="options-container">
                            <div class="option <?php echo (isset($_GET['sort']) && $_GET['sort'] == "modified_DESC") ? 'active-option' : ''; ?>" data-value="modified_DESC">新着順</div>
                            <div class="option <?php echo (isset($_GET['sort']) && $_GET['sort'] == "price_ASC") ? 'active-option' : ''; ?>" data-value="price_ASC">価格が安い</div>
                            <div class="option <?php echo (isset($_GET['sort']) && $_GET['sort'] == "price_DESC") ? 'active-option' : ''; ?>" data-value="price_DESC">価格が高い</div>
                            <div class="option <?php echo (isset($_GET['sort']) && $_GET['sort'] == "land_DESC") ? 'active-option' : ''; ?>" data-value="land_DESC">土地面積が広い</div>
                            <div class="option <?php echo (isset($_GET['sort']) && $_GET['sort'] == "land_ASC") ? 'active-option' : ''; ?>" data-value="land_ASC">土地面積が狭い</div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif;

        if ($land_query->have_posts()) :
            echo '<ul class="land-archive">'; // Optional: Add a wrapper for styling
            while ($land_query->have_posts()) : $land_query->the_post();
        ?>

        <li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <a class="land-row" href="<?php the_permalink(); ?>">
                <div class="land-thumbnail">
                    <img src="<?php echo get_post_meta(get_the_ID(), 'thumbnail_img', true); ?>" alt="">
                </div>
                <div class="land-item-info">
                    <?php 
                    $tag_list = get_post_meta(get_the_ID(), 'tag-list', true);
                    $tagOutput = '<ul class="tag-list">';

                    if (is_array($tag_list) && count($tag_list) !== 0) {
                        $i = 0;
                        while ($i < count($tag_list)) {
                            if ($i < 4) $tagOutput .= '<li class="tag-item">' . htmlspecialchars($tag_list[$i]) . '</li>';
                            $i++;
                        }
                    }

                    if (is_array($tag_list) && count($tag_list) > 4) $tagOutput .= "...";

                    $tagOutput .= '</ul>';

                    echo $tagOutput;
                    ?>
                    <h2 class="land-title"><?php the_title(); ?></h2>
                    <p class="land-address">
                        <?php echo get_post_meta(get_the_ID(), 'address', true); ?>
                    </p>
                    <div class="land-pricearea">
                        <span class="min-price"><?php echo number_format(get_post_meta(get_the_ID(), 'min_price', true)); ?></span>
                        <?php
                        $max_price = get_post_meta(get_the_ID(), 'max_price', true);
                        if ($max_price !== "") {
                            echo '
                                <span class="max-price">
                                '. (is_numeric($max_price) ? number_format((float)$max_price) : '') .'
                                </span>
                            ';
                        }
                        ?>
                        万円
                    </div>
                    <p class="land-subtitle">
                        <?php echo get_post_meta(get_the_ID(), 'subtitle', true); ?>
                    </p>
                    <table class="table-pc">
                        <tbody>
                            <tr>
                                <td>総区画数</td>
                                <td>販売区画数</td>
                                <td>土地面積</td>
                            </tr>
                            <tr>
                                <td><?php echo get_post_meta(get_the_ID(), 'total_secnum', true); ?></td>
                                <td><?php echo get_post_meta(get_the_ID(), 'sale_secnum', true); ?></td>
                                <td>
                                    <?php echo get_post_meta(get_the_ID(), 'area_range', true); ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table-sp">
                        <tbody>
                            <tr>
                                <td>総区画数</td>
                                <td><?php echo get_post_meta(get_the_ID(), 'total_secnum', true); ?></td>
                            </tr>
                            <tr>
                                <td>販売区画数</td>
                                <td><?php echo get_post_meta(get_the_ID(), 'sale_secnum', true); ?></td>
                            </tr>
                            <tr>
                                <td>土地面積</td>
                                <td>
                                    <?php echo get_post_meta(get_the_ID(), 'area_range', true); ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </a>
        </li>

        <?php
            endwhile;
            echo '</ul>';
            // Pagination
            $total_pages = $land_query->max_num_pages;

            if ($total_pages > 1) {
                // Use the correct variable for the current page
                $current_page = max(1, $paged);
                $pagination_args = array(
                    'current' => $current_page,
                    'total' => $total_pages,
                    'mid_size' => 1,
                    'prev_text' => __('«'),
                    'next_text' => __('»'),
                    'type' => 'array', // Return an array of pagination links
                    'before_page_number' => '<span class="page-number">', // Add custom HTML before each page number
                    'after_page_number' => '</span>', // Add custom HTML after each page number
                    'format' => '?pager=%#%', // Custom format for pagination
                );

                // Generate the pagination links
                $pagination_links = paginate_links($pagination_args);

                // Output the pagination
                echo '<div class="pagination">';
                if (is_array($pagination_links)) {
                    foreach ($pagination_links as $link) {
                        // Add a custom class to the active page link
                        if (strpos($link, 'current') !== false) {
                            $link = str_replace('page-number', 'page-number active', $link);
                        }
                        echo '<div class="pagination-item">' . $link . '</div>'; // Wrap each link with a custom class
                    }
                }
                echo '</div>';
            }

            // Reset the post data to the default query
            wp_reset_postdata();
        else :
            echo '<p class="land-nofound">現在、物件情報がございません。</p>';
        endif;
        ?>
    </div><!-- [ /.site-body-container ] -->
    <?php do_action('lightning_site_body_append', 'lightning_site_body_append'); ?>

</div><!-- [ /.site-body ] -->

<?php if (is_active_sidebar('footer-before-widget')) : ?>
<div class="site-body-bottom">
    <div class="container">
        <?php dynamic_sidebar('footer-before-widget'); ?>
    </div>
</div>
<?php endif; ?>

<?php
do_action('lightning_site_footer_before', 'lightning_site_footer_before');
if (apply_filters('lightning_is_site_footer', true, 'site_footer')) {
    lightning_get_template_part('template-parts/site-footer');
}
do_action('lightning_site_footer_after', 'lightning_site_footer_after');
?>

<?php lightning_get_template_part('footer'); ?>