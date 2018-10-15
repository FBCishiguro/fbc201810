<?php /* WordPress CMS Theme WSC Project. */ get_header(); ?>
<?php /* Template Name: 速報一覧*/ ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php $args = array(
		'orderby'			=> 'post_date',
		'order'				=> 'DESC',
		'post_type'			=> 'post',
		'post_status'		=> 'publish', 
		'posts_per_page'	=> '100'
	);
	$postlist = get_posts( $args ); ?>
	<?php $h1='速報' ?>

	<!---------------------------------------------header下全体--------------------------------------->
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<section id="content" class="flex btw">
			<!----------------------------------左メニュー------------------------------->
			<div id="home_left">
				<nav class="left_menu">
					<h2>経済誌ごとに速報を読む</h2>
					<ul>
						<?php 
							$args = array(
							'orderby'            => 'ID',
							'order'              => 'ASC',
							'title_li'           => '',
							'exclude'            => '1'
						    ); ?>
						<?php wp_list_categories( $args ); ?>
					</ul>
				</nav>
			</div>
			<!------------------------------メインコンテンツ------------------------------>
			<div id="home_main">
				<h1><?php echo $h1; ?> 一覧</h1>
				<article class="list_news">
					<?php $pub_date; ?>
					<?php foreach ($postlist as $post) : setup_postdata($post); ?>
						<?php $my_date = the_date('', '<h2>', '</h2>', FALSE); ?>
						<?php if ($my_date == $pubdate): ?>
							<li>
								<a href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
									<div class="meta"></div>
								</a>
							</li>
						<?php else: ?>
							<?php if ($my_date !== null) { ?> </ul> <?php } ?> 
							<ul class="list_length shadow curve">
								<?php echo $my_date; ?>
								<li>
									<a href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
									</a>
								</li>
						<?php endif; ?>
						<?php $pub_date = $my_date; ?>
					<?php endforeach; ?>
					</ul>
				</article>
			</div>
			<!------------------------------事業内容メニュー------------------------------>
			<div id="home_right">
				<nav class="shadow"><?php wp_nav_menu( array( 'container_id' => 'global_side_menu', 'theme_location' => 'globalMenu', 'depth' => 2 ) ); ?></nav>
			</div>
		</section>
	</div>
<?php endwhile; ?><?php endif; ?>
<div id="toTop"><a href="#header">▲このページのトップへ</a></div>
<?php get_footer(); ?>

