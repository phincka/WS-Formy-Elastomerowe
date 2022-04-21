<?php
/**
 * Search results page
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

$context = Timber::context();
 
$pageID = get_query_var('page');
// $context['field'] = get_fields($pageID);
// $context['pageID'] = $pageID;

$postType = get_query_var('type');


// $args = array(
//   's' => get_search_query(),
//   'post_type' => 'post',
//   'post_status' => 'publish',
//   'posts_per_page' => -1,
//   'orderby' => 'date',
//   'order'=>'asc',
// ); 

$q1 = new WP_Query( array(
  'post_type' => 'post',
  'posts_per_page' => -1,
  's' => get_search_query()
));

$q2 = new WP_Query( array(
  'post_type' => 'post',
  'posts_per_page' => -1,
  'tax_query' => array(
    array(
        'taxonomy' => 'post_tag',
        'field'    => 'name',
        'terms'    => get_search_query(),
      ),
    ),
));

$result = new Timber\PostQuery($args);
$result->posts = array_unique( array_merge( $q1->posts, $q2->posts ), SORT_REGULAR );
$result->post_count = count( $result->posts );

$context['posts'] = $result->posts;


$timber_post = new Timber\Post();
$context['post'] = $timber_post;


$path = 'templates/views/6_blog/blog.twig';


Timber::render( array( 
  $path,
  'page.twig'
), $context );