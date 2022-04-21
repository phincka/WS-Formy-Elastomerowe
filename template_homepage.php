<?php
  /*
  * Template Name: Home
  * @package ths
  */


$context = Timber::context();

$timber_post = new Timber\Post();
$context['post'] = $timber_post;

$args = array(
  'post_type' => 'project',
  'post_status' => 'publish',
  'posts_per_page' => 5,
  'orderby' => 'date',
  'order'=>'desc',
); 
$context['posts'] = new Timber\PostQuery($args);


Timber::render( array( 
  'templates/views/5_pages/homepage.twig',
  'page.twig'
), $context );

?>
