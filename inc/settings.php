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
function logico_show_page_html()
{
    if (!is_admin()) {
        return;
    }
?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <div class="wrap">
        <?php
            settings_fields('logico-show');
            do_settings_sections('logico-show');
        ?>
    </div>
    <?php
}

//top level administration menu
function logico_register_show_page()
{
   add_menu_page( 'logico show page', 'Logico', 'manage_options', 'logico-show', 'logico_setting_page', ''.plugins_url().'/Logico/assets/images/kiaro.png', 30 );
}
add_action('admin_menu', 'logico_register_show_page');

function logico_setting_page()
{
    global $session;
    session_start();
    $checkRegister = get_option( 'plugin_set' );
    $shop_url = get_bloginfo( 'title' );
    $shop = str_replace(' ','.',$shop_url);
    $shopvalue = get_option($shop);
    if( $checkRegister != 1 ){
  		 wp_enqueue_script('logico-registerjs', LOGICO_PLUGIN_DIR . 'assets/js/registerjs.js', array('jquery'), '1.0.0', true);
  		 wp_localize_script('logico-registerjs','logico_ajax_url',array('ajax_url'=>admin_url('admin-ajax.php')));
       
        require plugin_dir_path(__FILE__).'register.php' ;
    } else {
        if($_SESSION["campaignId"]!='' && $_SESSION["token"]!='' && $_SESSION["userId"]!=''){
            if($shopvalue==0){
      				wp_enqueue_script('logico-termsjs', LOGICO_PLUGIN_DIR . 'assets/js/termsjs.js', array('jquery'), '1.0.0', true);
      				wp_localize_script('logico-termsjs','logico_ajax_url',array('ajax_url'=>admin_url('admin-ajax.php')));

              require plugin_dir_path(__FILE__).'termscondition.php' ;
            }
            else{
    					wp_enqueue_script('dashboardjs', LOGICO_PLUGIN_DIR . 'assets/js/dashboardjs.js', array('jquery'), '1.0.0', true);
    					wp_localize_script('dashboardjs','logico_ajax_url',array('ajax_url'=>admin_url('admin-ajax.php')));

              require plugin_dir_path(__FILE__).'logicodashboard.php' ;
            }
        } else {
      			wp_enqueue_script('loginjs', LOGICO_PLUGIN_DIR . 'assets/js/loginjs.js', array('jquery'), '1.0.0', true);
      			wp_localize_script('loginjs','logico_ajax_url',array('ajax_url'=>admin_url('admin-ajax.php')));

            require plugin_dir_path(__FILE__).'login.php' ;
        }
    }
}

?>