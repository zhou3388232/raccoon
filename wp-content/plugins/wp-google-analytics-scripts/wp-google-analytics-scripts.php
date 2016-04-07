<?php
/*
Plugin Name: WP Google Analytics Scripts
Plugin URI: http://www.vivacityinfotech.net
Description: WP Google Analytics Scripts generates detailed statistics about a website's traffic and traffic sources and measures conversions and sales.
Author: Vivacity Infotech Pvt. Ltd.
Version: 1.3
Author URI: http://www.vivacityinfotech.net
Requires at least: 3.8
Text Domain: wp-google-analytics-scripts
*/
/*
Copyright 2014  Vivacity InfoTech Pvt. Ltd.  (email : support@vivacityinfotech.com)
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
ob_start();
add_filter('plugin_row_meta', 'RegisterPluginLinks',10, 2);
function RegisterPluginLinks($links, $file) {
	if ( strpos( $file, 'wp-google-analytics-scripts.php' ) !== false ) {
		$links[] = '<a href="https://wordpress.org/plugins/wp-google-analytics-scripts/faq/">FAQ</a>';
		$links[] = '<a href="mailto:support@vivacityinfotech.com">Support</a>';
		$links[] = '<a href="http://bit.ly/1icl56K">Donate</a>';
	}
	return $links;
}
if (isset($_POST['gogolena_feedback_form'])){
	
	 if ( ! function_exists( 'get_plugins' ) ) 
		{
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}
		global $success;
		$all_plugins = get_plugins();
	
		foreach($all_plugins as $plugin)
		{
			
			$plugins_name[] = $plugin['Name'];
		}
		$plugin_name = implode(',', $plugins_name);
		$plugin_name = explode(',', $plugin_name);
		$plugin_list = '<ol>';
		foreach($plugin_name as $plugins){
		$plugin_list .= '<li>';
		$plugin_list.= $plugins;
		$plugin_list .='</li>';
		}
		$plugin_list .='</ol>';
		
		/*Get Activated Plugins List*/
		$active_plugin=get_option('active_plugins');
		$actived_plugin ='<ol>';
    	foreach($active_plugin as $key => $value)
    	{
        $string = explode('/',$value); // Folder name will be displayed
        $actived_plugin .='<li>';
        $actived_plugin .=$string[0];
        $actived_plugin .='</li>';
    	}
    	$actived_plugin .='</ol>';
		$all_themes = get_themes();
		$theme_name = implode(',', $all_themes);
		$theme_name = explode(',', $theme_name);
		foreach($all_themes as $theme)
		{
			$themes_name[] = $theme['Name'];
		}
		
		$theme_list = '<ol>';
		foreach($theme_name as $themes){
		$theme_list .= '<li>';
		$theme_list.= $themes;
		$theme_list .='</li>';
		}
		$theme_list .='</ol>';
		/*Get Active Theme*/
		$active_theme = wp_get_theme();
		$admin_email = sanitize_email($_POST['feedback_email']);
		if(isset($admin_email))
		{
		 $from = $admin_email; 	
		}
		else
		{
		$from = get_option('admin_email');		
		}
		$to = 'supportntest@gmail.com';
		$header = "From: '.$from.'" . "\r\n" .
		$header .= "MIME-Version: 1.0\r\n";
		$header .= "Content-type: text/html\r\n";		
		$subj = sanitize_text_field($_POST['feedback_subject']);
		$sub = 'The '.$from.' has sent this message.'.'<br/>';
		$subject= sanitize_text_field($_POST['feedback_subject']);
		$bodyy = sanitize_text_field($_POST['feedback_comment']);
		$body = '<html><body><label><span style="font-weight:bold">Message: </span></label>'.$bodyy.'<br/><br/>';
		$body .='The <strong>'.$from.'</strong> has sent this message.<br/><br/>';
		$body .='<label><span style="font-weight:bold">Website Information: </span></lable>This site has all theses themes:';
		$body .= $theme_list; 
		$body .='and plugins installed:'.$plugin_list.'';
		$body .='The activated Theme: is <span style="font-weight:bold">'.$active_theme.'</span><br/><br/>';
		$body .='The activated plugins are: '.$actived_plugin.'';
		$body .= '</body></html>';
		wp_mail($to,$subject,$body,$header);
		//echo "<pre>";
		//print_r($body);
		$success ="Thanks For Submitting Review. We will contact you Soon.";
	 
}

