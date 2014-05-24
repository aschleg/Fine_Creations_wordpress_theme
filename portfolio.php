<?php
/*
Template Name: Portfolio
*/
?>

<?php get_header(); ?>

<div id="recent-projects">
<div class="container">
	<h1 id="faderight">Portfolio</h1>

	<div id="portfolio-filter" class="row">
		<ul class="filter">
			<?php
				$terms = get_terms('portfolio-categories');
				$count = count($terms);
					echo '<li><a class="active" href="#" data-filter="*">All</a></li>';
				if ( $count > 0 ) {
					foreach ( $terms as $term ) {
						$termname = strtolower($term->name);
						$termname = str_replace(' ', '-', $termname);
						echo '<li><a href="#" data-filter=".'.$termname.'">'.$term->name.'</a><li>';
					}
				}
			?>
		</ul>
	</div>
</div>
<div class="row">
	<div class="container">
		<div class="isotope">
			<ul id="projects">

				<?php
					$args = array( 'post_type' => 'portfolio', 'posts_per_page' => -1 );
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

						echo '<li class="project col-xs-12 col-sm-3 col-md-3 all '. $tax .'">';
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
</div>

<?php get_footer(); ?>

