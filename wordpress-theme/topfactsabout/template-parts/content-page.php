
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="single-page__title"><?php echo get_the_title(); ?></h1>
	</header>

	<?php topfactsabout_post_thumbnail(); ?>
	
	<div class="single-page__content">
		<?php
			the_content();
		?>
	</div>
		</footer>
</article><!-- #post-<?php the_ID(); ?> -->
