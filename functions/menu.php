<?php 

/**
 * Register menus and locations
 */
register_nav_menus(array(
  'header' => 'Główne',
  'header2' => 'Główne 2',
  'footer' => 'Stopka',
  'footer2' => 'Stopka 2',
  'footer3' => 'Stopka 3',
));


/**
 * Add clas for current page
 */
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class ($classes, $item) {
  if (in_array('current-menu-item', $classes) ){
    $classes[] = 'active ';
  }
  return $classes;
}