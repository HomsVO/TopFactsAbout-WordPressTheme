
<article id="post-<?php the_ID(); ?>" class="main__post" style="background-image: url(<?php echo get_the_post_thumbnail_url();?>);">
		<a href="<?php echo get_permalink(); ?>">
			<p class="main__post-about"><?php echo get_the_title()?></p>
		</a>
</article>