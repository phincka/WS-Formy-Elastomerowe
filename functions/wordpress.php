<?php 
/**
 * Remove wordpress stuff that we dont need
 */
function my_deregister_scripts()
{
    wp_deregister_script('wp-embed');
}
add_action('wp_footer', 'my_deregister_scripts');
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');
remove_filter('the_content_feed', 'wp_staticize_emoji');
remove_filter('comment_text_rss', 'wp_staticize_emoji');
remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
remove_action('wp_head', 'wp_resource_hints', 2);
add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
add_filter('wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2);
function disable_emojis_tinymce($plugins)
{
    if (is_array($plugins))
    {
        return array_diff($plugins, array(
            'wpemoji'
        ));
    }
    else
    {
        return array();
    }
}
function disable_emojis_remove_dns_prefetch($urls, $relation_type)
{
    if ('dns-prefetch' == $relation_type)
    {
        $emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');
        $urls = array_diff($urls, array(
            $emoji_svg_url
        ));
    }
    return $urls;
}
if (function_exists('acf_add_options_page'))
{
    acf_add_options_page(array(
        'page_title' => 'Ogólne',
        'menu_title' => 'Ogólne',
        'redirect' => false
    ));
}
/**
 * Minify HTML output
 */
function compressHTML($str)
{
    return preg_replace(array(
        '/<!--(.*?)-->/s', // html comments
        '@\/\*(.*?)\*\/@s', // js comments
        '/\>[^\S ]+/s', // after ">"
        '/[^\S ]+\</s', // beofre ">"
        '/\>\s+\</', // between "><"
        '/\;[^\S ]+/s', // after ;
        '/\{[^\S ]+/s', // before {
        '/\}[^\S ]+/s', // before {
        '/[^\S ]+\}/s'
        // after }
        
    ) , array(
        '', /// html comments
        '', // js comments
        '>', // after ">"
        '<', // strips before tags, except space
        '><', // between "><"
        ';', // after ;
        '{', // before {
        '}', // before }
        '}'
        // after }
        
    ) , $str);
}

add_action('template_redirect', 'htmlStart', 0);
function htmlStart()
{
    ob_start('compress');
}

/**
 * Output the buffer
 */
function compress($buffer)
{
    return compressHTML($buffer);
}



function remove_admin_menus() {
	// remove_menu_page('edit.php');
	remove_menu_page( 'edit-comments.php' );
	// remove_menu_page( 'tools.php' );
	remove_submenu_page( 'options-general.php', 'options-writing.php' );
	remove_submenu_page( 'options-general.php', 'options-discussion.php' );
	remove_submenu_page( 'options-general.php', 'options-media.php' );
	define('DISALLOW_FILE_EDIT', TRUE);
}
add_action( 'admin_menu', 'remove_admin_menus' );



/**
 * Disable fucking gutenberg
 */
add_filter( 'use_block_editor_for_post', '__return_false' );

/** 
* Disable default post editor
*/
add_action('init', 'init_remove_support',100);
function init_remove_support(){
    remove_post_type_support( 'post', 'editor');
    remove_post_type_support( 'page', 'editor');
    remove_post_type_support( 'product', 'editor');
}
/**
 * Add custom thumbnails size
 */
add_action('after_setup_theme', 'wpdocs_theme_setup');
function wpdocs_theme_setup()
{
    add_image_size('fullhd', 1920, 1080, true);
}


function add_file_types_to_uploads($file_types){
$new_filetypes = array();
$new_filetypes['svg'] = 'image/svg+xml';
$file_types = array_merge($file_types, $new_filetypes );
return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');


/**
 * Add thumbnail support
 */
add_theme_support('post-thumbnails');




/**
 * Template functions
 */
function asset($asset){
  echo get_template_directory_uri() . '/assets/' . $asset;
}

function the_svg($asset){
  echo file_get_contents(get_template_directory_uri() . '/assets/' . $asset . '.svg');
}

function get_svg($asset){
  echo file_get_contents($asset);
}



function prr($array){
    echo '<pre style="font-size: 1.4rem;">';
    print_r($array);
    echo '</pre>';
}

function extract_email($email){
  preg_match_all("/[\._a-zA-Z0-9-]+@[\._a-zA-Z0-9-]+/i", $email, $matches);
  return implode("\n", $matches[0]);
}

function extract_phoneNumber($phoneNo){
    return preg_replace('/[^.(+)|0-9]/', '', $phoneNo);
}


add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
    echo '<style>
    #cf7mls_PostBoxUpgradePro, #cf7mls-progress-bar-tab, #cf7mls-settings-panel-tab, .cf7mls-app-content:first-child{
        display: none !important;
    }
  </style>';

}
