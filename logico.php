<?php
/**
 * Plugin Name:       Logico
 * Plugin URI:        http://localhost/wordpress
 * Description:       logico plugin.
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author: Logico Team
 * Text Domain: www.logico.com
 */

// check WooCommerce is activated or not
function logico_activate() {
  if ( ! function_exists( 'is_plugin_active_for_network' ) ) {
    include_once( ABSPATH . '/wp-admin/includes/plugin.php' );
  }

  if ( current_user_can( 'activate_plugins' ) && ! class_exists( 'WooCommerce' ) ) {
    // Deactivate the plugin.
    deactivate_plugins( plugin_basename( __FILE__ ) );
    // Throw an error in the WordPress admin console.
    $error_message = '<p style="font-family:-apple-system,BlinkMacSystemFont,\'Segoe UI\',Roboto,Oxygen-Sans,Ubuntu,Cantarell,\'Helvetica Neue\',sans-serif;font-size: 13px;line-height: 1.5;color:#444;">' . esc_html__( 'This plugin requires ', 'logico' ) . '<a href="' . esc_url( 'https://wordpress.org/plugins/logico/' ) . '">WooCommerce</a>' . esc_html__( ' plugin to be active.', 'logico' ) . '</p>';
    die( $error_message );
  }
}
register_activation_hook( __FILE__, 'logico_activate' );


// If this file is called directly, abort. 
if (!defined('WPINC')) {
    die;
}
if (!defined('LOGICO_PLUGIN_VERSION')) {
    define('LOGICO_PLUGIN_VERSION', '1.0.0');
}
if (!defined('LOGICO_PLUGIN_DIR')) {
    define('LOGICO_PLUGIN_DIR', plugin_dir_url(__FILE__));
}

//show page html
require plugin_dir_path(__FILE__).'inc/settings.php' ;

// functions for plugin setting
require plugin_dir_path(__FILE__).'inc/customfunction.php' ;


