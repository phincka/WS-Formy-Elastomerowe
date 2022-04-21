<?php
$context = Timber::context();

$timber_post = new Timber\Post();
$context['post'] = $timber_post;

$term = get_queried_object();
$context['term'] = $term;



// if ( get_query_var('paged') ) {
//   $paged = get_query_var('paged');
// } elseif ( get_query_var('page') ) {
//   $paged = get_query_var('page');
// } else {
//   $paged = 1;
// }
$args = array(
  'post_type' => 'post',
  'post_status' => 'publish',
  'orderby' => 'date',
  'order'=>'desc',
  'posts_per_page' => -1,

  'tax_query' => array(
    array(
      'taxonomy' => 'post_tag',
      'field' => 'name',
      'terms' => $term->name,
    ),
  ),
); 
$context['posts'] = Timber::get_posts( $args );


Timber::render( array( 
  'templates/views/6_blog/blog.twig',
  'page.twig'
), $context );

?>