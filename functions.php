<?php
function my_script_init() {
  if ( is_front_page() && is_home() || is_page(array('font_shippori','font_hina','font_syuku')) ) {
    wp_enqueue_style("reset", get_stylesheet_directory_uri() . "/css/reset.css", array(), "all");

    wp_enqueue_style("fancybox", "//cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css", array(), "all");
    wp_enqueue_style("cmn", get_stylesheet_directory_uri() . "/css/common.css", array(), filemtime(get_stylesheet_directory() . "/css/common.css"));
    wp_enqueue_style("top", get_stylesheet_directory_uri() . "/css/top.css", array(), filemtime(get_stylesheet_directory() . "/css/top.css"));
    wp_enqueue_script("fancybox", "//cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js", array(), true);
    wp_enqueue_script("gsap_min", "https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js", array(), true);
    wp_enqueue_script("gsap_scroll", "https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollTrigger.min.js", array(), true);
    wp_enqueue_script("gsap_scrollto", "https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollToPlugin.min.js", array(), true);

    wp_enqueue_script("top", get_stylesheet_directory_uri() . "/js/top.js", array(), filemtime(get_stylesheet_directory() . "/js/top.js"), true);
  }else{
    wp_enqueue_style("page", get_stylesheet_directory_uri() . "/css/page.css", array(), filemtime(get_stylesheet_directory() . "/css/page.css"));
  }
  if(is_singular( 'case' ) || is_post_type_archive('case')){
    wp_enqueue_style( "gc-list-style" );
    wp_enqueue_style( 'flickity', 'https://unpkg.com/flickity@2/dist/flickity.min.css', array(), "all");
    wp_enqueue_script( 'flickity', 'https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js', array(), "true");
    wp_enqueue_script( 'case', get_stylesheet_directory_uri() . "/js/case.js", array(), filemtime(get_stylesheet_directory() . "/js/case.js"), true);
    wp_enqueue_style("case", get_stylesheet_directory_uri() . "/css/case.css", array(), filemtime(get_stylesheet_directory() . "/css/single.css"));

  }
  if(is_singular( 'column' ) || is_post_type_archive('column')){
    wp_enqueue_style("single", get_stylesheet_directory_uri() . "/css/single.css", array(), filemtime(get_stylesheet_directory() . "/css/single.css"));
  }
  
  if(is_singular( 'land' ) || is_post_type_archive('land')){
    wp_enqueue_style("land", get_stylesheet_directory_uri() . "/css/land.min.css", array(), filemtime(get_stylesheet_directory() . "/css/land.min.css"));
  }
  // if((is_single() && has_category('media')) || is_category('media') || (is_archive() && has_category('media'))){
  //   wp_enqueue_style("single", get_stylesheet_directory_uri() . "/css/single.css", array(), filemtime(get_stylesheet_directory() . "/css/single.css"));
  // }
  if((is_single()) || is_category() || (is_archive())){
    wp_enqueue_style("single", get_stylesheet_directory_uri() . "/css/single.css", array(), filemtime(get_stylesheet_directory() . "/css/single.css"));
  }
  wp_enqueue_style("slick-theme", "https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.min.css", array(), "all");
  wp_enqueue_style("slick", "https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css", array(), "all");
  wp_enqueue_style("cmn", get_stylesheet_directory_uri() . "/css/common.css", array(), filemtime(get_stylesheet_directory() . "/css/common.css"));

  // フォント
  if(is_page(array('font_shippori','font_hina','font_syuku'))){
    wp_enqueue_style("font", get_stylesheet_directory_uri() . "/css/font.css", array(), filemtime(get_stylesheet_directory() . "/css/font.css"));
  }

  wp_enqueue_script("slick", "https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js", array(), array(), true);
  wp_enqueue_script("cmn", get_stylesheet_directory_uri() . "/js/common.js", array(), filemtime(get_stylesheet_directory() . "/js/common.js"), true);
}
add_action("wp_enqueue_scripts", "my_script_init", 9999);


function my_setup() {
	unregister_nav_menu( 'footer-nav' );
	register_nav_menu( 'footer-nav1' , 'フッターメニュー1' );
	register_nav_menu( 'footer-nav2' , 'フッターメニュー2' );
	register_nav_menu( 'footer-nav3' , 'フッターメニュー3' );
	register_nav_menu( 'footer-nav4' , 'フッターメニュー4' );
	register_nav_menu( 'footer-nav5' , 'フッターメニュー5' );
	register_nav_menu( 'footer-nav6' , 'フッターメニュー6' );
}
add_action('after_setup_theme' , 'my_setup',20);


