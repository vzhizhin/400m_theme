<?php

// require get_theme_file_path('/inc/_utils.php');
// require get_theme_file_path('/inc/_gallery.php');
// require get_theme_file_path('/inc/_shortcodes.php');
require get_theme_file_path('/inc/_main-menu.php');


// подключение стилей и скриптов
function m400_files() {
	// wp_enqueue_style('m400_flickity_styles', get_theme_file_uri('/css/flickity.min.css'));
	wp_enqueue_style('m400_main_styles', get_stylesheet_uri(), NULL, microtime());
	wp_enqueue_script('jquery');
	// if (is_front_page()) {
	// 	wp_enqueue_script('m400_flickity_js', get_theme_file_uri('/js/flickity.pkgd.min.js'), NULL, '1.0', true );
	// 	wp_enqueue_script('m400_gallery_js', get_theme_file_uri('/js/gallery.js'), NULL, microtime(), true );
	// } 
	wp_enqueue_script('m400_scripts', get_theme_file_uri('/js/app.js'), NULL, microtime(), true);
}
add_action('wp_enqueue_scripts', 'm400_files');

## Общие CSS стили для админ-панели. Нужно создать файл 'wp-admin.css' в папке темы
add_action( 'admin_enqueue_scripts', function(){
	wp_enqueue_style( 'my-wp-admin', get_template_directory_uri() .'/wp-admin.css' );
}, 99 );

function m400_features() {
	// custom navigation menus: меню спецпроектов и меню рубрик
	register_nav_menu('m400-main-menu',__( 'Главное меню' ));
    // standart theme features
	add_theme_support( 'post-thumbnails', array( 'post') );
}
add_action('after_setup_theme', 'm400_features');

register_block_pattern_category(
	'm400-block-patterns',
	array ('label' => '400M block patterns')
);
register_block_pattern(
	'm400-block-patterns/hero-block',
	array (
		'title' => '400M hero block',
		'content' => '
			<!-- wp:paragraph -->
			<p class="hero__title">This is paragraph</p>
			<!-- /wp:paragraph -->

		'
	));