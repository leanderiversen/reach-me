<?php
// Block direct requests
if ( !defined('ABSPATH') ) {
	exit();
}


// Get options
function reme_get_options() {
	global $wpdb;

	return $wpdb->get_results("SELECT `option_name` FROM $wpdb->options WHERE `option_name` LIKE 'reme_%'");
}

// ------------- Functions -------------
function reme_links_admin() {

	$hidden_field_name = 'reme';

	if (!empty($_POST) && ($_POST[$hidden_field_name] == 'reme')) {

		// Social links
		$facebook   = !empty($_POST['facebook']) ? trim(strip_tags($_POST['facebook'])) : '';
		$google 	  = !empty($_POST['google']) ? trim(strip_tags($_POST['google'])) : '';
		$instagram  = !empty($_POST['instagram']) ? trim(strip_tags($_POST['instagram'])) : '';
		$linkedin   = !empty($_POST['linkedin']) ? trim(strip_tags($_POST['linkedin'])) : '';
		$snapchat   = !empty($_POST['snapchat']) ? trim(strip_tags($_POST['snapchat'])) : '';
		$twitter    = !empty($_POST['twitter']) ? trim(strip_tags($_POST['twitter'])) : '';
    $vk         = !empty($_POST['vk']) ? trim(strip_tags($_POST['vk'])) : '';
		$youtube 	  = !empty($_POST['youtube']) ? trim(strip_tags($_POST['youtube'])) : '';

		// Contact info
		$email 		  = !empty($_POST['email']) ? trim(strip_tags($_POST['email'])) : '';
		$fax 		    = !empty($_POST['fax']) ? trim(strip_tags($_POST['fax'])) : '';
		$mobile 	  = !empty($_POST['mobile']) ? trim(strip_tags($_POST['mobile'])) : '';
		$phone 		  = !empty($_POST['phone']) ? trim(strip_tags($_POST['phone'])) : '';
		$skype      = !empty($_POST['skype']) ? trim(strip_tags($_POST['skype'])) : '';

		// Address
		$country 	  = !empty($_POST['country']) ? trim(strip_tags($_POST['country'])) : '';
		$state 		  = !empty($_POST['state']) ? trim(strip_tags($_POST['state'])) : '';
		$city 		  = !empty($_POST['city']) ? trim(strip_tags($_POST['city'])) : '';
		$street 	  = !empty($_POST['street']) ? trim(strip_tags($_POST['street'])) : '';
		$zip 		    = !empty($_POST['zip']) ? trim(strip_tags($_POST['zip'])) : '';

		// Social links
		update_option('reme_facebook', $facebook);
		update_option('reme_google', $google);
		update_option('reme_instagram', $instagram);
		update_option('reme_linkedin', $linkedin);
		update_option('reme_skype', $skype);
		update_option('reme_snapchat', $snapchat);
		update_option('reme_twitter',	$twitter);
    update_option('reme_vk', $vk);
		update_option('reme_youtube', $youtube);

		// Contact info
		update_option('reme_phone', $phone);
		update_option('reme_mobile', $mobile);
		update_option('reme_fax', $fax);
		update_option('reme_email', $email);

		// Address
		update_option('reme_country', $country);
		update_option('reme_state', $state);
		update_option('reme_city', $city); 
		update_option('reme_street', $street);
		update_option('reme_zip', $zip); 

		add_action('admin_notices', 'reme_updated_notice');
		$msg = __('Information successfully updated.', 'reach-me');
		reme_updated_notice($msg);

		do_action( 'reme_updated_info' ); // clear widgets cache
	} 
	$customSocial = reme_get_options();
	?>
	<div class="wrap">
		<h1 id="reach-me-header"><?php _e('Reach Me', 'reach-me'); ?></h1>
		<form name="contactForm" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
			<h3><?php _e('Links to social media', 'reach-me'); ?></h3>

			<span class="description"><?php _e('This is where you want to enter links to your social platforms.', 'reach-me'); ?></span>
			<table class="form-table">
				<tbody>
					<tr>
						<th><label for="facebook"><i class="fa fa-facebook" aria-hidden="true"></i> | <?php _e('Facebook', 'reach-me'); ?></label></th>
						<td>
							<input id="facebook" name="facebook" class="regular-text" type="text" value="<?php echo get_option('reme_facebook'); ?>" />
						</td>
					</tr>
					<tr>
						<th><label for="google"><i class="fa fa-google-plus" aria-hidden="true"></i> | <?php _e('Google+', 'reach-me'); ?></label></th>
						<td>
							<input id="google" name="google" class="regular-text" type="text" value="<?php echo get_option('reme_google'); ?>" />
						</td>
					</tr>
					<tr>
						<th><label for="instagram"><i class="fa fa-instagram" aria-hidden="true"></i> | <?php _e('Instagram', 'reach-me'); ?></label></th>
						<td>
							<input id="instagram" name="instagram" class="regular-text" type="text" value="<?php echo get_option('reme_instagram'); ?>" />
						</td>
					</tr>
					<tr>
						<th><label for="linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i> | <?php _e('LinkedIn', 'reach-me'); ?></label></th>
						<td>
							<input id="linkedin" name="linkedin" class="regular-text" type="text" value="<?php echo get_option('reme_linkedin'); ?>" />
						</td>
					</tr>
					<tr>
						<th><label for="snapchat"><i class="fa fa-snapchat-ghost" aria-hidden="true"></i> | <?php _e('Snapchat', 'reach-me'); ?></label></th>
						<td>
							<input id="snapchat" name="snapchat" class="regular-text" type="text" value="<?php echo get_option('reme_snapchat'); ?>" />
						</td>
					</tr>
					<tr>
						<th><label for="twitter"><i class="fa fa-twitter" aria-hidden="true"></i> | <?php _e('Twitter', 'reach-me'); ?></label></th>
						<td>
							<input id="twitter" name="twitter" class="regular-text" type="text" value="<?php echo get_option('reme_twitter'); ?>" />
						</td>
					</tr>
					<tr>
						<th><label for="vk"><i class="fa fa-vk" aria-hidden="true"></i> | <?php _e('VK', 'reach-me'); ?></label></th>
						<td>
							<input id="vk" name="vk" class="regular-text" type="text" value="<?php echo get_option('reme_vk'); ?>" />
						</td>
					</tr>
					<tr>
						<th><label for="youtube"><i class="fa fa-youtube" aria-hidden="true"></i> | <?php _e('YouTube', 'reach-me'); ?></label></th>
						<td>
							<input id="youtube" name="youtube" class="regular-text" type="text" value="<?php echo get_option('reme_youtube'); ?>" />
						</td>
					</tr>
				</tbody>
			</table>
			<h3><?php _e('Ways to get in touch', 'reach-me'); ?></h3>
			<span class="description"><?php _e('This is where you want to enter your contact information.', 'reach-me'); ?></span>
			<table class="form-table">
				<tbody>
					<tr>
						<th><label for="email"><i class="fa fa-envelope" aria-hidden="true"></i> | <?php _e('E-mail', 'reach-me'); ?></label></th>
						<td><input id="email" name="email" class="regular-text" type="text" value="<?php echo get_option('reme_email'); ?>"></td>
					</tr>
					<tr>
						<th><label for="fax"><i class="fa fa-fax" aria-hidden="true"></i> | <?php _e('FAX', 'reach-me'); ?></label></th>
						<td><input id="fax" name="fax" class="regular-text" type="text" value="<?php echo get_option('reme_fax'); ?>"></td>
					</tr>
					<tr>
						<th><label for="mobile"><i class="fa fa-mobile" aria-hidden="true"></i> | <?php _e('Mobile', 'reach-me'); ?></label></th>
						<td><input id="mobile" name="mobile" class="regular-text" type="text" value="<?php echo get_option('reme_mobile'); ?>"></td>
					</tr>
					<tr>
						<th><label for="phone"><i class="fa fa-phone" aria-hidden="true"></i> | <?php _e('Phone', 'reach-me'); ?></label></th>
						<td><input id="phone" name="phone" class="regular-text" type="text" value="<?php echo get_option('reme_phone'); ?>"></td>
					</tr>
					<tr>
						<th><label for="skype"><i class="fa fa-skype" aria-hidden="true"></i> | <?php _e('Skype', 'reach-me'); ?></label></th>
						<td><input id="skype" name="skype" class="regular-text" type="text" value="<?php echo get_option('reme_skype'); ?>"></td>
					</tr>
				</tbody>
			</table>
			<h3><?php _e('Where to meet', 'reach-me'); ?></h3>
			<span class="description"><?php _e('This is where you want to enter where you are physically located.', 'reach-me'); ?></span>
			<table class="form-table">
				<tbody>
					<tr>
						<th><label for="country"><i class="fa fa-globe" aria-hidden="true"></i> | <?php _e('Country', 'reach-me'); ?></label></th>
						<td><input id="country" name="country" class="regular-text" type="text" value="<?php echo get_option('reme_country'); ?>"></td>
					</tr>
					<tr>
						<th><label for="state"><i class="fa fa-globe" aria-hidden="true"></i> | <?php _e('State', 'reach-me'); ?></label></th>
						<td><input id="state" name="state" class="regular-text" type="text" value="<?php echo get_option('reme_state'); ?>"></td>
					</tr>
					<tr>
						<th><label for="city"><i class="fa fa-globe" aria-hidden="true"></i> | <?php _e('City', 'reach-me'); ?></label></th>
						<td><input id="city" name="city" class="regular-text" type="text" value="<?php echo get_option('reme_city'); ?>"></td>
					</tr>
					<tr>
						<th><label for="street"><i class="fa fa-globe" aria-hidden="true"></i> | <?php _e('Street', 'reach-me'); ?></label></th>
						<td><input id="street" name="street" class="regular-text" type="text" value="<?php echo get_option('reme_street'); ?>"></td>
					</tr>
					<tr>
						<th><label for="zip"><i class="fa fa-globe" aria-hidden="true"></i> | <?php _e('Zip code', 'reach-me'); ?></label></th>
						<td><input id="zip" name="zip" class="regular-text" type="text" value="<?php echo get_option('reme_zip'); ?>"></td>
					</tr>
				</tbody>
			</table>
			<p class="submit">
				<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="reme">
				<input id="submit" class="button button-primary" type="submit" value="<?php _e('Update info', 'reach-me'); ?>" name="submit">
			</p>
		</form>
	</div>
<?php }