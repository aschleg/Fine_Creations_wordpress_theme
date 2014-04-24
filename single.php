<?php get_header(); ?>

<div class="row">
	
	<div class="col-md-9 blog">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>
		  
			<?php endwhile; else: ?>
				<p><?php _e('Page does not exist.'); ?></p>
			<?php endif; ?>
	</div>
	
	<div class="col-md-3">
		<?php get_sidebar(); ?>
	</div>

</div>

<?php get_footer(); ?>