<?php
// Block direct requests
if ( !defined('ABSPATH') ) {
	exit();
}

// ------------- Functions ------------- 

function reme_how_to_use() {
	?>
	<div class="wrap">
		<h1 id="reach-me-header"><?php _e('Reach Me', 'reach-me'); ?></h1>
		<h2><?php _e('How to use', 'reach-me'); ?></h2>
		<div class="tool-box">
			<p><?php _e('If you want to display the links on your website, use', 'reach-me'); ?> <code><?php echo htmlspecialchars("<?php echo (get_option('reme_facebook')); ?>"); ?></code> <?php _e('etc', 'reach-me'); ?>.</p>
			<p><?php _e('List of options:', 'reach-me'); ?></p>

			<pre>
       	reme_facebook
       	reme_google
       	reme_instagram
       	reme_linkedin
       	reme_snapchat
       	reme_twitter
        reme_vk
       	reme_youtube
        reme_email
        reme_fax
        reme_mobile
        reme_phone
        reme_skype
        reme_country
        reme_state
        reme_city
        reme_street
        reme_zip
			</pre>
		</div>
		<div class="tool-box">
			<h3 class="title"><?php _e('Do you need support?', 'reach-me'); ?></h3>
			<p><?php _e("If you are in need of support, or if you want to make a suggestion, please visit the plugin's", 'reach-me'); ?> <a href="https://wordpress.org/plugins/reach-me" target="_blank"><?php _e('Wordpress page', 'reach-me'); ?></a>.</p>	
		</div>
	</div>
<?php }