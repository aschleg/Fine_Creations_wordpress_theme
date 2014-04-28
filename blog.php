<?php
/*
Template Name: Blog
*/
?>

<?php get_header(); ?>

<div class="row">
	<div class="col-md-8">

		<?php
			$wp_query = new WP_Query();
			$wp_query->query('category_name='.blog.'&paged='.$paged);
		?>

		<?php
			if( $wp_query->have_posts() ) :
				while( $wp_query->have_posts() ) :
					$wp_query->the_post();
		?>

		<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<p><?php the_excerpt(__ ('(more...)')); ?></p>
		
		<?php endwhile; ?>

		<?php wp_reset_postdata(); ?>

		<?php else: endif; ?>
	
	</div>
	<div class="col-md-4">
		<?php get_sidebar(); ?>
