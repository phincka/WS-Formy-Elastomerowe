<?php

$context = Timber::context();

$timber_post = new Timber\Post();
$context['post'] = $timber_post;


$args = array(
  'post_type' => 'post',
  'post_status' => 'publish',
  'posts_per_page' => 3,
  'orderby' => 'rand',
  'post__not_in' => array( $timber_post->ID )
); 
$context['posts'] = Timber::get_posts( $args );


$context['tags'] = wp_get_post_tags( $timber_post->ID);


Timber::render( array( 
  'templates/views/6_blog/post.twig',
  'page.twig'
), $context );

?>