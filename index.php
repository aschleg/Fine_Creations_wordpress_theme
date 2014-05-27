<?php get_header(); ?>

<div id="introduction">
	<div class="container">
		<div class="row">
			<h1 class="wow bounceIn">Welcome!</h1>
			<h2 class="wow fadeInLeftBig">
				My name is Aaron and I live for seeking the truth in data and creating things that help people be more awesome.
				I'm gold in some trades and silver in others.
				I post projects relating to Excel, Python, web design and more.
			</h2>
			<h2 class="wow fadeInRightBig">
				Check me out on <span><a href="https://twitter.com/Aaron_Schlegel">Twitter</a></span>, <span><a href="https://github.com/aschleg">Github</a></span>
				and <span><a href="https://www.linkedin.com/in/aaronschlegel">Linkedin</a></span>
			</h2>
		</div>
	</div>
</div>

<div id="skillsection">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 skills">
				<h1 class="wow fadeInRightBig" href="#skills">What I Like Doing</h1>

			<?php
				$args = array( 'post_type' => 'skills', 'posts_per_page' => -1 );
				$skills = new WP_Query( $args );
					while( $skills->have_posts() ) : $skills->the_post();

					echo '<div class="col-sm-6 col-md-4 skill wow fadeInUp">';
					echo the_post_thumbnail('skills');
					echo '<div class="skilltext">';
					echo '<p class="skillname">'. get_the_title() .'</p>';
					echo '<p>'. get_the_content() .'</p>';
					echo '</div>';
					echo '</div>';

					endwhile; 
			?>

			</div>
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
			<div class="col-md-12">
			<h1 class="wow fadeInRightBig">Latest Posts</h1>

				<?php
					$wp_query_blog = new WP_Query( array( 'category_name' => 'blog', 'posts_per_page' => 3 ) );
					if( $wp_query_blog->have_posts() ) :
					while( $wp_query_blog->have_posts() ) :
					$wp_query_blog->the_post();
				?>

				<div class="col-xs-12 col-sm-12 col-md-12 wow fadeInLeft">
					<h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
					<p><?php the_excerpt(); ?></p>
				</div>

				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
				<?php else: endif; ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>