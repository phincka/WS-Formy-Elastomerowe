<?php
/**
 * Remove CF7 styles
 *
 */
function deregister_cf7styles()
{
    wp_deregister_style('contact-form-7');
}
add_action('wp_print_styles', 'deregister_cf7styles', 100);

add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
    return $content;
});