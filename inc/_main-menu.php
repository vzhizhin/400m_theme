<?php
//  настройки вывода меню

add_filter('wp_nav_menu_objects', 'menu_has_children', 10, 2);

function menu_has_children($sorted_menu_items, $args) {
    $parents = array();
    foreach ( $sorted_menu_items as $key => $obj )
            $parents[] = $obj->menu_item_parent;
    foreach ($sorted_menu_items as $key => $obj)
        $sorted_menu_items[$key]->has_children = (in_array($obj->ID, $parents)) ? true : false;
    return $sorted_menu_items;
}

// Изменяет основные параметры меню
function filter_wp_menu_args( $args ) {
	if ( $args['theme_location'] === 'm400-main-menu' ) {
		$args['container']  = false;
		$args['items_wrap'] = '<ul class="%2$s">%3$s</ul>';
		$args['menu_class'] = 'navmenu navmenu--main';
	}
	return $args;
}
add_filter( 'wp_nav_menu_args', 'filter_wp_menu_args' );

// Изменяем атрибут id у тега li
add_filter( 'nav_menu_item_id', 'filter_menu_item_css_id', 10, 4 );

// Изменяем атрибут class у тега li
// add_filter( 'nav_menu_css_class', 'filter_nav_menu_css_classes', 10, 4 );

// Изменяет класс у вложенного ul
add_filter( 'nav_menu_submenu_css_class', 'filter_nav_menu_submenu_css_class', 10, 3 );

// Добавляем классы ссылкам
add_filter( 'nav_menu_link_attributes', 'filter_nav_menu_link_attributes', 10, 4 );



function filter_menu_item_css_id( $menu_id, $item, $args, $depth ) {
	return $args->theme_location === 'm400-main-menu' ? '' : $menu_id;
}

add_filter( 'wp_nav_menu_objects', 'filter_nav_menu_objects_classes', 10, 2 );
function filter_nav_menu_objects_classes ($menuItems, $args){
	if ($args->theme_location === 'm400-main-menu') {
		$parent = 0;
		foreach($menuItems as $item) {
			$item->classes = ['navmenu__item'];
			if ($item->menu_item_parent > 0) {
				$item->classes[] = 'navmenu__item--main_lvl_2';
				if ($item->current) $parent = $item->menu_item_parent;
			}
			else $item->classes[] = 'navmenu__item--main_lvl_1';
			if ($item->current) {
				$item->classes[] = 'navmenu__item--active';
			}
			if ( $item->has_children ) {
				$item->classes[] = 'navmenu__item--has-children';
			}
		}
		if ($parent > 0) foreach($menuItems as $item) {
			if ($item->ID == $parent) {
				$item->classes[] = 'navmenu__item--active';
				$item->classes[] = 'navmenu__item--parent-active';
			}
		}
	}
	return $menuItems;
}

// function filter_nav_menu_css_classes( $classes, $item, $args, $depth ) {
// 	if ( $args->theme_location === 'm400-main-menu' ) {
// 		$classes = [
// 			'navmenu__item',
// 			'navmenu__item--main_lvl_' . ( $depth + 1 )
// 		];
// 		if ( $item->current ) {
// 			$classes[] = 'navmenu__item--active';
// 		}
//         if ( $item->has_children ) {
// 			$classes[] = 'navmenu__item--has-children';
// 		}
        
// 	}
// 	return $classes;
// }

function filter_nav_menu_submenu_css_class( $classes, $args, $depth ) {
	if ( $args->theme_location === 'm400-main-menu' ) {
		$classes = [
			'navmenu__dropdown'	
		];
	}
	return $classes;
}

function filter_nav_menu_link_attributes( $atts, $item, $args, $depth ) {
	if ( $args->theme_location === 'm400-main-menu' ) {
		$atts['class'] = 'navmenu__link';
		if ( $item->current ) {
			$atts['class'] .= ' navmenu__link--active';
		}
	}
	return $atts;
}
