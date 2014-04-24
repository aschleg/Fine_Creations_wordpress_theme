<?php get_header(); ?>

<div class="row">

	<div class="article col-md-9">

		<?php
			$wp_query = new WP_Query();
			$wp_query->query('category_name='.blog.'&paged='.$paged);
		?>
		<?php
			if( $wp_query->have_posts() ) :
			while( $wp_query->have_posts() ) :
			$wp_query->the_post();
		?>

		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('blog'); ?></a>
		<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<p><?php the_excerpt(__ ('(more...)')); ?></p>
		<hr>
		
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
		<?php else: endif; ?>

	</div>

	<div class="col-md-3">
		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>
