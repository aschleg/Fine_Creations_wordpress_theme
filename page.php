<?php get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-sm-3 col-md-3 sidebar">
			<?php get_sidebar(); ?>
		</div>
		<div class="col-xs-12 col-sm-9 col-md-9 main">
			<?php
				$wp_query = new WP_Query();
				$wp_query->query('category_name='.blog.'&paged='.$paged);
			?>
			<?php
				if( $wp_query->have_posts() ) :
				while( $wp_query->have_posts() ) :
				$wp_query->the_post();
			?>

			<div class="post-content col-md-12">
				<div class="thumbnail">
					<?php the_post_thumbnail('blog'); ?>
				</div>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<p><?php the_excerpt(__ ('(more...)')); ?></p>
			</div>

			<hr>

			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
			<?php else: endif; ?>

		</div>
	</div>
</div>

<?php get_footer(); ?>
