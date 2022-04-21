<?php
$context = Timber::context();

$timber_post = new Timber\Post();


Timber::render( array( 
  'templates/views/4_error_404/404.twig',
  'page.twig'
), $context );

?>