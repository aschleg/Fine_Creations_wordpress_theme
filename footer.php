
<footer class="group">

	<?php include (TEMPLATEPATH . '/global/icons.php' ); ?>

	<?php global $fc_options;
		$fc_settings = get_option( 'fc_options', $fc_options );
	?>

</footer>

<?php wp_footer(); ?>

</body>
</html>