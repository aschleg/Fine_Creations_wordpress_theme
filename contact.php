<?php
/*
Template Name: Contact
*/
?>

<?php get_header(); ?>

<div id="contact-page">
	<div class="container">
		<div class="col-md-12">
			<h1 class="wow fadeInRight">Contact</h1>
			<div class="contactform">
			<?php echo do_shortcode('[contact-form-7 id="730" title="Contact Form"]'); ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>