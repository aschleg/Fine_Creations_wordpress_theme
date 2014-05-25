<?php get_header(); ?>

<div id="introduction">
		<div class="row">
			<div class="col-md-12 skills">

			<?php
				$args = array( 'post_type' => 'skills', 'posts_per_page' => -1 );
				$skills = new WP_Query( $args );
					while( $skills->have_posts() ) : $skills->the_post();

					echo '<div class="col-sm-6 col-md-4 skill">';
					echo the_post_thumbnail('skills');
					echo '<div class="skilltext">';
					echo '<p>'. get_the_title() .'</p>';
					echo '<p>'. get_the_content() .'</p>';
					echo '</div>';
					echo '</div>';

					endwhile; 
			?>

			</div>
		</div>
</div>	
<div id="recent-projects">
	<div class="container">
		<div class="row">
			<h1 class="wow fadeInRightBig">Recent Projects</h1>

			<ul id="projects">

				<?php
					
					$args = array( 'post_type' => 'portfolio', 'posts_per_page' => 4 );
					$wp_query_portfolio = new WP_Query( $args );
						while( $wp_query_portfolio->have_posts() ) : $wp_query_portfolio->the_post();

					$terms = get_the_terms( $post->ID, 'portfolio-categories' );
						if( $terms && ! is_wp_error( $terms ) ) :
							$links = array();
							foreach ( $terms as $term ) {
								$links[] = $term->name;
							}

							$tax_links = join( " ", str_replace(' ', '-', $links));
							$tax = strtolower($tax_links);
						else :
							$tax = '';
						endif;

						echo '<li class="project col-xs-12 col-sm-6 col-md-3 wow fadeInUp">';
						echo '<a class="wrap-overlay" href="'. get_permalink() .'">';
						echo the_post_thumbnail('portfolio');
						echo '<div class="overlay">';
						echo '</div>';
						echo '</a>';
						echo '<a class="project-name" href="'. get_permalink() .'">';
						echo '<p>'. get_the_title() .'</p>'; 
						echo '<p>'. ucfirst($tax) .'</p>';
						echo '</a>';
						echo '</li>';

				endwhile; ?>
				
			</ul>
		</div>
	</div>
</div>

<div id="front-recent-posts">
	<div class="container">
		<div class="row posts">

				<?php
					$wp_query_blog = new WP_Query( array( 'category_name' => 'blog', 'posts_per_page' => 3 ) );
					if( $wp_query_blog->have_posts() ) :
					while( $wp_query_blog->have_posts() ) :
					$wp_query_blog->the_post();
				?>

				<div class="col-xs-12 col-sm-12 col-md-12 wow fadeInUp">
					<h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
					<p><?php the_excerpt(); ?></p>
				</div>


			<!--<li class="project col-xs-12 col-sm-6 col-md-4 wow fadeInRightBig">
				<a href="<?php the_permalink(); ?>" class="wrap-overlay"><?php the_post_thumbnail('front-blog-thumb'); ?>
					<div class="overlay"></div>
				</a>
				<a class="blog-excerpt" href="<?php the_permalink(); ?>">
					<p><?php the_title(); ?></p>
					<small><?php the_excerpt(); ?></small>
				</a>
			</li>-->

				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
				<?php else: endif; ?>

		</div>
	</div>
</div>

<?php get_footer(); ?>