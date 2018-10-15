<?php /* WordPress CMS Theme WSC Project. */ get_header(); ?>

<div id="wrap">
	<div id="main">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h2 class="entryTitle"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
			<?php the_content(__('more')); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">Pages', 'after' => '</div>' ) ); ?>
			<div class="postmetadata">
				<span class="date">update: <?php the_time('Y/m/d') ?></span><?php the_tags( __(' tags: ','wsc7'), ', ', ''); ?> | <?php the_category(', ') ?>
			</div>
		</div>

<hr />
<?php endwhile; ?>

<?php if(function_exists('wp_pagenavi')): ?>
<?php wp_pagenavi(); ?>
<?php else : ?>
	<div class="navigation">
		<div class="alignleft"><?php previous_posts_link(__('Previous page')) ?></div>
		<div class="alignright"><?php next_posts_link(__('Next page')) ?></div>
	</div>
<?php endif; ?>
	
<?php else : ?>
<?php endif; ?>
	</div>
	
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>