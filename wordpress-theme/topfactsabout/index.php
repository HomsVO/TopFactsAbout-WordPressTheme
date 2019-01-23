<?php
get_header();
?>
    <main class="main container">
        <h1 class="main__title"><span>F</span>acts <span>A</span>bout <span>E</span>verything</h1>
        <p class="main__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent semper leo sit amet felis iaculis, a 
            accumsan neque pharetra. Suspendisse suscipit, justo efficitur mattis euismod, tellus nulla fringilla leo, nec 
            condimentum turpis lorem ac tortor. Nulla scelerisque id justo eget fringilla.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent semper leo sit amet felis iaculis, a 
            accumsan neque pharetra. Suspendisse suscipit, justo efficitur mattis euismod, tellus nulla fringilla leo, nec 
            condimentum turpis lorem ac tortor. Nulla scelerisque id justo eget fringilla.</p>
        <ul class="main__posts">
		<?php
		if ( have_posts() ) :
			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content');
			endwhile;
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>
		</ul>
		<?php wp_pagenavi(); ?>
	</main>
<?php
get_sidebar();
get_footer();
