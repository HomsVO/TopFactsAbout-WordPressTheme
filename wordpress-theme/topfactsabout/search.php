<?php
	get_header();
?>
		<main class="main container">
		<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<h1 class="page-title">
					<?php
					printf( esc_html__( 'Search Results for: %s', 'topfactsabout' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header>
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', 'search' );
			endwhile;
			the_posts_navigation();
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>
		</main>
<?php
get_sidebar();
get_footer();
