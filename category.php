<?php
$context = Timber::context();

$timber_post = new Timber\Post();
$context['post'] = $timber_post;

$term = get_queried_object();
$context['term'] = $term;


$args = array(
  'post_type' => 'post',
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'orderby' => 'date',
  'order'=>'desc',
  'tax_query' => array(
    array(
    'taxonomy' => 'category',
    'terms' => $term->term_id,
    'field' => 'term_id',
    )
  )
); 
$context['posts'] = Timber::get_posts( $args );


$count = count($context['posts']);
if($count <= 4){
  $context['postsNo'] =  $count . ' ' . 'wpisy';
}else{
  $context['postsNo'] =  $count . ' ' . 'wpisów';
}


$terms = get_terms(array(
  'taxonomy' => 'category',
));
$context['terms'] = $terms;


Timber::render( array( 
  'templates/views/6_blog/blog.twig',
  'page.twig'
), $context );

?>