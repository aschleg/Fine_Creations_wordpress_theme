<?php

$fc_options = array(
	'logo_url' => '',
	'site-color' => '',
	'twitter_url' => '',
	'facebook_url' => '',
	'linkedin_url' => '',
	'github_url' => '',
	'vimeo_url' => '',
	'instagram_url' => '',
	'flickr_url' => '',
	'pinterest_url' => '',
	'google_url' => '',
	'intro' => '',
	'checkout' => '',
	);

if ( is_admin() ):
	function fc_register_settings() {
		register_setting( 'fc_theme_options', 'fc_options', 'fc_validate_options');
	}
	add_action( 'admin_init', 'fc_register_settings');

	function fc_theme_options() {
		add_theme_page( 'Theme Options', 'Theme Options', 'edit_theme_options', 'theme_options', 'fc_theme_options_page');
	}
	add_action( 'admin_menu', 'fc_theme_options' );

	function fc_theme_options_page() {
		global $fc_options, $fc_categories, $fc_layouts;

		if ( ! isset( $_REQUEST['updated'] ) )
			$_REQUEST['updated'] = false; ?>

		<div class="wrap">

			<?php echo $theme_name;screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options' ) . "</h1>";?>

			<?php if ( false !==$_REQUEST['updated'] ) : ?>

			<div class="updated fade"><p><strong><?php _e( 'Options saved' ); ?></strong></p></div>
			<div><p><strong><?php _e( 'Options saved' ); ?></strong></p></div>


			<?php endif; ?>

			<form method="post" action="options.php">

				<?php $settings = get_option( 'fc_options', $fc_options ); ?>

				<?php settings_fields( 'fc_theme_options' ); ?>

				<table class="form-table">

					<tr valign="top"><th scope="row"><label for="logo_url">Logo URL:</label></th>
						<td>
							<input id="logo_url" name="fc_options[logo_url]" type="text" placeholder="http://" value="<?php esc_attr_e($settings['logo_url']); ?>" />
							<p>Upload logo via <a href="<?php echo get_option('siteurl'); ?>/wp-admin/media-new.php">Add new image</a></p>
						</td>
					</tr>

					<tr valign="top"><th scope="row"><label for="site-color">Site Color:</label></th>
						<td>
							<input id="site_color" name="fc_options[site-color]" type="text" placeholder="blue" value="<?php esc_attr_e($settings['site-color']); ?>" />
						</td>
					</tr>

					<tr valign="top"><th scope="row"><label for="twitter_url">Twitter URL:</label></th>
						<td>
							<input id="twitter" name="fc_options[twitter_url]" type="text" placeholder="http://" value="<?php esc_attr_e($settings['twitter_url']); ?>" />
						</td>
					</tr>

					<tr valign="top"><th scope="row"><label for="facebook_url">Facebook URL:</label></th>
						<td>
							<input id="facebook" name="fc_options[facebook_url]" type="text" placeholder="http://" value="<?php esc_attr_e($settings['facebook_url']); ?>" />
						</td>
					</tr>

					<tr valign="top"><th scope="row"><label for="linkedin_url">LinkedIn URL:</label></th>
						<td>
							<input id="linkedin" name="fc_options[linkedin_url]" type="text" placeholder="http://" value="<?php esc_attr_e($settings['linkedin_url']); ?>" />
						</td>
					</tr>

					<tr valign="top"><th scope="row"><label for="github_url">Github URL:</label></th>
						<td>
							<input id="github" name="fc_options[github_url]" type="text" placeholder="http://" value="<?php esc_attr_e($settings['github_url']); ?>" />
						</td>
					</tr>

					<tr valign="top"><th scope="row"><label for="vimeo_url">Vimeo URL:</label></th>
						<td>
							<input id="vimeo" name="fc_options[vimeo_url]" type="text" placeholder="http://" value="<?php esc_attr_e($settings['vimeo_url']); ?>" />
						</td>
					</tr>

					<tr valign="top"><th scope="row"><label for="tumblr_url">Tumblr URL:</label></th>
						<td>
							<input id="tumblr" name="fc_options[tumblr_url]" type="text" placeholder="http://" value="<?php esc_attr_e($settings['tumblr_url']); ?>" />
						</td>
					</tr>

					<tr valign="top"><th scope="row"><label for="flickr_url">Flickr URL:</label></th>
						<td>
							<input id="flickr" name="fc_options[flickr_url]" type="text" placeholder="http://" value="<?php esc_attr_e($settings['flickr_url']); ?>" />
						</td>
					</tr>

					<tr valign="top"><th scope="row"><label for="pinterest_url">Pinterest URL:</label></th>
						<td>
							<input id="pinterest" name="fc_options[pinterest_url]" type="text" placeholder="http://" value="<?php esc_attr_e($settings['pinterest_url']); ?>" />
						</td>
					</tr>

					<tr valign="top"><th scope="row"><label for="google_url">Google+ URL:</label></th>
						<td>
							<input id="google" name="fc_options[google_url]" type="text" placeholder="http://" value="<?php esc_attr_e($settings['google_url']); ?>" />
						</td>
					</tr>

					<tr valign="top"><th scope="row"><label for="intro">Site Description: </label></th>
						<td>
							<textarea id="intro" name="fc_options[intro]" cols="50" rows="10" type="text" placeholder="Description" value="<?php esc_textarea($settings['intro']); ?>" /></textarea>
						</td>
					</tr>
					<tr valign="top"><th scope="row"><label for="checkout">Find me here: </label></th>
						<td>
							<textarea id="checkout" class="large-text" name="fc_options[checkout]" cols="50" rows="10" type="text" value="<?php esc_textarea($settings['checkout']); ?>" /></textarea>
						</td>
					</tr>
					<p>Note: wrap content in span tags to change words to white background with blue text</p>

				</table>

				<p class="submit"><input type="submit" class="button-primary" value="Save Options" /></p>

			</form>
		</div>

		<?php	
	}

	function fc_validate_options( $input ) {
		global $fc_options, $fc_categories, $fc_layouts;

		$settings = get_option( 'fc_options', $fc_options );

		return $input;
	}

	endif;