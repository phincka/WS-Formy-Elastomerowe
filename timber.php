<?php

require_once( __DIR__ . '/vendor/autoload.php' );


add_filter( 'timber/context', 'add_to_context' );
function add_to_context( $context ) {
    $context['acf'] = get_fields();
	$context['acf_global'] = get_fields('options');
    $context['options'] = get_fields('options');


    $context['menu'] = new \Timber\Menu( 'header' );
    $context['menu2'] = new \Timber\Menu( 'header2' );
    $context['footer'] = new \Timber\Menu( 'footer' );
    $context['footer2'] = new \Timber\Menu( 'footer2' );
    $context['footer3'] = new \Timber\Menu( 'footer3' );

    return $context;
}

add_filter('timber/twig', 'timber_functions');
function timber_functions( $twig ) {
    $functions_names = [
        'asset',
        'pll__',
        'do_shortcode',
        'date',
        'home_url',
        'pll_home_url',

        'get_the_date',
        'get_permalink',
        'get_term_link',
        'get_field',
        'get_the_post_thumbnail_url',
        'the_svg',
        'get_svg',
        'file_get_contents',

        'extract_email',
        'extract_phoneNumber',
    ];

    if( !empty($functions_names) ) {
        foreach( $functions_names as $name ) {
            $twig->addFunction( new Timber\Twig_Function($name, $name) );
        }
    }
    return $twig;
}



/**
 * Init Timber
 */
$timber = new Timber\Timber();