function Analytics_settings_page( $links ) {
	$settings_block = '<a href="' . admin_url('admin.php?page=wp-google-analytics-scripts' ) .'">Settings</a>';
	array_unshift( $links, $settings_block);
	return $links;
}

$plugin = plugin_basename(__FILE__);
add_filter( "plugin_action_links_$plugin", 'Analytics_settings_page' );

function Analytics_uninstall() {
	unregister_setting( 'Analytics_settings_page', 'Analytics_setting' );
}

register_uninstall_hook( __FILE__, 'Analytics_uninstall' );

function Analytics_footer() {
	ob_start();
		$options = get_option( 'Analytics_setting' );
		$sfhs_footer = isset( $options['footer_scripts_input'] ) ? $options['footer_scripts_input'] : '';
		echo "<script type=text/javascript>\n";
		echo $sfhs_footer;
		echo "\n</script>";
	echo ob_get_clean();
}

function Analytics_render() {
	$options = get_option( 'Analytics_setting' );

	if ( isset( $options['footer_scripts_input'] ) )
		add_action( 'wp_footer', 'Analytics_footer' );
}

add_action( 'init', 'Analytics_render' );

function Analytics_page_register() {
	add_menu_page( 'VIVA Plugins', 'VIVA Plugins', 'manage_options', 'viva_plugins', 'Analytics_rendepage_submenu', plugins_url( '/images/vivacity_logo.png' ,__FILE__), 1001 );
	add_submenu_page( 'viva_plugins','Add Custom Scripts','WP Google Analytics Scripts', 'manage_options', "wp-google-analytics-scripts", 'Analytics_rendepage_submenu' );
}

add_action( 'admin_menu', 'Analytics_page_register' );

function Analytics_settings_register() {
	register_setting( 'Analytics_settings_page', 'Analytics_setting' );

	add_settings_section( 'Analytics_section', '', 'Analytics_block', __FILE__ );
add_settings_field( 'Analytics_selectbox', 'Google Analytics scripts selector',  'Analytics_selectbox', __FILE__, 'Analytics_section' );
	add_settings_field( 'Analytics_inputbox','Google Analytics Footer Scripts', 'Analytics_inputbox', __FILE__, 'Analytics_section' );
	add_settings_field( 'Analytics_footerbox_track', 'Google Analytics UA Tracking ID', 'Analytics_footerbox_track', __FILE__, 'Analytics_section' );
	add_settings_field( 'Analytics_do_not_track','Visits to ignore:','field_do_not_track',  __FILE__, 'Analytics_section' );
}

add_action('admin_init', 'Analytics_settings_register');
 function field_do_not_track() {
 	$options  = get_option('Analytics_setting');
 
$field_value   = isset( $options['ignore_admin_area'] ) ? $options['ignore_admin_area'] : '';
//echo $field_value;
	/*	$do_not_track = array(
				'ignore_admin_area'       => __( 'Do not log anything in the admin area', 'wp-google-analytics' ),
			); */
		global $wp_roles;
		foreach( $wp_roles->roles as $role => $role_info ) {
			$do_not_track['ignore_role_' . $role] = sprintf( __( 'Do not log %s when logged in', 'wp-google-analytics' ), rtrim( $role_info['name'], 's' ) );
		}
		foreach( $do_not_track as $id => $label ) {
$field_value   = isset( $options[$id] ) ? $options[$id] : '';
			$checked='';
			if($field_value=="true"){$checked= "checked";} 
			echo '<label for="Analytics_setting_' . $id . '">';
			echo '<input id="Analytics_setting_' . $id . '" type="checkbox" name="Analytics_setting[' . $id . ']" value="true" '.$checked.'/>';
			echo '&nbsp;&nbsp;' . $label;
			echo '</label><br />';
		}
	}
