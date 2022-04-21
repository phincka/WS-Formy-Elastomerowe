<?php 
/**
 * Include scripts and styles from dist folder to wp_footer
 */
function include_scripts()
{
    wp_enqueue_style('swiper-css', get_template_directory_uri() . '/dist/packages/css/swiper-bundle.min.css', '', '1.0', 'all');
    wp_enqueue_script('swiper-js', get_template_directory_uri() . '/dist/packages/js/swiper-bundle.min.js', '', '1.0', true);
    wp_enqueue_script('liteboxpro_gsap', get_template_directory_uri() . '/dist/packages/js/liteboxpro_gsap.min.js', '', '1.0', true);
    // wp_enqueue_script('liteboxpro', get_template_directory_uri() . '/dist/packages/js/liteboxpro.min.js', '', '1.0', true);

    wp_enqueue_script('mainjs', get_template_directory_uri() . '/dist/js/app.js', '', '1.0', true);
}
add_action('wp_footer', 'include_scripts');

function my_enqueue() {
    wp_localize_script( 'ajax-script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}
 add_action( 'wp_enqueue_scripts', 'my_enqueue' );
?>