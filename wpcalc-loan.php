<?php

/**
 * @link              http://wpcalc.com/
 * @since             1.1
 * @package           WpCalc_Loan
 *
 * @wordpress-plugin
 * Plugin Name:       WpCalc Loan
 * Plugin URI:       http://wpcalc.com/en/loan-calculators/
 * Description:       Mortgage, loan and car loan calculators on your site. More calculators - http://wpcalc.com/
 * Version:           1.1
 * Author:            Dimy4 Wpcalc
 * Author URI:        http://wpcalc.com/
 * Text Domain:       wpcalc-loan
 * Domain Path:       /languages
 */

 if ( ! defined( 'WPINC' ) ) {
	die;
}

load_plugin_textdomain('wpcalc-loan', false, dirname(plugin_basename(__FILE__)) . '/languages/');


register_activation_hook(__FILE__,'wpcalc_loan_install');
 
function wpcalc_loan_install() {
	add_option( 'credit', '20 000' );
	add_option( 'term', '24' );
	add_option( 'percent', '12' );
	add_option( 'term2', '48' );
	add_option( 'percent2', '10' );
	add_option( 'term3', '36' );
	add_option( 'percent3', '9' );
	add_option( 'stoimkv', '20 000' );
	add_option( 'firstpay', '2 000' );
	add_option( 'stoimkv3', '10 000' );
	add_option( 'firstpay3', '1 000' );
}

function wpcalc_loan_insert($attr){
    if(preg_match('/\[wpcalc-loan id=(\d+)\]/i', $attr, $id))
    {
        $file = plugin_dir_path(__FILE__).'calc/'.$id[1].'.php';		
		wp_enqueue_style( 'wpcalc-loan-style', plugins_url( '/style.css', __FILE__ ));
		wp_enqueue_script( 'wpcalc-loan-script', plugins_url( '/js/'.$id[1].'.js', __FILE__ ));
		$print_url = plugins_url( '/print.css', __FILE__ );
		wp_localize_script( 'wpcalc-loan-script', 'wpc_loan_print', $print_url );
				
		    if(file_exists($file))
				{
					ob_start(); 
					include($file); 					
					$wpcalc = ob_get_contents();
					ob_end_clean();
					return str_ireplace($id[0], $wpcalc, $attr);
				}
    }
    return $attr;
}
add_filter('the_content', 'wpcalc_loan_insert');


