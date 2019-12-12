<?php
/*
Theme Name: Sofiya
Theme URI: http://mkvadrat.com/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта http://mkvadrat.com/
Version: 1.0
*/

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
****************************************************************************НАСТРОЙКИ ТЕМЫ*****************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
function mk_scripts(){
	wp_register_style( 'googleapis-css', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Roboto+Slab:400,500,600,700&display=swap&subset=cyrillic', false, '' );
	wp_enqueue_style( 'googleapis-css' );
	
	wp_register_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.css');
	wp_enqueue_style( 'bootstrap-css' );
	
	wp_register_style( 'bootstrap-min-css', get_template_directory_uri() . '/css/bootstrap-theme.min.css');
	wp_enqueue_style( 'bootstrap-min-css' );
	
	wp_register_style( 'mmenu-css', get_template_directory_uri() . '/css/mmenu.css');
	wp_enqueue_style( 'mmenu-css' );

	wp_register_style( 'mburger-css', get_template_directory_uri() . '/css/mburger.css');
	wp_enqueue_style( 'mburger-css' );
	
	wp_register_style( 'carousel-css', get_template_directory_uri() . '/css/owl.carousel.min.css');
	wp_enqueue_style( 'carousel-css' );

	wp_register_style( 'fancybox-css', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css', false, '3.5.7' );
	wp_enqueue_style( 'fancybox-css' );
	
	wp_register_style( 'custom-css', get_template_directory_uri() . '/css/custom.css'); 
	wp_enqueue_style( 'custom-css' );
	
	wp_register_style( 'media-css', get_template_directory_uri() . '/css/media.css'); 
	wp_enqueue_style( 'media-css' );

	if (!is_admin()) {
		wp_enqueue_script( 'jquery-min', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js', '', '', true );
		wp_enqueue_script( 'bootstrap-min', get_template_directory_uri() . '/js/bootstrap.js', '', '', true );
		wp_enqueue_script( 'fancybox-min', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js', '', '', true );
		wp_enqueue_script( 'mmenu-min', get_template_directory_uri() . '/js/mmenu.js', '', '', true );
		wp_enqueue_script( 'carousel-min', get_template_directory_uri() . '/js/owl.carousel.min.js', '', '', true );
		wp_enqueue_script( 'parallax-min', get_template_directory_uri() . '/js/parallax.min.js', '', '', true );
		wp_enqueue_script( 'maps-min', 'http://api-maps.yandex.ru/2.0/?apikey=86029023-52d4-407c-9bd8-83e3eb70ba61&load=package.full&lang=ru-RU', '', '', false );
		wp_enqueue_script( 'custom-min', get_template_directory_uri() . '/js/custom.js', '', '', true );
		
	}
}
add_action( 'wp_enqueue_scripts', 'mk_scripts' );

//Регистрируем название сайта
function mkvadrat_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	$title .= get_bloginfo( 'name', 'display' );

	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'ug' ), max( $paged, $page ) );
	}

	if ( is_404() ) {
        $title = '404';
    }

	return $title;
}
add_filter( 'wp_title', 'mkvadrat_wp_title', 10, 2 );

//Регистрируем меню
if(function_exists('register_nav_menus')){
	register_nav_menus(
		array(
		  'header_a_menu'   => 'Главное меню',
		  'footer_a_menu'   => 'Меню (1 блок)',
		  'footer_b_menu'   => 'Меню (2 блок)',
		  'footer_c_menu'   => 'Меню (3 блок)',
		)
	);
}

//Изображение в шапке сайта
$args = array(
	'width'         => 151,
	'height'        => 86,
	'default-image' => get_template_directory_uri() . '/image/logo.svg',
	'uploads'       => true,
);
add_theme_support( 'custom-header', $args );

//Добавление в тему миниатюры записи и страницы
if ( function_exists( 'add_theme_support' ) ) {
     add_theme_support( 'post-thumbnails' );
}

//Отключить редактор
add_filter('use_block_editor_for_post', '__return_false');

//Отключить редактор
function wpse_hide_cat_descr() { ?>

    <style type="text/css">
       .term-description-wrap {
           display: none;
       }
    </style>

<?php } 
add_action( 'admin_head-term.php', 'wpse_hide_cat_descr' );
add_action( 'admin_head-edit-tags.php', 'wpse_hide_cat_descr' );

//Remove WPAUTOP from ACF TinyMCE Editor
function acf_wysiwyg_remove_wpautop() {
    remove_filter('acf_the_content', 'wpautop' );
}
add_action('acf/init', 'acf_wysiwyg_remove_wpautop');

