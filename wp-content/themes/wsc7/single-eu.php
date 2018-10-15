<?php /* WordPress CMS Theme WSC Project. */ get_header(); ?>

<!--タクソノミー変数セット-->
<?php $taxonomies = 'eu_sorte'; ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<!---------------------------------------------header下全体--------------------------------------->
		<section id="content" class="flex btw">
			<!------------------------------メインコンテンツ------------------------------>
			<div id="page_main">
				<section id="kiji_sum" class="shadow curve">
					<div class="kiji_header">
						<!-パンくずリスト記述->
						<div class="breadcrumbs kiji_wo">
							<?php if ( function_exists( 'bcn_display' ) ) {bcn_display();} ?>
						</div>
						<!-タイトル記述->
						<h1><?php echo the_title(); ?></h1>
						<!-メタ情報記述->
						<?php $gou = get_post_meta($post->ID,"gou",true); ?>
						<p class="data"><?php the_time(__('Y.n.j', 'wsc7')); ?>発行 No.<?php echo $gou; ?>号</p>
						<!-メタ情報記述->
						<div class="meta">
							<?php the_taxonomies('before=<ul>&after=</ul>&sep=<li></li>'); ?>
						</div>
					</div>
					<!-記事本文記述->
					<div class="kiji_text">
						<?php the_content(__('more')); ?>
					</div>
				</section>
				<div id="toTop"><a href="#header">▲このページのトップへ</a></div>
			</div>

			<!------------------------------グローバルサイドメニュー------------------------------>
			<?php get_sidebar(); ?>
		</section>
	</div>
<?php endwhile; ?><?php endif; ?>
<div id="toTop"><a href="#header">▲このページのトップへ</a></div>
<?php get_footer(); ?>
