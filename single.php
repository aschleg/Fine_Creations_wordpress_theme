<?php get_header(); the_post(); ?>

<div class="container">
	<div class="row">
		
		<div class="article col-md-8 col-md-offset-2">

			<h3><?php the_title(); ?></h3>
			<?php the_content(); ?>

		</div>
	</div>
</div>

<div class="comments">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<?php comments_template(); ?>
			</div>
		</div>
	</div>
</div>


<?php get_footer(); ?>