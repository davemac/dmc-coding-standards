<?php get_header(); ?>

<div class="row">
	<div class="medium-8 columns" id="content" role="main">

	<header>
		<h1 class="archive-title">
			Blog
			<?php if ( is_category() ) : ?>
				<span>articles categorised '<?php single_cat_title(); ?>':</span>
			<?php elseif ( is_author() ) : ?>
				<span>articles by <?php the_author(); ?>:</span>
			<?php elseif ( is_tag() ) : ?>
				<span>archive for tag '<?php single_tag_title(); ?>':</span>
			<?php elseif ( is_archive() ) : ?>
				<span>archive for <?php single_month_title( ' ' ); ?>:</span>
			<?php endif; ?>
		</h1>
	</header>

	<?php if ( have_posts() ) : ?>
	
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', get_post_format() ); ?>
		<?php endwhile; ?>
		
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		
	<?php endif; // end have_posts() check ?>
	
	<?php
	if ( function_exists( 'reverie_pagination' ) ) {
		reverie_pagination();
	} elseif ( is_paged() ) {
	?>
		<nav id="post-nav">
			<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'reverie' ) ); ?></div>
			<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'reverie' ) ); ?></div>
		</nav>
	<?php } ?>

	</div>
	<?php get_sidebar(); ?>
</div>
		
<?php get_footer(); ?>