function Analytics_block() {} 

function Analytics_selectbox() {
	$options  = get_option('Analytics_setting');
	$field_value   = isset( $options['scripts_selector'] ) ? $options['scripts_selector'] : ''; ?>
	
	<select id="scripts-selector" class="scripts-selector" name="Analytics_setting[scripts_selector]"> 
	<option value="0" <?php if ($field_value=="") echo "selected"; ?>>select an option </option>
	<option value="1" <?php if ($field_value=="1") echo "selected"; ?>>Google Analytics Footer Scripts</option>
	<option value="2" <?php if ($field_value=="2") echo "selected"; ?>>Google Analytics UA Tracking ID </option>
	</select>
	
	<?php
	
	}
function Analytics_inputbox() {
	
	$options  = get_option('Analytics_setting');
	$field_value   = isset( $options['footer_scripts_input'] ) ? $options['footer_scripts_input'] : ''; ?>
	
	<textarea id="ftr-scripts-input" name="Analytics_setting[footer_scripts_input]" placeholder=" Analytics Footer Scripts" style="width:300px; height: 200px;" ><?php echo esc_html( $field_value ) ?></textarea>
	<p class="description"><?php echo 'Enter your Google Analytic Script .';?></p>
	<?php
}
function Analytics_footerbox_track() {
	$options  = get_option('Analytics_setting');
	
	$field_value   = isset( $options['footer_trackid_input'] ) ? $options['footer_trackid_input'] : ''; ?>
	<input id="ftr-trackid-input" name="Analytics_setting[footer_trackid_input]" placeholder="UA-2986XXXX-X." style="width:300px; " value="<?php echo esc_html( $field_value ) ?>"/>
	<p class="description"><?php echo 'Enter your Google UA Code/ID ( "UA-2986XXXX-X" ) here.';?></p>
	<?php
}
add_action('admin_init','enqueue_styles');
function enqueue_styles()
{
	wp_enqueue_style('style_plugin',plugins_url( 'css/plugin_style.css' , __FILE__ ) );	
	wp_enqueue_script('script_plugin',plugins_url( 'js/script.js' , __FILE__ ) );	
	
	}
