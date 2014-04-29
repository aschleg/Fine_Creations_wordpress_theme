<?php
/*
Template Name: Portfolio
*/
?>

<section class="port">
<?php get_header(); ?>

<div class="row">

	<ul class="js-isotope" data-isotope-options='{ "itemSelector": ".project" }'>

	</ul>

	<ul id="projects">

		<?php
			$wp_query_portfolio = new WP_Query();
			$wp_query_portfolio->query('category_name='.portfolio.'&paged='.$paged);
		?>

		<?php
			if( $wp_query_portfolio->have_posts() ) :
			while( $wp_query_portfolio->have_posts() ) :
			$wp_query_portfolio->the_post();
		?>

		<li class="project col-xs-4 col-md-3">
			<a class="wrap-overlay" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('portfolio'); ?>
				<div class="overlay"></div>
			</a>
			<a class="project-name" href="<?php the_permalink(); ?>">
				<p><?php the_title(); ?></p>
				<p><?php exclude_post_categories('49'); ?></p>
			</a>
		</li>

		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
		<?php else: endif; ?>

	</ul>

</div>
</section>
<?php get_footer(); ?>
