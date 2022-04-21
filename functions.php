<?php
/**
 * Wordpress
 */
require(__DIR__ . '/functions/wordpress.php'); //! Reset default wordpress && add wordpress functions
require(__DIR__ . '/timber.php'); //! Include timber
require(__DIR__ . '/functions/include-scripts.php'); //! Enqueue scripts && styles
// require(__DIR__ . '/functions/ajax_handlers.php'); //! Ajax functions 

require(__DIR__ . '/functions/custom-post-types.php'); //! Register post type
require(__DIR__ . '/functions/breadcrumbs.php'); //! Breadcrumbs function
require(__DIR__ . '/functions/subPageNav.php'); //! subPageNav function
require(__DIR__ . '/functions/faqNav.php'); //! faqNav function
require(__DIR__ . '/functions/menu.php'); //! Register menus
// require(__DIR__ . '/functions/pagination.php'); //! Pagination function


/**
 * Plugins
 */
require(__DIR__ . '/functions/acf-functions.php'); //! Advenced Custom Fields functions -> easy taking fields
require(__DIR__ . '/functions/cf7.php'); //! CF7 functions
require(__DIR__ . '/functions/translations.php'); //! Multi language translations
// require(__DIR__ . '/functions/woocommerce.php'); //! Woocommerce functions




function getMainTax($postID){
  return $term = wp_get_post_terms($postID, 'competitors-category', array( 'parent' => 0 ));
}


function getSlug($string){
  return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string)));
}