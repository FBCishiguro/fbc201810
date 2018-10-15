<?php 
/* WordPress CMS Theme WSC Project. */
/* Template Name: LP */
get_header();
?>

<div id="wrap">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php the_content(__('more')); ?>
		</div>
<?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>