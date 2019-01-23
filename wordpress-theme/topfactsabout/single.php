<?php
	get_header();	
?>
	<main class="main container">
	<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'post' );
		endwhile;
	?>
		</main>
<?php
	get_sidebar();
	get_footer();
