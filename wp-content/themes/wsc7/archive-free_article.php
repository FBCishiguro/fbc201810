<?php /* WordPress CMS Theme WSC Project. */ get_header(); ?>
<?php /* Template Name: 無料記事一覧*/ ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<?php $args = array(
		'post_type' => array('sc','ost','eur','auto'),
		'posts_per_page'	=> 100,
		'orderby'			=> 'date',
		'tax_query'			=> array(
			array(
				'taxonomy'	=> 'free_article',
				'field'		=> 'slug',
				'terms'		=> array ('sc-free', 'ost-free', 'eur-free', 'auto-free')
			)
		)
	);
	$postlist = get_posts( $args); ?>

	<!---------------------------------------------header下全体--------------------------------------->
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <section id="content" class="container-fluid">
	<div class="row">

	<!-----------------------------------左メニュー--------------------------------->
        <div id="home_left" class="col-md-3">
				<nav class="left_menu">
					<h2>経済誌ごとに無料記事を読む</h2>
					<ul>
						<?php 
							$args = array(
							'orderby'		=> 'ID',
							'order'  		=> 'ASC',
							'title_li'		=> '',
							'exclude'		=> '3065',
							'taxonomy'		=> 'free_article'
						    ); ?>
						<?php wp_list_categories( $args ); ?>
					</ul>
				</nav>
			</div>
			<!------------------------------メインコンテンツ------------------------------>
			<div id="home_main" class="col-md-6">
				<h1>無料記事 一覧</h1>
				<article class="list_news">
					<ul class="list_length shadow curve">
						<?php foreach ($postlist as $post) : setup_postdata($post); ?>
							<li>
								<a href="<?php the_permalink(); ?>">
								<?php the_title(); ?><span class="meta"><?php the_time('Y/n/j'); ?></span>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</article>
			</div>
        <!------------------------------グローバルサイドメニュー------------------------------>
        <div id="home_right" class="col-md-3">
            <nav class="shadow"><?php wp_nav_menu(array('container_id' => 'global_side_menu', 'theme_location' => 'globalMenu', 'depth' => 2)); ?></nav>
        </div>
    </div>
    </section>
	</div>
<?php endwhile; ?><?php endif; ?>
<div id="toTop"><a href="#header">▲このページのトップへ</a></div>
<?php get_footer(); ?>


