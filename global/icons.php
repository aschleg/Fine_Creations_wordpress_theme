<?php global $fc_options;
	$fc_settings = get_option( 'fc_options', $fc_options );
?>

<div class="socialicons group pull-right">
	<?php if( $fc_settings['twitter_url'] != '' ) : ?>
	<a href="<?php echo $fc_settings['twitter_url']; ?>" title="Twitter"><i aria-hidden="true" data-icon="f"></i><span>Twitter</span></a>
	<?php endif; ?>

	<?php if( $fc_settings['facebook_url'] != '' ) : ?>
	<a href="<?php echo $fc_settings['facebook_url']; ?>" title="Facebook"><i aria-hidden="true" data-icon="a"></i><span>Facebook</span></a>
	<?php endif; ?>

	<?php if( $fc_settings['github_url'] != '' ) : ?>
	<a href="<?php echo $fc_settings['github_url']; ?>" title="Github"><i aria-hidden="true" data-icon="b"></i><span>Github</span></a>
	<?php endif; ?>

	<?php if( $fc_settings['google_url'] != '' ) : ?>
	<a href="<?php echo $fc_settings['google_url']; ?>" title="Google+"><i aria-hidden="true" data-icon="c"></i><span>Google+</span></a>
	<?php endif; ?>

	<?php if( $fc_settings['linkedin_url'] != '' ) : ?>
	<a href="<?php echo $fc_settings['linkedin_url']; ?>" title="Linkedin"><i aria-hidden="true" data-icon="d"></i><span>Linkedin</span></a>
	<?php endif; ?>

	<?php if( $fc_settings['pinterest_url'] != '' ) : ?>
	<a href="<?php echo $fc_settings['pinterest_url']; ?>" title="Pinterest"><i aria-hidden="true" data-icon="e"></i><span>Pinterest</span></a>
	<?php endif; ?>

	<?php if( $fc_settings['vimeo_url'] != '' ) : ?>
	<a href="<?php echo $fc_settings['vimeo_url']; ?>" title="Vimeo"><i aria-hidden="true" data-icon="g"></i><span>Vimeo</span></a>
	<?php endif; ?>
</div>
