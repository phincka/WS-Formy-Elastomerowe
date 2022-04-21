<?php
/*=============================================
=            BREADCRUMBS			            =
=============================================*/

//  to include in functions.php
function the_breadcrumb() {
  $stepIcon = '<span class="stepIcon">&nbsp;/&nbsp;</span>';

  // Start the breadcrumb with a link to your homepage
  echo '<div class="breadcrumbs txt-16">';


  // if (is_tax('products-category')) {
  //     $term = get_term_by("slug", get_query_var("term"), get_query_var("taxonomy") );
  //     $tmpTerm = $term;
  //     $tmpCrumbs = array();

    
  //     echo '<a class="tax" href="' . home_url() . '/produkty"> Produkty </a>';
  //     echo $stepIcon;
      
  //     while ($tmpTerm->parent > 0){
  //       $tmpTerm = get_term($tmpTerm->parent, get_query_var("taxonomy"));
  //       $crumb = '<a href="' . get_term_link($tmpTerm, get_query_var('taxonomy')) . '">' . $tmpTerm->name . '</a>';
  //       array_push($tmpCrumbs, $stepIcon,  $crumb);
  //     }
  //     echo implode('', array_reverse($tmpCrumbs));
  //     echo '<a class="current" href="' . get_term_link($tmpTerm, get_query_var('taxonomy')) . '">' . $term->name . '</a>';

  //     $term_id = $term->term_id;
  //     $taxonomy_name = 'products-category';
  //     $termchildren = get_term_children( $term_id, $taxonomy_name );
  // }

  
  if ( get_post_type() == 'accreditations' && is_single()) {
    global $post; 
    $parent = get_post($post->post_parent);

    $args = [
      'post_type' => 'page',
      'fields' => 'ids',
      'nopaging' => true,
      'meta_key' => '_wp_page_template',
      'meta_value' => 'template_accreditations.php'
    ];
    $page = get_posts( $args )[0];
    $accredPage = get_post($page);



    echo '<a class="home" href="' . home_url() . '"> Strona główna </a>';
    echo $stepIcon;
    echo '<a class="page" href="' . get_permalink($accredPage->ID) . '">'. $accredPage->post_title .'</a>';
    echo $stepIcon;
      

    echo '<p class="current">'. get_the_title() .'</p>';
  }


  if ( is_page() ) {
    global $post; 
    $parent = get_post($post->post_parent);
    echo '<a class="home" href="' . home_url() . '"> Strona główna </a>';
    echo $stepIcon;

    if($post->post_parent):
      echo '<a class="page" href="' . get_permalink($parent->ID) . '">'. $parent->post_title .'</a>';
      echo $stepIcon;
    endif;

    echo '<p class="current">'. get_the_title() .'</p>';
  }
  // if ( is_shop() ) {
  //     echo '<a  href="'. get_option('home'). '"> ' . the_translation('home_page') . ' </a>';
  //     echo $stepIcon;
  //     echo '<p class="current"> ' . the_translation('shop_title') . '</p>';
  // }


  if ( get_post_type() == 'post') {
      $obj = get_queried_object();

      echo '<a href="' . get_option('home') . '/aktualnosci' . '">Aktualności</a>';

      if ($obj->taxonomy == 'post_tag') {
        echo $stepIcon;
        echo '<p class="current">' . $obj->name . '</p>';
      }else{
        echo $stepIcon;
        echo '<a href="' . get_term_link($obj, get_query_var('taxonomy')) . '">' . $obj->name . '</a>';
        echo $stepIcon;
        echo '<p class="current">'. get_the_title() .'</p>';
      }
  }

  

  echo '</div>';
}



?>