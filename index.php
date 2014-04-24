<?php get_header(); ?>

<div class="row">
	<h1>Recent Projects</h1>

		<?php
			$wp_query = new WP_Query( array( 'category_name' => 'portfolio', 'posts_per_page' => 4 ) );
			if( $wp_query->have_posts() ) :
			while( $wp_query->have_posts() ) :
			$wp_query->the_post();
		?>

	<div class="col-xs-8 col-md-3">
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('portfolio'); ?></a>
		<div class="caption">
			<p><?php the_title(); ?></p>
			<p><?php exclude_post_categories('49'); ?></p>
		</div>
	</div>

		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
		<?php else: endif; ?>
</div>

<div class="row">
	<h1>Recent Blog Posts</h1>

		<?php
			$wp_query_blog = new WP_Query( array( 'category_name' => 'blog', 'posts_per_page' => 4 ) );
			if( $wp_query_blog->have_posts() ) :
			while( $wp_query_blog->have_posts() ) :
			$wp_query_blog->the_post();
		?>

	<div class="col-xs-8 col-md-3">
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('portfolio'); ?></a>
		<div class="caption">
			<p><?php the_title(); ?></p>
			<p><?php exclude_post_categories('25'); ?></p>
		</div>
	</div>

		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
		<?php else: endif; ?>

</div>

<?php get_footer(); ?>