add_action('admin_menu', 'add_global_wpcalc_loan_options');
function add_global_wpcalc_loan_options(){
    add_options_page('Wpcalc Loan', 'Wpcalc Loan', 'manage_options', 'wpcalc_loan','global_wpcalc_loan_options');
}
function global_wpcalc_loan_options()
{
?>
<a href="http://wpcalc.com/" target="_blank"><img src="<?php echo plugins_url('knowhow-logo.png', __FILE__); ?>"></a>
<h2><?php esc_attr_e("Page loan calculator", "wpcalc-loan") ?></h2>

<div style="background: #fff; padding: 10px;">
<?php esc_attr_e("Thank you for installing the plugin WpCalc Loan. For any questions, please contact", "wpcalc-loan") ?> ad@wpcalc.com<p/>
<?php esc_attr_e("Features of the paid version can be viewed here", "wpcalc-loan") ?> <a href=" http://wpcalc.com/en/loan-calculators/" target="_blank">http://wpcalc.com/en/loan-calculators/</a>
<?php esc_attr_e("To insert a calculator on a page or post using shortcode", "wpcalc-loan") ?>
</div>

<h3><?php esc_attr_e("Calculators", "wpcalc-loan") ?></h3>
<ol>
<li><?php esc_attr_e("Loan calculator", "wpcalc-loan") ?> <b>[wpcalc-loan id=1]</b></li>
<li> <?php esc_attr_e("Mortgage Calculator", "wpcalc-loan") ?> <b>[wpcalc-loan id=2]</b></li>
<li> <?php esc_attr_e("Auto loan calculator", "wpcalc-loan") ?> <b>[wpcalc-loan id=3]</b></li>
</ol>

<form method="post" name="options_loan" action="options.php">
<?php wp_nonce_field('update-options') ?>

<table width=100%>
<tr><td colspan=3><h3><?php esc_attr_e("Settings for", "wpcalc-loan") ?> <?php esc_attr_e("Loan calculator", "wpcalc-loan") ?></h3></td></tr>

<tr><td><?php esc_attr_e("Amount of credit", "wpcalc-loan") ?></td><td> <input type="text" name="credit" value="<?php echo get_option('credit'); ?>" /></td></tr>
<tr><td><?php esc_attr_e("Credit term", "wpcalc-loan") ?></td><td> <input type="text" name="term" value="<?php echo get_option('term'); ?>" /></td></tr>
<tr><td><?php esc_attr_e("Interest rate", "wpcalc-loan") ?></td><td> <input type="text" name="percent" value="<?php echo get_option('percent'); ?>" /></td></tr>

<tr><td colspan=3><h3><?php esc_attr_e("Settings for", "wpcalc-loan") ?> <?php esc_attr_e("Mortgage Calculator", "wpcalc-loan") ?></h3></td></tr>

<tr><td><?php esc_attr_e("Cost of apartments", "wpcalc-loan") ?></td><td> <input type="text" name="stoimkv" value="<?php echo get_option('stoimkv'); ?>" /></td></tr>
<tr><td><?php esc_attr_e("Down payment", "wpcalc-loan") ?></td><td> <input type="text" name="firstpay" value="<?php echo get_option('firstpay'); ?>" /></td></tr>
<tr><td><?php esc_attr_e("Credit term", "wpcalc-loan") ?></td><td> <input type="text" name="term2" value="<?php echo get_option('term2'); ?>" /></td></tr>
<tr><td><?php esc_attr_e("Interest rate", "wpcalc-loan") ?></td><td> <input type="text" name="percent2" value="<?php echo get_option('percent2'); ?>" /></td></tr>

<tr><td colspan=3><h3><?php esc_attr_e("Settings for", "wpcalc-loan") ?> <?php esc_attr_e("Auto loan calculator", "wpcalc-loan") ?></h3></td></tr>


<tr><td><?php esc_attr_e("Cost of apartments", "wpcalc-loan") ?></td><td> <input type="text" name="stoimkv3" value="<?php echo get_option('stoimkv3'); ?>" /></td></tr>
<tr><td><?php esc_attr_e("Down payment", "wpcalc-loan") ?></td><td> <input type="text" name="firstpay3" value="<?php echo get_option('firstpay3'); ?>" /></td></tr>
<tr><td><?php esc_attr_e("Credit term", "wpcalc-loan") ?></td><td> <input type="text" name="term3" value="<?php echo get_option('term3'); ?>" /></td></tr>
<tr><td><?php esc_attr_e("Interest rate", "wpcalc-loan") ?></td><td> <input type="text" name="percent3" value="<?php echo get_option('percent3'); ?>" /></td></tr>
</table>
            
            <p><input type="submit" name="Submit" value="Save" /></p>
            <input type="hidden" name="action" value="update" />
            <input type="hidden" name="page_options" value="credit,term,percent,term2,percent2,term3,percent3,stoimkv,firstpay,stoimkv3,firstpay3" />
        </form>

<iframe src="http://wpcalc.com/plug/" width="100%" height="550px"></iframe>
    
<?php
}

function true_add_wpcalc_loan_button() {	
	if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
		return; 
	}
	if ( 'true' == get_user_option( 'rich_editing' ) ) {
		add_filter( 'mce_external_plugins', 'true_add_tinymce_wpcalc_loan_script' );
		add_filter( 'mce_buttons', 'true_register_wpcalc_loan_button' );
	}
}
add_action('admin_head', 'true_add_wpcalc_loan_button');
 
function true_add_tinymce_wpcalc_loan_script( $plugin_array ) {
	$plugin_array['true_wpcalc_loan_button'] = plugins_url( 'button.js', __FILE__ );
	return $plugin_array;
} 
function true_register_wpcalc_loan_button( $buttons ) {
	array_push( $buttons, 'true_wpcalc_loan_button' );
	return $buttons;
}


?>