function Analytics_rendepage_submenu() {
global $success;
	if ( isset( $_GET['settings-updated'] ) ) : ?>
		<div id="message" class="updated"><p><?php _e( 'Scripts updated successfully.' ); ?></p></div>
	<?php endif; ?>
	<div class="wrap_main">
	<div class="postbox plugin_wrap left">
	<h3 class="hndle plugin_head"><?php echo 'Enter your Google Analytic Settings';?></h3>
	<div class="inside">
		<?php screen_icon(); ?>
		 <div class="success_msg"><?php if($success !=''){ echo  $success;} ?></div>
		<h2><?php 'Add Custom Scripts Plugin'; ?></h2>
		<p><?php 'Add your own scripts (including Google Analytics) to your header or footer regardless of what theme you are using.' ?></p>
		<form name="myform" class="myform" action="options.php" method="post" enctype="multipart/form-data">
			<?php settings_fields('Analytics_settings_page'); ?>
			<?php do_settings_sections( __FILE__ ); ?>
			<p class="submit">
				<input name="scripts-submit" type="submit" class="button-primary" id="submit" value='Update Scripts' onclick="" />
			</p>
		</form>
	</div>
	</div>
	
 <div class="right">
 
<div class="bottom">
		    <h3 class="googleanatitle" id="googleana-comments"  title="Click here for expand">Woocommerce Add-ons </h3>
		    <div class="downarrow"></div>
     <div class="togglediv"   id="googleanabl-comments">  
 <div class="googleanatitle_image"><a href="http://bit.ly/1HZGRBg" target="_blank"><img src="<?php echo plugins_url( 'images/banner_1.png' , __FILE__ );?>" alt="Woocommerce front end" title="Woocommerce front end" ></a></div>
  </div> 
</div>
<div class="bottom">
		    <h3 class="googleanatitle" id="googleana1-comments" title="Click here for expand">About Vivacity Infotech</h3>
		    
     <div class="togglediv"  style="display:none"  id="googleana1bl-comments">  
     	<p> <strong>Vivacity InfoTech Pvt. Ltd. , an ISO 9001:2008 Certified Company,</strong>is a Global IT Services company with expertise in outsourced product development and custom software development with focusing on software development, IT consulting, customized development.We have 200+ satisfied clients worldwide.</p>	
<h3 class="company">
<strong>Our</strong>
specialization :
</h3>
<ul class="">
<li>Outsourced Product Development</li>
<li>Customized Solutions</li>
<li>Web and E-Commerce solutions</li>
<li>Multimedia and Designing</li>
<li>ISV Solutions</li>
<li>Consulting Services</li>
<li>
<a target="_blank" href="http://www.lemonpix.com/">
<span class="colortext">Web Hosting</span>
</a>
</li>
 <strong><a target="_blank" href="http://vivacityinfotech.net/contact-us/" >Contact Us Here</a></strong>
</ul>
	<h3 class="company">
Popular Wordpress plugins :
</h3>
<ul class="">
<li><a href="http://wordpress.org/plugins/wp-twitter-feeds/" target="_blank">WP Twitter Feeds</a></li>
<li><a href="https://wordpress.org/plugins/facebook-comment-by-vivacity/" target="_blank">Facebook Comments</a></li>
<li><a href="http://wordpress.org/plugins/wp-facebook-fanbox-widget/" target="_blank">WP Facebook FanBox</a></li>
<li><a href="https://wordpress.org/plugins/wp-fb-share-like-button/" target="_blank">WP Facebook Like Button</a></li>
<li><a href="http://wordpress.org/plugins/wp-google-plus-one-button/" target="_blank">WP Google Plus One Button</a></li>

</ul>
	<h3 class="company">
Popular paid Magento extension :
</h3>
<ul class="">
<li><a href="http://vivacityinfotech.net/shop/service-plans/professional/" target="_blank">Professional Monthly Subscription</a></li>
<li><a href="http://vivacityinfotech.net/shop/magento-extensions/per-product-flat-shipping-rate-magento-extension/" target="_blank">Per Product Flat Shipping Rate Magento </a></li>
<li><a href="http://vivacityinfotech.net/shop/magento-extensions/easy-customers-testimonials/" target="_blank">Easy Testimonial Magento Extension</a></li>
<li><a href="http://vivacityinfotech.net/shop/magento-extensions/easy-social-login-extension-for-magento/" target="_blank">Easy Social Login Extension for Magento</a></li>
<li><a href="http://vivacityinfotech.net/shop/magento-extensions/easy-product-slider-magento-extension/" target="_blank">Easy Product Slider Magento Extension</a></li>

</ul>
  </div> 
</div>
 
<div class="bottom">
		    <h3 class="googleanatitle" id="googleana3-comments"  title="Click here for expand">Donate Here</h3>
		     <div class="downarrow"></div>
     <div class="togglediv"  style="display:none"  id="googleana3bl-comments">  
     <p>If you want to donate , please click on below image.</p>
	<a target="_blank" href="http://bit.ly/1icl56K"><img width="150" height="50" title="Donate Here" src="<?php echo plugins_url( 'images/paypal.gif' , __FILE__ );?>" class="donate"></a>		
  </div> 
</div>
<div class="bottom">
		    <h3 class="googleanatitle" id="googleana4-comments"  title="Click here for expand"><?php _e('Got issue, Need support ?','post-like-and-dislike');?></h3>
 <div class="downarrow"></div>     
     <div class="togglediv"  style="display:none"  id="googleana4bl-comments">  
        <div class="inside">         
            <form method="post" name="feedback_form" id="feedback_form" >
                <div class="success"><h3><?php _e($success,'post-like-and-dislike');?></h3></div>
                <?php if($success == ''){?>
                Do you Found a bug? Or you maybe have a new feature request? Please fill this form and let me know!.<br/>
                <input type="hidden" name="gogolena_feedback_form" value="1">
                <?php $from = get_option('admin_email');?>
                <label><?php _e('Ener Your Email ID','post-like-and-dislike');?></label><br/>
                <input type="text" name="feedback_email" id="feedback_email" size="25" value="<?php echo $from;?>"><br>
                <label><?php _e('Ener Your Subject','post-like-and-dislike');?></label><br/>
                <input type="text" name="feedback_subject" id="feedback_subject" size="25"><br>
                <label><?php _e('Ener Your Comments','post-like-and-dislike');?></label><br/>
                <textarea name="feedback_comment" id ="feedback_comment" rows="4" cols="25"></textarea><br>
                <input class="wpvisr_button button button-primary button-small feedback" type="submit" value="Submit">
           		 <?php }
?>
           </form>
        </div>
  </div> 
 
</div>	
	
	
			</div>
			<script type="text/javascript" >
jQuery(document).ready(function($){
    //alert('Hello World!');
   jQuery("#googleana1-comments").click(function(){
      jQuery("#googleana1bl-comments").animate({
        height:'toggle'
      });
  });  
  jQuery("#googleana-comments").click(function(){
      jQuery("#googleanabl-comments").animate({
        height:'toggle'
      });
  }); 
   jQuery("#googleana3-comments").click(function(){
      jQuery("#googleana3bl-comments").animate({
        height:'toggle'
      });
  }); 
  jQuery("#googleana4-comments").click(function(){
      jQuery("#googleana4bl-comments").animate({
        height:'toggle'
      });
  });
  

  
});

</script>
	<?php
}