//Вывод id категории
function getCurrentCatID(){
	global $wp_query;
	if(is_category()){
		$cat_ID = get_query_var('cat');
	}
	return $cat_ID;
}


/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
****************************************************************************МЕНЮ САЙТА*********************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
// Добавляем свой класс для пунктов меню:
class header_menu extends Walker_Nav_Menu {
	// Добавляем классы к вложенным ul
	function start_lvl( &$output, $depth = 0, $args = Array() ) {
		// Глубина вложенных ul
		$indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
		$display_depth = ( $depth + 1); // because it counts the first submenu as 0
		$classes = array(
			'',
			( $display_depth % 2  ? '' : '' ),
			( $display_depth >=2 ? '' : '' ),
			''
			);
		$class_names = implode( ' ', $classes );
		// build html
		if($depth == 0){
			$output .= "\n" . $indent . '<ul class="dropdown-menu">' . "\n";
		}else if($depth == 1){
			$output .= "\n" . $indent . '<ul class="subsubmenu">' . "\n";
		}else if($depth >= 2){
			$output .= "\n" . $indent . '<ul class="subsubsubmenu">' . "\n";
		}
	}

	// Добавляем классы к вложенным li
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		global $wpdb;
		global $wp_query;
		$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

		// depth dependent classes
		$depth_classes = array(
			( $depth == 0 ? 'has-sub' : '' ),
			( $depth >=2 ? '' : '' ),
			( $depth % 2 ? '' : '' ),
			'menu-item-depth-' . $depth
		);

		$depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

		// passed classes
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$mycurrent = ( $item->current == 1 ) ? ' active' : '';

		$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
		
		$has_children = $wpdb->get_results( $wpdb->prepare("SELECT post_id FROM $wpdb->postmeta WHERE meta_value = %s AND meta_key = '_menu_item_menu_item_parent'", $item->ID), ARRAY_A);
		
		if($depth == 0 && !empty($has_children)){
			$output .= $indent . '<li class="dropdown">';
		}else if($depth == 1){
			$output .= $indent . '<li>';
		}else{
			$output .= $indent . '<li>';
		}

		// Добавляем атрибуты и классы к элементу a (ссылки)
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : ''; 
		$attributes .= ' class="menu-link ' . ( $depth == 0 ? 'parent' : '' ) . ( $depth == 1 ? 'child' : '' ) . ( $depth >= 2 ? 'sub-child' : '' ) . '"';

		if($depth == 0){
			$link  =  $item->url;

			$title = apply_filters( 'the_title', $item->title, $item->ID );

			if(!empty($has_children)){
				$item_output = '<a href="'. $link .'"><span>' . $title .'</span></a>';
			}else{
				$item_output = '<a href="'. $link .'"><span>' . $title .'</span></a>';
			}
		}else if($depth == 1){
			$has_children = $wpdb->get_results( $wpdb->prepare("SELECT post_id FROM $wpdb->postmeta WHERE meta_value = %s AND meta_key = '_menu_item_menu_item_parent'", $item->ID), ARRAY_A);

			$link  =  $item->url;

			$title = apply_filters( 'the_title', $item->title, $item->ID );

			if(!empty($has_children)){
				$item_output = '<a href="'. $link .'">' . $title .' </a>';
			}else{
				$item_output = '<a href="'. $link .'">' . $title .'</a>';
			}
		}else if($depth >= 2){
			$item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
				$args->before,
				$attributes,
				$args->link_before,
				apply_filters( 'the_title', $item->title, $item->ID ),
				$args->link_after,
				$args->after
			);
		}
		// build html

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
*********************************************************************РАБОТА С METAПОЛЯМИ*******************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Вывод изображения для плагина nextgen-gallery
function getNextGallery($post_id, $meta_key){
	global $wpdb;
	
	$value = $wpdb->get_var( $wpdb->prepare("SELECT meta_value FROM $wpdb->postmeta AS pm JOIN $wpdb->posts AS p ON (pm.post_id = p.ID) AND (pm.post_id = %s) AND meta_key = %s ORDER BY pm.post_id DESC LIMIT 1", $post_id, $meta_key) );
	
	$unserialize_value = unserialize($value);
	
	return $unserialize_value;	
}

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
**********************************************************************"РАЗДЕЛ НОМЕРА"**********************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Вывод в админке раздела номера
function register_post_type_rooms() {
	$labels = array(
	 'name' => 'Номера',
	 'singular_name' => 'Номера',
	 'add_new' => 'Добавить статью',
	 'add_new_item' => 'Добавить новую статью',
	 'edit_item' => 'Редактировать статью',
	 'new_item' => 'Новая статью',
	 'all_items' => 'Все статьи',
	 'view_item' => 'Просмотр статей на сайте',
	 'search_items' => 'Искать статью',
	 'not_found' => 'Статья не найден.',
	 'not_found_in_trash' => 'В корзине нет статьи.',
	 'menu_name' => 'Номера'
	 );
	 $args = array(
		 'labels' => $labels,
		 'public' => true,
		 'exclude_from_search' => false,
		 'show_ui' => true,
		 'has_archive' => false,
		 'menu_icon' => 'dashicons-book', // иконка в меню
		 'menu_position' => 20,
		 'supports' =>  array('title','editor', 'thumbnail'),
	 );
 	register_post_type('rooms', $args);
}
add_action( 'init', 'register_post_type_rooms' );

