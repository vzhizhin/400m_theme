<?php

// IcDent frontpage blocks shortcodes

function insertBlock($atts) {
    $block = $atts['name'];
    if (array_key_exists('name', $atts)) $block = $atts['name']; else $block = '';
    if (array_key_exists('post_type', $atts)) $post_type = $atts['post_type']; else $post_type = '';
    $result = '';
    $block = strtolower($block);
    ob_start();
    switch ($block) {
        case 'напр':
            get_template_part( 'inc/branches');
        break;
        case 'галерея':
            get_template_part( 'inc/gallery');
        break; 
        case 'фонды':
            get_template_part( 'inc/partners');
        break; 
        case 'офис-курсы':
            get_template_part( 'inc/courses');
        break;   
        case 'прайс-лист-краткий':
            get_template_part( 'inc/price-list','short', array('post_type' => $post_type ));
        break;
    }
    $result = ob_get_clean();
    
    return $result;
}

add_shortcode('show-block', 'insertBlock');