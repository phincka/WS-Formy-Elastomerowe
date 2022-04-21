<?php
  /*
  * Template Name: Projekty
  * @package ths
  */


$context = Timber::context();

$timber_post = new Timber\Post();
$context['post'] = $timber_post;


$args = array(
  'post_type' => 'project',
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'orderby' => 'date',
  'order'=>'desc',
); 
$context['posts'] = new Timber\PostQuery($args);



Timber::render( array( 
  'templates/views/6_projects/projects.twig',
  'page.twig'
), $context );

?>
