<?php
  /*
  * Template Name: Korzyści 
  * @package ths
  */


$context = Timber::context();
$timber_post = new Timber\Post();
$context['post'] = $timber_post;


Timber::render( array( 
  'templates/views/5_pages/benefits.twig',
  'page.twig'
), $context );

?>