add_action('wp_footer','viva_ua_code');


function viva_ua_code() {

$current_user = wp_get_current_user();
 	$options  = get_option('Analytics_setting');
if (!isset($options['ignore_role_administrator'])) {$options['ignore_role_administrator'] = "";}
if (!isset($options['ignore_role_editor'])) {$options['ignore_role_editor'] = "";}
if (!isset($options['ignore_role_subscriber'])) {$options['ignore_role_subscriber'] = "";}
if (!isset($options['ignore_role_contributor'])) {$options['ignore_role_contributor'] = "";}
if (!isset($options['ignore_role_author'])) {$options['ignore_role_author'] = "";}
 	$user = new WP_User( get_current_user_id() );
//	echo '<pre>'; print_r($options);echo '</pre>';
$user_role = $user->roles[0];
//echo $user_role;
// $screen = get_current_screen();
//echo '<pre>'; 
 //print_r($screen);

	if( ($options['ignore_role_administrator'] && $user_role == 'administrator') || ($options['ignore_role_editor'] && $user_role == 'editor') || ($options['ignore_role_subscriber'] && $user_role == 'subscriber') || ($options['ignore_role_contributor'] && $user_role == 'contributor') || ($options['ignore_role_author'] && $user_role == 'author')) 
		return 0;
		
	$ua_code = get_option( 'Analytics_setting' );
	 $ua_id = $ua_code['footer_trackid_input'];
	 $ua_script = $ua_code['footer_scripts_input'];
	$home_url = get_home_url();
	$find = array( 'http://', 'https://', 'www.');
	$replace = '';
	$output = str_replace( $find, $replace, $home_url );

	if(($ua_id !== '') && ($ua_script == '') ) {
		echo "
		<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', '".$ua_id."', '".$output."');
	ga('send', 'pageview');
	</script>";
	}
  }
