<?php 
  add_theme_support('woocommerce');
  /**
   * Remove wp version
   */
  remove_action('wp_head', 'wp_generator');
  /**
   * Trim zeros in price decimals
   **/
//   add_filter( 'woocommerce_price_trim_zeros', '__return_true' );

  /**
   * Remove default woocommerce styles
   */
  add_filter('woocommerce_enqueue_styles', '__return_empty_array');

  remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
  remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

  remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
  remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

  remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_template_single_title ', 5 );
  remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
  remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
  remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );


  remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

  remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
  remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );



function theme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'theme_add_woocommerce_support' );


function timber_set_product( $post ) {
    global $product;

    if ( is_woocommerce() ) {
        $product = wc_get_product( $post->ID );
    }
}


/* Remove default woocommerce pagination */
// remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );



//   add_filter( 'woocommerce_checkout_fields' , 'override_billing_checkout_fields', 20, 1 );
//   function override_billing_checkout_fields( $fields ) {
//       $fields['billing']['billing_first_name']['placeholder'] = 'Imię';
//       $fields['billing']['billing_last_name']['placeholder'] = 'Nazwisko';
//       $fields['billing']['billing_company']['placeholder'] = 'Firma';
//       $fields['billing']['billing_email']['placeholder'] = 'Email';
//       $fields['billing']['billing_city']['placeholder'] = 'Miasto';
//       $fields['billing']['billing_postcode']['placeholder'] = 'Kod pocztowy';
//       $fields['billing']['billing_phone']['placeholder'] = 'Numer telefonu';
//       return $fields;
//   }


//   add_filter( 'woocommerce_checkout_fields' , 'override_shipping_checkout_fields', 20, 1 );
//   function override_shipping_checkout_fields( $fields ) {
//       $fields['shipping']['shipping_first_name']['placeholder'] = 'Imię';
//       $fields['shipping']['shipping_last_name']['placeholder'] = 'Nazwisko';
//       $fields['shipping']['shipping_company']['placeholder'] = 'Firma';
//       $fields['shipping']['shipping_email']['placeholder'] = 'Email';
//       $fields['shipping']['shipping_city']['placeholder'] = 'Miasto';
//       $fields['shipping']['shipping_postcode']['placeholder'] = 'Kod pocztowy';
//       $fields['shipping']['shipping_phone']['placeholder'] = 'Numer telefonu';
//       return $fields;
//   }


//   if ( ! function_exists( 'dimative_shipping_instance_form_fields_filters' ) ) {
//     /**
//      * Shipping Instance form add extra fields.
//      *
//      * @param array $settings Settings.
//      * @return array
//      */
//     function dimative_shipping_instance_form_add_extra_fields( $settings ) {
//         $settings['shipping_extra_field_title'] = array(
//             'title'       => esc_html__( 'Dodatkowy opis', 'zincheco' ),
//             'type'        => 'text',
//             'placeholder' => esc_html__( 'Wpisz dodatkowy opis', 'zincheco' ),
//             'description' => '',
//         );

//         $settings['shipping_extra_field_description'] = array(
//             'title'       => esc_html__( 'Logo firmy kurierskiej', 'zincheco' ),
//             'type'        => 'text',
//             'placeholder' => esc_html__( 'URL', 'zincheco' ),
//             'description' => '',
//         );

//         return $settings;
//     }

//     /**
//      * Shipping instance form fields.
//      */
//     function dimative_shipping_instance_form_fields_filters() {
//         $shipping_methods = WC()->shipping->get_shipping_methods();
//         foreach ( $shipping_methods as $shipping_method ) {
//             add_filter( 'woocommerce_shipping_instance_form_fields_' . $shipping_method->id, 'dimative_shipping_instance_form_add_extra_fields' );
//         }
//     }
//     add_action( 'woocommerce_init', 'dimative_shipping_instance_form_fields_filters' );
// }





// Do NOT include the opening php tag shown above. Copy the code shown below.

// add_action( 'woocommerce_checkout_update_order_meta', 'wpdesk_checkout_vat_number_update_order_meta' );
/**
* Save VAT Number in the order meta
*/
// function wpdesk_checkout_vat_number_update_order_meta( $order_id ) {
//     if ( ! empty( $_POST['vat_number'] ) ) {
//         update_post_meta( $order_id, '_vat_number', sanitize_text_field( $_POST['vat_number'] ) );
//     }
// }



add_action( 'woocommerce_admin_order_data_after_billing_address', 'wpdesk_vat_number_display_admin_order_meta', 10, 1 );
/**
 * Wyświetlenie pola NIP
 */
// function wpdesk_vat_number_display_admin_order_meta( $order ) {
//     echo '<p><strong>' . __( 'NIP', 'woocommerce' ) . ':</strong> ' . get_post_meta( $order->id, '_vat_number', true ) . '</p>';
// }


// add_filter( 'woocommerce_email_order_meta_keys', 'wpdesk_vat_number_display_email' );
/**
* Pole NIP w mailu
*/
// function wpdesk_vat_number_display_email( $keys ) {
//      $keys['NIP'] = '_vat_number';
//      return $keys;
// }




// Save the custom checkout field in the order meta, when checkbox has been checked
// add_action( 'woocommerce_checkout_update_order_meta', 'custom_checkout_field_update_order_meta', 10, 1 );
// function custom_checkout_field_update_order_meta( $order_id ) {

//     if ( ! empty( $_POST['if_vat'] ) )
//         update_post_meta( $order_id, 'if_vat', $_POST['if_vat'] );
// }

// Display the custom field result on the order edit page (backend) when checkbox has been checked
// add_action( 'woocommerce_admin_order_data_after_billing_address', 'display_custom_field_on_order_edit_pages', 10, 1 );
// function display_custom_field_on_order_edit_pages( $order ){
//     $if_vat = get_post_meta( $order->get_id(), 'if_vat', true );
//     if( $if_vat == 1 ){
//         echo '<p><strong>Faktura: </strong> TAK</p>';
//     }else{
//         echo '<p><strong>Faktura: </strong> NIE</p>';
//     }
// }

/**
* Pole faktyury w mailu
*/
// add_filter( 'woocommerce_email_order_meta_keys', 'wpdesk_vat_number_display_email2' );
// function wpdesk_vat_number_display_email2( $keys ) {
//      $keys['if_vat'] = '_if_vat';
//      return $keys;
// }



/**
 * Redirect to login/register pre-checkout.
 *
 * Redirect guest users to login/register before completing a order.
 */
// function ace_redirect_pre_checkout() {
// 	if ( ! function_exists( 'wc' ) ) return;

// 	$redirect_page_id = 450;
// 	if ( ! is_user_logged_in() && is_checkout() && !isset($_GET['register'])  ) {
// 		wp_safe_redirect( get_permalink( $redirect_page_id ) );
// 		die;
// 	} elseif ( is_user_logged_in() && is_page( $redirect_page_id ) ) {
// 		wp_safe_redirect( get_permalink( wc_get_page_id( 'checkout' ) ) );
// 		die;
// 	}
// }
// add_action( 'template_redirect', 'ace_redirect_pre_checkout' );




?>
