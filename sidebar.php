
	<h4>Latest Entries</h4>
	<ul class="nav nav-sidebar">
			
		<?php get_archives('postbypost','10','custom','<li>','</li>'); ?>

	</ul>
	
	<h4>Categories</h4>
	<ul class="nav nav-sidebar">

		<?php
			$args = array(
				'orderby' => 'name',
				'parent' => 0,
				'exclude' => '25'
				);
			$categories = get_categories( $args );
				foreach( $categories as $category ) {
					echo '<li><a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a></li>';
				}
		?>

	</ul>