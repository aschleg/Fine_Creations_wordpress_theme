<footer>

	<p id="scrolltop">
		<a href="#top"><span class="img-circle"></span></a>
	</p>

	<?php include (TEMPLATEPATH . '/global/icons.php' ); ?>

	<?php global $fc_options;
		$fc_settings = get_option( 'fc_options', $fc_options );
	?>

</footer>

<?php wp_footer(); ?>
<script type="text/javascript">

	var wow = new WOW(
	{
		boxClass: 'wow',
		animateClass: 'animated',
		offset: 0,
		mobile: false
	}
);
wow.init();

</script>

</body>
</html>