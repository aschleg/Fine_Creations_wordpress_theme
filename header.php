<head>

	<meta charset="utf-8">
	<title>
		<?php
			if (function_exists('is_tag') && is_tag()) {
				single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
			elseif (is_archive()) {
				wp_title(''); echo ' Archive - '; }
			elseif (!(is_404()) && (is_single()) || (is_page())) {
				wp_title(''); echo ' - ';
			}
			elseif (is_404()) {
				echo 'Not Found - ';
			}
			if (is_home()) {
				bloginfo('name'); echo ' - '; bloginfo('description');
			}
			else {
				bloginfo('name');
			}
			if ($paged>1) {
				echo ' - page '. $paged;
			}
		?>
	</title>
	<meta name="title" content="<?php
			if (function_exists('is_tag') && is_tag()) {
				single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
			elseif (is_archive()) {
				wp_title(''); echo ' Archive - '; }
			elseif (!(is_404()) && (is_single()) || (is_page())) {
				wp_title(''); echo ' - ';
			}
			elseif (is_404()) {
				echo 'Not Found - ';
			}
			if (is_home()) {
				bloginfo('name'); echo ' - '; bloginfo('description');
			}
			else {
				bloginfo('name');
			}
			if ($paged>1) {
				echo ' - page '. $paged;
			}
		?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<link href="#" rel="shortcut icon">
	<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" media="all">

	<?php wp_head(); ?>

</head>
	<header class="header <?php if (is_page()) { echo "page-header"; }?>" role="banner">

		<div class="navbar navbar-default" role="navigation">
		  	<div class="container">
			  	<div class="navbar-header">
				  	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					  	<span class="sr-only">Toggle Navigation</span>
					  	<span class="icon-bar"></span>
					  	<span class="icon-bar"></span>
					  	<span class="icon-bar"></span>
				  	</button>
				  	<?php global $fc_options;
						$fc_settings = get_option( 'fc_options', $fc_options );
					?>

					<?php if( $fc_settings['logo_url'] != '' ) : ?>
						<a href="<?php echo get_option('home'); ?>/" class="navbar-brand">
							<img src="<?php echo $fc_settings['logo_url']; ?>" alt="<?php bloginfo('name'); ?>">
					<?php endif; ?>

					</a>
			  	</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li><?php wp_list_pages(array('title_li' => '')); ?></li>
				  		<ul class="dropdown-menu">
							<li><?php wp_list_pages(array('title_li' => '')); ?></li>
				  		</ul>
				  	</li>
				  	</ul>
			 	</div>
			</div>
		</div>
	</header>
	<body>
		<div class="container-fluid">