function true_post_type_rooms( $rooms ) {
	global $post, $post_ID;

	$rooms['rooms'] = array(
			0 => '',
			1 => sprintf( 'Статьи обновлены. <a href="%s">Просмотр</a>', esc_url( get_permalink($post_ID) ) ),
			2 => 'Статья обновлёна.',
			3 => 'Статья удалёна.',
			4 => 'Статья обновлена.',
			5 => isset($_GET['revision']) ? sprintf( 'Статья восстановлена из редакции: %s', wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			6 => sprintf( 'Статья опубликована на сайте. <a href="%s">Просмотр</a>', esc_url( get_permalink($post_ID) ) ),
			7 => 'Статья сохранена.',
			8 => sprintf( 'Отправлена на проверку. <a target="_blank" href="%s">Просмотр</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
			9 => sprintf( 'Запланирована на публикацию: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Просмотр</a>', date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
			10 => sprintf( 'Черновик обновлён. <a target="_blank" href="%s">Просмотр</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	);
	return $rooms;
}
add_filter( 'post_updated_messages', 'true_post_type_rooms' );
	
//Категории для пользовательских записей "Номера"
function create_taxonomies_rooms()
{
    // Cats Categories
    register_taxonomy('rooms-list',array('rooms'),array(
        'hierarchical' => true,
        'label' => 'Рубрики',
        'singular_name' => 'Рубрика',
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'rooms-list' )
    ));
}
add_action( 'init', 'create_taxonomies_rooms', 0 );

//Виджет для инстаграма
function register_instagram_widgets(){
	register_sidebar( array(
		'name' => "Виджет для инстаграма",
		'id' => 'instagram-sidebar',
		'description' => 'Эти виджеты будут показаны в подвале сайта',
	) );
}

add_action( 'widgets_init', 'register_instagram_widgets' );

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
*****************************************************************REMOVE CATEGORY_TYPE SLUG*****************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Удаление category из url таксономии
function true_remove_slug_from_articles( $url, $term, $taxonomy ){

	$taxonomia_name = 'category';
	$taxonomia_slug = 'category';

	if ( strpos($url, $taxonomia_slug) === FALSE || $taxonomy != $taxonomia_name ) return $url;

	$url = str_replace('/' . $taxonomia_slug, '', $url);

	return $url;
}
add_filter( 'term_link', 'true_remove_slug_from_articles', 10, 3 );

//Перенаправление articles-list в случае удаления category
function parse_request_url_articles( $query ){

	$taxonomia_name = 'category';

	if( $query['attachment'] ) :
		$condition = true;
		$main_url = $query['attachment'];
	else:
		$condition = false;
		$main_url = $query['name'];
	endif;

	$termin = get_term_by('slug', $main_url, $taxonomia_name);

	if ( isset( $main_url ) && $termin && !is_wp_error( $termin )):

		if( $condition ) {
			unset( $query['attachment'] );
			$parent = $termin->parent;
			while( $parent ) {
				$parent_term = get_term( $parent, $taxonomia_name);
				$main_url = $parent_term->slug . '/' . $main_url;
				$parent = $parent_term->parent;
			}
		} else {
			unset($query['name']);
		}

		switch( $taxonomia_name ):
			case 'category':{
				$query['category_name'] = $main_url;
				break;
			}
			case 'post_tag':{
				$query['tag'] = $main_url;
				break;
			}
			default:{
				$query[$taxonomia_name] = $main_url;
				break;
			}
		endswitch;

	endif;

	return $query;

}
add_filter('request', 'parse_request_url_articles', 1, 1 );

//Удаление  из url таксономии
function true_remove_slug_from_category_rooms( $url, $term, $taxonomy ){

	$taxonomia_name = 'rooms-list';
	$taxonomia_slug = 'rooms-list';

	if ( strpos($url, $taxonomia_slug) === FALSE || $taxonomy != $taxonomia_name ) return $url;

	$url = str_replace('/' . $taxonomia_slug, '', $url);

	return $url;
}
add_filter( 'term_link', 'true_remove_slug_from_category_rooms', 10, 3 );

//Перенаправление url в случае удаления rooms-list
function parse_request_url_category_rooms( $query ){

	$taxonomia_name = 'rooms-list';

	if( $query['attachment'] ) :
		$condition = true;
		$main_url = $query['attachment'];
	else:
		$condition = false;
		$main_url = $query['name'];
	endif;

	$termin = get_term_by('slug', $main_url, $taxonomia_name);

	if ( isset( $main_url ) && $termin && !is_wp_error( $termin )):

		if( $condition ) {
			unset( $query['attachment'] );
			$parent = $termin->parent;
			while( $parent ) {
				$parent_term = get_term( $parent, $taxonomia_name);
				$main_url = $parent_term->slug . '/' . $main_url;
				$parent = $parent_term->parent;
			}
		} else {
			unset($query['name']);
		}

		switch( $taxonomia_name ):
			case 'category':{
				$query['category_name'] = $main_url;
				break;
			}
			case 'post_tag':{
				$query['tag'] = $main_url;
				break;
			}
			default:{
				$query[$taxonomia_name] = $main_url;
				break;
			}
		endswitch;

	endif;

	return $query;

}
add_filter('request', 'parse_request_url_category_rooms', 1, 1 );

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
*****************************************************************REMOVE POST_TYPE SLUG*********************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Удаление sluga из url таксономии 
function remove_slug_from_post( $post_link, $post, $leavename ) {
	if ( 'rooms' != $post->post_type && 'news' != $post->post_type && 'action' != $post->post_type || 'publish' != $post->post_status ) {
		return $post_link;
	}
		$post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
	return $post_link;
}
add_filter( 'post_type_link', 'remove_slug_from_post', 10, 3 );

function parse_request_url_post( $query ) {
	if ( ! $query->is_main_query() )
		return;

	if ( 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
		return;
	}

	if ( ! empty( $query->query['name'] ) ) {
		$query->set( 'post_type', array( 'post', 'rooms', 'news', 'action', 'page' ) );
	}
}
add_action( 'pre_get_posts', 'parse_request_url_post' );

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
*****************************************************************NEXT_PREV CUSTOM POST*********************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
function mod_get_adjacent_post($direction = 'prev', $post_types = 'post') {
    global $post, $wpdb;

    if(empty($post)) return NULL;
    if(!$post_types) return NULL;

    if(is_array($post_types)){
        $txt = '';
        for($i = 0; $i <= count($post_types) - 1; $i++){
            $txt .= "'".$post_types[$i]."'";
            if($i != count($post_types) - 1) $txt .= ', ';
        }
        $post_types = $txt;
    }

    $current_post_date = $post->post_date;

    $join = '';
    $in_same_cat = FALSE;
    $excluded_categories = '';
    $adjacent = $direction == 'prev' ? 'previous' : 'next';
    $op = $direction == 'prev' ? '<' : '>';
    $order = $direction == 'prev' ? 'DESC' : 'ASC';

    $join  = apply_filters( "get_{$adjacent}_post_join", $join, $in_same_cat, $excluded_categories );
    $where = apply_filters( "get_{$adjacent}_post_where", $wpdb->prepare("WHERE p.post_date $op %s AND p.post_type IN({$post_types}) AND p.post_status = 'publish'", $current_post_date), $in_same_cat, $excluded_categories );
    $sort  = apply_filters( "get_{$adjacent}_post_sort", "ORDER BY p.post_date $order LIMIT 1" );

    $query = "SELECT p.* FROM $wpdb->posts AS p $join $where $sort";
    $query_key = 'adjacent_post_' . md5($query);
    $result = wp_cache_get($query_key, 'counts');
    if ( false !== $result )
        return $result;

    $result = $wpdb->get_row("SELECT p.* FROM $wpdb->posts AS p $join $where $sort");
    if ( null === $result )
        $result = '';

    wp_cache_set($query_key, $result, 'counts');
    return $result;
}