<?php
/*
Template Name: Contact
*/
?>

<?php get_header(); ?>

<div class="contact-page">
	<div class="page-header">
		<h1 class="wow fadeInRight">Get in Touch</h1>

		<?php global $fc_options;
			$fc_settings = get_option( 'fc_options', $fc_options );
		?>
		<?php if( $fc_settings['contact'] != '' ) : ?>

		<h2 class="wow fadeInLeftBig">
			<?php echo $fc_settings['contact']; ?>
			<?php endif; ?>
		</h2>

	</div>
	<div class="container">
		<div class="col-md-12">
			
			<div class="contactform">
			<?php echo do_shortcode('[contact-form-7 id="730" title="Contact Form"]'); ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>