add_image_size( 'top_case', 600, 600, true );
add_image_size( 'case_list', 820, 550, true );
add_image_size( 'top_event', 750, 600, true );

// ------------------------------------------------------------------------------------------------------------------------------------------

function extract_slug($url) {
    if(strpos($url, '?')) {
        preg_match('/\/(\d+)\/\?/', $url, $matches);
        return isset($matches[1]) ? $matches[1] : null;
    } else {
        return rtrim(basename($url), '/');
    }
}

function post_exists_by_title($title, $post_type = 'land') {
  global $wpdb;
  
  $post = $wpdb->get_var($wpdb->prepare("
      SELECT ID 
      FROM $wpdb->posts 
      WHERE post_title = %s 
      AND post_type = %s
      AND post_status = 'publish'", $title, $post_type));

  return $post ? $post : false;
}

function create_single_post($data) {
  $post_title = $data['title'];
  $post_content = $data['subtitle'];
  $post_slug = $data['slug'];
  $post_type = 'land';

  if (!post_exists_by_title($post_title)) {
      $post_data = array(
          'post_title'   => $post_title,
          'post_content' => $post_content,
          'post_status'  => 'publish',  // Post status ('publish', 'draft', etc.)
          'post_author'  => 1,          // Author ID
          'post_type'    => $post_type, // Custom post type ('land')
          'post_name'    => $data['slug'], // Custom slug for the post
      );
      
      $post_id = wp_insert_post($post_data);
      
      if ($post_id) {
          // Add featured image (thumbnail)
        //   $thumbnail_url = $data['thumbnail_img']; // URL to the image
        //   $thumbnail_id = upload_image_to_media_library($thumbnail_url, $post_id);   // Upload the image and get its ID
          
        //   if ($thumbnail_id) {
        //       set_post_thumbnail($post_id, $thumbnail_id); // Set the featured image (thumbnail)
        //   }
          
          // Add Custom field
          update_post_meta($post_id, 'tag-list', $data['tag-list'], true);
          update_post_meta($post_id, 'subtitle', $data['subtitle'], true);
          update_post_meta($post_id, 'thumbnail_img', $data['thumbnail_img'], true);
          update_post_meta($post_id, 'detail_imgs', $data['detail_imgs'], true);
          update_post_meta($post_id, 'address', $data['address'], true);
          update_post_meta($post_id, 'map_link', $data['map_link'], true);
          update_post_meta($post_id, 'traffic', $data['traffic'], true);
          update_post_meta($post_id, 'price_range', $data['price_range'], true);
          update_post_meta($post_id, 'area_range', $data['area_range'], true);
          update_post_meta($post_id, 'school', $data['school'], true);
          update_post_meta($post_id, 'total_secnum', $data['total_secnum'], true);
          update_post_meta($post_id, 'sale_secnum', $data['sale_secnum'], true);
          update_post_meta($post_id, 'land_use', $data['land_use'], true);
          update_post_meta($post_id, 'use_area', $data['use_area'], true);
          update_post_meta($post_id, 'city_plan', $data['city_plan'], true);
          update_post_meta($post_id, 'dev_pernum', $data['dev_pernum'], true);
          update_post_meta($post_id, 'dev_area', $data['dev_area'], true);
          update_post_meta($post_id, 'road', $data['road'], true);
          update_post_meta($post_id, 'break_ratio', $data['break_ratio'], true);
          update_post_meta($post_id, 'floor_ratio', $data['floor_ratio'], true);
          update_post_meta($post_id, 'facility', $data['facility'], true);
          update_post_meta($post_id, 'trans_type', $data['trans_type'], true);
          update_post_meta($post_id, 'rights', $data['rights'], true);
          update_post_meta($post_id, 'com_name', $data['com_name'], true);
          update_post_meta($post_id, 'other_point', $data['other_point'], true);
          update_post_meta($post_id, 'updatedAt', $data['updatedAt'], true);
          update_post_meta($post_id, 'floor_plan', $data['floor_plan'], true);
          update_post_meta($post_id, 'priceBox', $data['priceBox'], true);
          update_post_meta($post_id, 'minmax_price', $data['minmax_price'], true);
          update_post_meta($post_id, 'surround_imgarea', $data['surround_imgarea'], true);
          update_post_meta($post_id, 'surround_area', $data['surround_area'], true);
          update_post_meta($post_id, 'map_embed_url', $data['map_embed_url'], true);
          
      }
  }
}

function upload_image_to_media_library($image_url, $post_id) {
  require_once(ABSPATH . 'wp-admin/includes/file.php');
  require_once(ABSPATH . 'wp-admin/includes/media.php');
  require_once(ABSPATH . 'wp-admin/includes/image.php');
  
  $image_id = media_sideload_image($image_url, $post_id, '', 'id');

  if (is_wp_error($image_id)) {
      echo 'Image upload failed: ' . $image_id->get_error_message();
      return false;
  }

  return $image_id;
}

function scrapy_single_page($url, $len) {
  // Use wp_remote_get to fetch the content
  $response = wp_remote_get($url);

  // Check for error
  if (is_wp_error($response)) {
      return 'Error retrieving content';
  }

  // Get the body content
  $body = wp_remote_retrieve_body($response);

  // Load HTML into DOMDocument for parsing
  $dom = new DOMDocument();
  // Suppress warnings from malformed HTML
  libxml_use_internal_errors(true);
  $dom->loadHTML($body);
  libxml_clear_errors();

  // Parse the page for the required information
  $xpath = new DOMXPath($dom);

  $return_data = [];

  // Slug

  $return_data['slug'] = extract_slug($url);
  
  //tag-list
  $tagList = $xpath->query('//ul[@class="tagList"]');
  $secondTagList = $tagList->item(1);
  $tagItems = $xpath->query('.//li[@class="tagItem"]', $secondTagList);
  $tags = [];
  foreach ($tagItems as $item) {
    $tags[] = trim($item->textContent);
  }
  $return_data['tag-list'] = $tags;
  
  // title
  $title_node = $xpath->query('//div[@class="topTxtBox"]/h1');
  $title = $title_node->length > 0 ? $title_node->item(0)->textContent : 'No title found';
  $return_data['title'] = $title; 
  
  // subtitle
  $subtitle_node = $xpath->query('//div[@class="topTxtBox"]/p');
  $subtitle = $subtitle_node->length > 0 ? $subtitle_node->item(0)->textContent : 'No subtitle found';
  $return_data['subtitle'] = $subtitle;

  // thummail_img
  $origin_url = '';
  if(strpos($url, "pager=1") || !strpos($url, "pager")) {
    $origin_url = "https://tochitosumainojohokan.jp/land/";
  }

  for ($i=2; $i <= floor($len/30) + 1; $i++) { 
    if(strpos($url, "pager=". $i)) {
        $origin_url = "https://tochitosumainojohokan.jp/land/?pager=" . $i;
    }
  }

  $land_res = wp_remote_get($origin_url);

  if (is_wp_error($land_res)) {
    return 'Error retrieving content';
    }

  $land_body = wp_remote_retrieve_body($land_res);

  $land_dom = new DOMDocument();
  libxml_use_internal_errors(true);
  $land_dom->loadHTML($land_body);
  libxml_clear_errors();

  $land_xpath = new DOMXPath($land_dom);

  $land_xpath = new DOMXPath($land_dom);
  $elements = $land_xpath->query("//a[contains(@href, '". extract_slug($url) ."')]");

    if ($elements->length > 0) {
        foreach ($elements as $element) {
            $imgBox = $land_xpath->query(".//div[@class='imgBox']", $element);

            if ($imgBox->length > 0) {
                foreach ($imgBox as $box) {
                    $img = $box->getElementsByTagName('img')->item(0);
                    if ($img) {
                        $imgSrc = $img->getAttribute('data-src');
                        $return_data['thumbnail_img'] = $imgSrc;
                    }
                }
            }
        }
    }

  // detail_imgs
  $img_nodes = $xpath->query('//div[@id="sliderPhoto"]//img');
  $images = [];
  foreach ($img_nodes as $img) {
      $src = $img->getAttribute('data-src') ?: $img->getAttribute('src');
      $images[] = $src;
  }

  $return_data['detail_imgs'] = $images;
  
  // info-group
  $tableitems = $xpath->query('//div[@class="boxTable"]//div[@class="tableItem"]');
  foreach ($tableitems as $item) {
      // Get the title and text
      $title_node = $xpath->query('.//p[@class="tableTit"]', $item);
      $text_node = $xpath->query('.//div[@class="tableTxt"] | .//p[@class="tableTxt"]', $item);

      if ($title_node->length > 0 && $text_node->length > 0) {
          $title = trim($title_node->item(0)->textContent);
          $text = trim($text_node->item(0)->textContent);
          switch ($title) {
            case '所在地':
                $title = "address";
                $text = preg_replace('/\s*\(.*\)$/', '', $text);
                break;
            case '交通':
                $title = "traffic";
                break;
            case '販売価格':
                $title = "price_range";
                break;
            case '土地面積':
                $title = "area_range";
                break;
            case '学区':
                $title = "school";
                break;
            case '総区画数':
                $title = "total_secnum";
                break;
            case '販売区画数':
                $title = "sale_secnum";
                break;
            case '地目':
                $title = "land_use";
                break;
            case '用途地域':
                $title = "use_area";
                break;
            case '都市計画':
                $title = "city_plan";
                break;
            case '開発許可番号':
                $title = "dev_pernum";
                break;
            case '開発面積':
                $title = "dev_area";
                break;
            case '道路':
                $title = "road";
                break;
            case '建ぺい率':
                $title = "break_ratio";
                break;
            case '容積率':
                $title = "floor_ratio";
                break;
            case '設備':
                $title = "facility";
                break;
            case '取引形態':
                $title = "trans_type";
                break;
            case '権利(土地権利)':
                $title = "rights";
                break;
            case '施工・設計会社名':
                $title = "com_name";
                break;
            case 'その他特記事項':
                $title = "other_point";
                break;
            case '最終更新日':
                $title = "updatedAt";
                break;
        }
          $return_data[$title] = $text;
      }
  }

  // Map Link
  $link_node = $xpath->query('//a[@class="mapInner"]');
  $map_link = '';
  if ($link_node->length > 0) {
      $map_link = $link_node->item(0)->getAttribute('href');
  }

  $return_data['map_link'] = $map_link;

  // floor plan
  $img_node = $xpath->query('//div[@class="mainImgBox wrapperSp"]//img');

  $image_url = '';
  if ($img_node->length > 0) {
    $image_url = $img_node->item(0)->getAttribute('data-src') ?: $img_node->item(0)->getAttribute('src');
  }

  $return_data['floor_plan'] = $image_url;

  // pricebox
  $rows = $xpath->query('//div[@class="table"]//div[contains(@class, "boxTr") and not(contains(@class, "boxTrTop"))]');
  $plotData = [];
  foreach ($rows as $row) {
      $plot = [];
      $plot['section'] = trim($xpath->query('.//div[@class="boxTd"][1]', $row)->item(0)->textContent);
      $plot['land_price'] = trim($xpath->query('.//div[@class="boxTd"][2]', $row)->item(0)->textContent);
      $priceNode = $xpath->query('.//div[@class="boxTd"][3]', $row)->item(0);
      $price = trim($xpath->query('.//span[@class="num fRoboto"]', $priceNode)->item(0)->textContent);
      $plot['land_area'] = $price;

      $plotData[] = $plot;
  }

  $return_data['priceBox'] = $plotData;

  // Price Area
  $priceData = [];
  $priceArea = $xpath->query('//div[@class="priceArea"]');
  if ($priceArea->length > 0) {
        $lowPrice = trim($xpath->query('.//span[@class="num fRoboto"][1]', $priceArea->item(0))->item(0)->textContent);
        $highPriceNode = $xpath->query('.//span[@class="num fRoboto"][2]', $priceArea->item(0));
    
        if ($highPriceNode->length > 0) {
            $highPrice = trim($highPriceNode->item(0)->textContent);
            $priceData['max'] = $highPrice;
        } else {
            $priceData['max'] = null; // or handle the absence of high price as needed
        }
        $priceData['min'] = $lowPrice;
  }
  $return_data['minmax_price'] = $priceData;

  //surround_imgarea
  $amenities = [];
  $amenityItems = $xpath->query('//ul[@class="locList"]/li[@class="item"]');
  
  foreach ($amenityItems as $item) {
      $title = trim($xpath->query('.//p[@class="tit"]', $item)->item(0)->textContent);
      $description = trim($xpath->query('.//p[@class="txt"]', $item)->item(0)->textContent);
      $imgSrc = trim($xpath->query('.//img', $item)->item(0)->getAttribute('data-src'));
      $amenities[] = [
          'title' => $title,
          'description' => $description,
          'image' => $imgSrc,
      ];
  }
  $return_data['surround_imgarea'] = $amenities;

  //surround_area
    $li_nodes = $xpath->query('//ul[@class="locList noImg"]/li');

    // Initialize an array to store scraped data
    $locations = [];

    // Loop through each location node
    foreach ($li_nodes as $li) {
        $title = $xpath->query('.//p[@class="tit"]', $li)->item(0)->textContent;
        
        $distance = $xpath->query('.//p[@class="txt"]', $li)->item(0)->textContent;
        
        $class_name = $li->getAttribute('class');
        $icon = strpos($class_name, 'iconOther') === false ? '../img/land/iconLoc02.webp': null;

        $title = trim($title);
        $distance = trim($distance);

        $locations[] = [
            'title' => $title,
            'description' => $distance,
            'icon'=> $icon
        ];
    }

    // Return the scraped data as an array
    $return_data['surround_area'] = $locations;

  // Google Map
  $iframe = $xpath->query('//div[@class="mapBox"]/iframe')->item(0);
  if ($iframe) {
      $iframe_url = $iframe->getAttribute('data-src');
      $return_data['map_embed_url'] = $iframe_url;
  }

  return $return_data;
}

function scrapy_links_per_page($page_url) {
    // URL to scrape
    $url = $page_url;

    // Fetch the content of the page
    $response = wp_remote_get($url);
    
    // Check for errors in retrieving the content
    if (is_wp_error($response)) {
        return 'Error retrieving content';
    }

    // Get the body content from the response
    $body = wp_remote_retrieve_body($response);

    // Load the content into a DOMDocument
    $dom = new DOMDocument();
    // Suppress warnings due to malformed HTML
    libxml_use_internal_errors(true);
    $dom->loadHTML($body);
    libxml_clear_errors();

    // Initialize XPath for querying
    $xpath = new DOMXPath($dom);

    // Array to store the href links
    $links = [];

    // XPath query to find anchor tags within the ul with class "boxFlow"
    $items = $xpath->query('//ul[@class="boxFlow"]//a[@class="infoBox"]');

    // Loop through each anchor tag and extract the href attribute
    foreach ($items as $item) {
        $href = $item->getAttribute('href');
        $links[] = trim($href);
    }

    // Return the scraped links
    return $links;
}

function get_link_group () {
    $link_group = [];
    $i = 1;
    
    do {
        $url = "https://tochitosumainojohokan.jp/land/?pager=" . $i;
        $links = scrapy_links_per_page($url);
        
        if (!empty($links)) {
            $link_group = array_merge($link_group, $links);
            $i++;
        } else {
            break;
        }
    } while (true);

    return $link_group;
}

function create_land_links_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'land_links'; // Prefix your table to avoid conflicts

    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        $charset_collate = $wpdb->get_charset_collate();
    
        $sql = "CREATE TABLE $table_name (
          id BIGINT(20) UNSIGNED AUTO_INCREMENT,
          link VARCHAR(100) NOT NULL,
          PRIMARY KEY (id)
        ) $charset_collate;";
    
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
}

function insert_into_land_links_table($link_group) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'land_links'; // Get the table name with prefix

    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") !== $table_name) {
        return; // Exit if the table does not exist
    }

    for ($i=count($link_group) - 1 ; $i >= 0 ; $i--) {
        $existing_link = $wpdb->get_var($wpdb->prepare("SELECT link FROM $table_name WHERE link = %s", $link_group[$i]));
    
        if ($existing_link === null) {
            $wpdb->insert(
                $table_name,
                array(
                    'link' => $link_group[$i],
                ),
                array(
                    '%s'
                )
            );
        }
    }
}

function create_entire_posts() {
    global $wpdb;
    $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}land_links", ARRAY_A);
    foreach ($results as $row) {
        $scrapied_data = scrapy_single_page($row['link'], count($results));
        create_single_post($scrapied_data);
    }
}

function create_specific_posts($start_pos, $end_pos) {
    global $wpdb;
    $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}land_links", ARRAY_A);
    for ($i=$start_pos; $i < $end_pos; $i++) {
        $scrapied_data = scrapy_single_page($results[$i]['link'], count($results));
        create_single_post($scrapied_data);
        sleep(2);
    }
}

// create_specific_posts(0, 10);