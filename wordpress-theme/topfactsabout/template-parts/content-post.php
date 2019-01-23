<?php
	get_unique_styles('post');
	get_header();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header single-post__header" style="background-image: url(<?php echo get_the_post_thumbnail_url();?>);">
		<h1 class="single-post__title"><?php echo get_the_title();?></h1>
	</header>
	<div class="single-post__content">
		<?php
		the_content();
		?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
