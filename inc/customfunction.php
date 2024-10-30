<?php
/*
 "Logico Bid-Smart Advertising" is free software: you can redistribute it and/or modify
   it under the terms of the GNU General Public License as published by
   the Free Software Foundation, either version 3 of the License, or
   (at your option) any later version.

   "Logico Bid-Smart Advertising" is distributed in the hope that it will be useful,
   but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   GNU General Public License for more details.

   You should have received a copy of the GNU General Public License
   along with "Logico Bid-Smart Advertising".  If not, see <https://www.gnu.org/licenses/>.
*/

// function for save login details
function logico_set_login_details(){
  if( ! current_user_can( 'manage_options' ) && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {
   wp_die( __( 'You are not allowed to access this part of the site' ) ); 
  } else {
    global $wpdb;
    
    $username = sanitize_email($_POST['username']);
    $userpass = sanitize_text_field($_POST['userpass']);

    // $loginDetails = $_POST;//maybe_serialize($_POST);

    update_option('logico_login_username', $username);
    update_option('logico_login_password', $userpass);

    wp_die();
  }
}
add_action('wp_ajax_logico_set_login_details','logico_set_login_details');
add_action('wp_ajax_nopriv_logico_set_login_details','logico_set_login_details');

// function for registered user first time
function logico_set_user_registered(){
  if( ! current_user_can( 'manage_options' ) && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {
   wp_die( __( 'You are not allowed to access this part of the site' ) ); 
  } else {
    global $wpdb;
    $option_name  = sanitize_text_field($_POST['optionname']);
    $option_value = intval($_POST['optionvalue']);
    update_option($option_name, $option_value);
    wp_die();
  }
}
add_action('wp_ajax_logico_set_user_registered','logico_set_user_registered');
add_action('wp_ajax_nopriv_logico_set_user_registered','logico_set_user_registered');

// function for login(true) user first time
function logico_set_user_login(){
  if( ! current_user_can( 'manage_options' ) && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {
   wp_die( __( 'You are not allowed to access this part of the site' ) ); 
  } else {
    global $wpdb;
    $option_name1 = sanitize_text_field($_POST['optionName']);
    $shopname = str_replace(' ','.',$option_name1);
    $option_value1 = intval($_POST['optionValue']);
    update_option($shopname, $option_value1);
    wp_die();
  }
}
add_action('wp_ajax_logico_set_user_login','logico_set_user_login');
add_action('wp_ajax_nopriv_logico_set_user_login','logico_set_user_login');

// function for create session on login time
function logico_set_session_login(){
  if( ! current_user_can( 'manage_options' ) && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {
   wp_die( __( 'You are not allowed to access this part of the site' ) ); 
  } else {
    global $wpdb, $session;
    session_start();
    $campaignId = intval($_POST['campaignId']);
    $token = sanitize_text_field($_POST['token']);
    $userId = intval($_POST['userId']);

    $_SESSION["campaignId"] = $campaignId;
    $_SESSION["token"] = $token;
    $_SESSION["userId"] = $userId;
    $_SESSION["siteurl"] = get_site_url();

    wp_die();
  }
}
add_action('wp_ajax_logico_set_session_login','logico_set_session_login');
add_action('wp_ajax_nopriv_logico_set_session_login','logico_set_session_login');

// function for destroy php session
function logico_set_session_destroy(){
  if( ! current_user_can( 'manage_options' ) && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {
   wp_die( __( 'You are not allowed to access this part of the site' ) ); 
  } else {
    global $wpdb;
    session_start();
    $seesioncheck = intval($_POST['sessionId']);
    if($seesioncheck=='removeAll'){
        session_destroy();
    }
    wp_die();
  }
}
add_action('wp_ajax_logico_set_session_destroy','logico_set_session_destroy');
add_action('wp_ajax_nopriv_logico_set_session_destroy','logico_set_session_destroy');