if (!function_exists('logico_plugin_scripts')) {
    function logico_plugin_scripts()
    {
        //css enqueue
		$style = 'bootstrap';
		if( ( ! wp_style_is( $style, 'queue' ) ) && ( ! wp_style_is( $style, 'done' ) ) ) {
			wp_enqueue_style('logico-bootstrap-min-css', LOGICO_PLUGIN_DIR . 'assets/css/bootstrap.min.css');
		}
		
        wp_enqueue_style('logico-css', LOGICO_PLUGIN_DIR . 'assets/css/style.css');
        wp_enqueue_style('logico-chart-min-css', LOGICO_PLUGIN_DIR . 'assets/css/Chart.min.css');
        wp_enqueue_style('logico-dashboardstyle-css', LOGICO_PLUGIN_DIR . 'assets/css/dashboardstyle.css');
        wp_enqueue_style('logico-font-awesome-min-css', LOGICO_PLUGIN_DIR . 'assets/css/font-awesome.css');
		
        wp_enqueue_style('logico-shopifyreset-css', LOGICO_PLUGIN_DIR . 'assets/css/shopifyreset.css');

        // script and jquery enqueue
        wp_enqueue_script('logico-ajax', LOGICO_PLUGIN_DIR . 'assets/js/ajax.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script('logico-chart-min-js', LOGICO_PLUGIN_DIR . 'assets/js/Chart.min.js', array('jquery'), '2.9.3', true);  
		if( ( ! wp_style_is( $style, 'queue' ) ) && ( ! wp_style_is( $style, 'done' ) ) ) {		
			wp_enqueue_script('logico-jquery', LOGICO_PLUGIN_DIR . 'assets/js/bootstrap.min-4.4.1.js', array('jquery'), '4.4.1', true);
		}
        wp_localize_script('logico-ajax','logico_ajax_url',array(
            'ajax_url'=>admin_url('admin-ajax.php')
        ));
    }
    add_action('admin_enqueue_scripts', 'logico_plugin_scripts');
}

add_action('wp_enqueue_scripts', 'logico_front_scripts');
function logico_front_scripts(){
    if(is_home()){
        session_start();
        wp_enqueue_script('logico-ajax-customcode', LOGICO_PLUGIN_DIR . 'assets/js/customcodes.js',array('jquery'), '1.0.2', true);

        wp_localize_script('logico-ajax-customcode','logico_ajax_data',array(
            'ajax_url'=>admin_url('admin-ajax.php'),
            "session" => $_SESSION
        ));
    }

    if( is_shop() ) {
        session_start();
        $all_ids = get_posts( array(
            'post_type' => 'product',
            'numberposts' => -1,
            'post_status' => 'publish',
            'fields' => 'ids',
       ) );

        $product_ids = implode("|",$all_ids);

        wp_enqueue_script('logico-ajax-customcode-shop', LOGICO_PLUGIN_DIR . 'assets/js/customcodes-shop.js', array('jquery'), '1.0.2', true);

        wp_localize_script('logico-ajax-customcode-shop','logico_ajax_data_shop',array(
            'ajax_url'=>admin_url('admin-ajax.php'),
            "session" => $_SESSION,
            "product_ids" => $product_ids
        ));
    }

    if( is_cart() ) {
        session_start();
        global $woocommerce;
        $items = $woocommerce->cart->get_cart();
        foreach($items as $item => $values) { 
            $_product =  wc_get_product( $values['data']->get_id()); 
            $cartproduct[] =  $_product->get_id(); 
            $pro_titles[] = $_product->get_title(); 
            $price[] = get_post_meta($values['product_id'] , '_price', true);
            $productsku[]=  $_product->get_sku();
        }
        $cart_ids = implode("|",$cartproduct);
        $cart_titles = implode("|",$pro_titles);
        $productsku = implode("|",$productsku);

        $totalamout = 0;
        foreach ( $price as $sprice ) {
            $totalamout = $totalamout + $sprice;
        }

        wp_enqueue_script('logico-ajax-customcode-cart', LOGICO_PLUGIN_DIR . 'assets/js/customcode-cart.js', array('jquery'), '1.0.2', true);

        wp_localize_script('logico-ajax-customcode-cart','logico_ajax_data_cart',array(
            'ajax_url'    =>admin_url('admin-ajax.php'),
            "session"     => $_SESSION,
            "cartIds"     => $cart_ids,
            "titles"      => $cart_titles,
            "cartSKU"     => $productsku,
            "totalamount" => $totalamout
        ));
    }

    if( is_product() ) {
        session_start();
        $product = wc_get_product();
        $pro_id = $product->get_id();
        $image = $product->get_image();
        $title = $product->get_name();
        $pro_price = $product->get_price();
        $featured = $product->get_featured();
        $proSKU = $product->get_sku();

        $proCat = wc_get_product_category_list( $pro_id );
        $terms = get_the_terms( $pro_id, 'product_cat' );
        foreach ($terms as $term) {
            $procategory[] = $term->name;
        }
        // $pro_cat = str_replace(",","|",$procategory);
        $pro_cat = implode( "|", $procategory );
        // print_r($statuses);
        $pro_dis = $product->get_description();
        $saleprice = $product->get_sale_price();
        $regulerprice = $product->get_regular_price();
        $quantity = $product->get_stock_quantity();
        $imageurl = wp_get_attachment_url( $product->get_image_id() );

        global  $woocommerce;
        $wooCurrency = get_woocommerce_currency_symbol();

        $allData = array("pro_id"      => $pro_id,
                        "image"        => $imageurl,
                        "pro_title"    => $title,
                        "pro_price"    => $pro_price,
                        "featured"     => $featured,
                        "proSKU"       => $proSKU,
                        "pro_cat"      => $pro_cat,
                        "pro_dis"      => $pro_dis,
                        "shopcurrency" => $wooCurrency,
                        "saleprice"    => $saleprice,
                        "regularprice" => $regulerprice,
                        "quantity"     => $quantity );

        wp_enqueue_script('logico-ajax-customcode-product', LOGICO_PLUGIN_DIR . 'assets/js/customcode-singleproduct.js', array('jquery'), '1.0.2', true);

        wp_localize_script('logico-ajax-customcode-product','logico_ajax_data_product',array(
            'ajax_url'=>admin_url('admin-ajax.php'),
            "session" => $_SESSION,
            "allData" => $allData
        ));
    }

    if ( is_checkout() && !empty( is_wc_endpoint_url('order-received') ) ) {
        global $wpdb;
        session_start();
        $statuses = array_keys(wc_get_order_statuses());
        $statuses = implode( "','", $statuses );

        // Getting last Order ID (max value)
        $results = $wpdb->get_col( "
            SELECT MAX(ID) FROM {$wpdb->prefix}posts
            WHERE post_type LIKE 'shop_order'
            AND post_status IN ('$statuses')
        " );
        
        $latest_order_id = $results['0'];

        $order = wc_get_order( $latest_order_id );
        $order_details = $order->get_data();

        // Raw output test
        $orderid       = $order_details['id'];
        $orderstatus   = $order_details['status'];
        $ordercurrency = $order_details['currency'];
        $orderdate     = $order_details['date_created']->date;
        $ordertotal    = $order_details['total'];
        $ordercustomer = $order_details['customer_id'];

        $orders = wc_get_order( $orderid );
        $items = $orders->get_items();

        foreach ( $items as $item ) {
            $product_name = $item['name'];
            $product_id[] = $item['product_id'];
            $product_variation_id = $item['variation_id'];
            $_product =  wc_get_product( $item['product_id'] ); 
            $productsku[]=  $_product->get_sku();
        }

        $cart_ids = implode("|",$product_id);
        $productsku = implode("|",$productsku);

        $checkoutData = array('cartid' => $cart_ids,
                              'productsku' => $productsku,
                              'checkoutamount' => $ordertotal,
                              'orderid' => $orderid,
                              'orderstatus' => $orderstatus,
                              'ordercurrency' => $ordercurrency,
                              'orderdate' => $orderdate,
                              'ordercustomer'=> $ordercustomer );

        wp_enqueue_script('logico-ajax-customcode-checkout', LOGICO_PLUGIN_DIR . 'assets/js/customcode-checkout.js', array('jquery'), '1.0.2', true);

        wp_localize_script('logico-ajax-customcode-checkout','logico_ajax_data_checkout',array(
            'ajax_url'=>admin_url('admin-ajax.php'),
            "session" => $_SESSION,
            "checkout_data" => $checkoutData
        ));
    }
}

add_action('admin_head', 'logico_custom_favicon');
function logico_custom_favicon() {
  echo '
    <style>
    .wp-menu-image.dashicons-before img{
        width: 25px;
        margin-top: -4px;
    }
    input#regisnSubmit{
        font-size:14px !important;
    }
    .logicocustomlogin .logo{
        margin-top:40px !important;
        margin-bottom:80px !important;
    }
    a.remainingBalance.messageDisplayrefresh:hover {
        color: #22d022 !important;
    }
    a.remainingBalance.messageDisplayrefresh {
        color: #22d022 !important;
    }
    .registration_wrp{
        padding-top:0px !important;
    }
    .login-container {
        margin-top: 25px;
    }
    .passerror{
        color: red;
        display: none;
        margin: 0 auto;
        font-size: 12px;
        margin-left: 40px;
    }
    .content-box h4 {
        font-size: 16px;
    }
    .section-wrp h6{
        font-size:30px;
    }
    .usererror {
        color: red;
        display: none;
        margin: 0 auto;
        font-size: 12px;
        margin-left: 40px;
    }
    a.messageHiderefresh p {
        font-weight: 500;
    }
    .messageHiderefresh {
        position: absolute;
        top: 5%;
        right: 25%;
        background: #000;
        padding: 5px;
        border: 1px solid #000;
        border-radius: 5px;
        font-size: 15px;
        display: none;
    }
    a.messageHiderefreshicon p {
        font-weight: 500;
    }
    .messageHiderefreshicon {
        position: absolute;
        top: 5%;
        right: 1%;
        background: #000;
        padding: 5px;
        border: 1px solid #000;
        border-radius: 5px;
        font-size: 15px;
        display: none;
    }
    a.messageHidelogin p{
        font-weight: 500;
    }
    .messageHidelogin {
        position: absolute;
        top: 7%;
        right: 1%;
        background: #000;
        padding: 5px;
        border: 1px solid #000;
        border-radius: 5px;
        font-size: 15px;
        display: none;
    }
    input#updatesettingSubmit:hover {
     cursor: pointer !important;
     background: #03ad7d !important;
    }
    input#regisnSubmit:hover{
        background: #03ad7d !important;
    }
    a.refreshIconbtn:hover{
        background: #03ad7d !important;
    }
    .form-control{
      font-size: 12px;
    }
    select#bidStatus {
        height: 32px;
    }
    button.btn.btn-green.bannerPreview{
        background: #00c18b !important;
        color: #fff !important;
    }
    button.btn.btn-green.bannerPreview:hover{
        background: #03ad7d !important;
    }
    button.btn.btn-green{
        background: #00c18b !important;
        color: #fff !important;
    }
    button.btn.btn-red{
        background:#b3152c !important;
        color: #fff !important;
    }
    </style>
'; }
