<?php 
/**
 * Reguster post types
 *
 * @return void
 */


function postTypes()
{
  $competitors_args = array(
    'public' => true,
    'label'  => 'Projekty',
    'supports' => array( 'title', 'thumbnail'),
    'show_in_nav_menus' => true,
    'rewrite' => array( 'slug' => 'projekty'),
  );
  register_post_type( 'project', $competitors_args );
}
add_action('init', 'postTypes', 0);