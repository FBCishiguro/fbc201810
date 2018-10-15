<?php /* WordPress CMS Theme WSC Project. */ get_header(); ?>
<?php /* Template Name: コラム一覧*/ ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php $args = array(
	'post_type' => array('sc','ost','auto'),
	'tax_query' => array(
			'relation' => 'OR',
				array(
				'taxonomy'	=> 'sc_sorte',
				'field'		=> 'slug',
				'terms'		=> array('mame', 'keiri')
			),
			array(
				'taxonomy'	=> 'ost_sorte',
				'field'		=> 'slug',
				'terms'		=> array('cafe', 'startup')
			),
			array(
				'taxonomy'	=> 'auto_sorte',
				'field'		=> 'slug',
				'terms'		=> 'closeup'
			)
	),
	'orderby'				=> 'post_date',
	'order'					=> 'DESC',
	'posts_per_page'		=> 100
); 
$postlist = get_posts( $args ); ?>

	<!---------------------------------------------header下全体--------------------------------------->
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<section id="content" class="flex btw">
			<!----------------------------------左メニュー------------------------------->
			<div id="home_left">
				<nav class="left_menu">
					<h2>経済誌ごとにコラムを読む</h2>
					<ul class="terms">
						<p>ドイツ経済ニュース</p>
						<?php wp_list_categories('include=1036,1126&taxonomy=sc_sorte&title_li='); ?>
					</ul>
					<ul>
						<p>東欧経済ニュース</p>
						<?php wp_list_categories('include=42,22541&taxonomy=ost_sorte&title_li='); ?>
					</ul>
					<ul>
						<p>自動車産業ニュース</p>
						<?php wp_list_categories('include=3285&taxonomy=auto_sorte&title_li='); ?>
					</ul>
				</nav>
			</div>
			<!------------------------------メインコンテンツ------------------------------>
			<div id="home_main">
				<h1>コラム 一覧</h1>
				<article id="read_column">
						<?php foreach ($postlist as $post) : setup_postdata($post); ?>
						<?php $kijitype = esc_html(get_post_type_object(get_post_type())->name); ?>
					<ul class="list_length shadow curve">
						<li>
							<img class="right" src="
							<?php if( $kijitype == 'sc' ): ?>
										<?php echo get_template_directory_uri(); ?>/img/topsc_cc.jpg" />
									<?php elseif( $kijitype == 'ost' ): ?>
										<?php echo get_template_directory_uri(); ?>/img/topost.jpg" />
									<?php elseif( $kijitype == 'auto' ): ?>
										<?php echo get_template_directory_uri(); ?>/img/topauto.jpg" />
									<?php endif; ?>
							<a href="<?php the_permalink(); ?>">
								<h3><?php the_title(); ?></h3>
								<?php $terms = get_the_terms($post->ID,array('sc_sorte', 'ost_sorte', 'auto_sorte')); ?>
								<p class="meta"><?php the_time('Y/n/j'); ?><br>
								<?php echo get_post_type_object(get_post_type())->label; ?> | <?php foreach( $terms as $term ) { echo $term->name; }?></p>
							</a>
						</li>
					</ul>
						<?php endforeach; ?>
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

