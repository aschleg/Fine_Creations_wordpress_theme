<?php global $fc_options;
	$fc_settings = get_option( 'fc_options', $fc_options );
?>

<style>
	<?php if( $fc_settings['site-color'] != '' ) : ?>

	 {
		background-color: <?php echo $fc_settings['site-color']; ?>;
	}
	
	<?php endif; ?>
</style>