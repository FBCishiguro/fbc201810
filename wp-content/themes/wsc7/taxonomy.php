<?php /* WordPress CMS Theme WSC Project. */ get_header(); ?>
<?php /* Template Name: タクソノミーアーカイブ*/ ?>
<?php $post = $posts[0]; ?>
<?php $post_type = get_post_type(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!---------------------------------------------header下全体--------------------------------------->
	<section id="content" class="flex btw">
		<!-----------------------------------左メニュー--------------------------------->
		<div id="home_left">
			<nav class="left_menu">
				<h2>誌面区分ごとに過去の記事一覧を見る</h2>
				<ul>
					<?php 
						$args = array(
						'orderby'            => 'ID',
						'order'              => 'ASC',
						'title_li'           => '',
						'exclude'            => '1032,1033, 40,41, 21451,16981,3286, 5522,5537,6592,5523',
						'taxonomy'           => $taxonomy
					    ); ?>
					<?php wp_list_categories( $args ); ?>
					<li><?php	$h = $_SERVER['HTTP_HOST'];
								if (!empty($_SERVER['HTTP_REFERER']) && (strpos($_SERVER['HTTP_REFERER'],$h) !== false)) {
									echo '<a href="' . $_SERVER['HTTP_REFERER'] . '"><< 元のヘッドラインに戻る</a>'; 
								} ?>
					</li>
				</ul>
			</nav>
			<select name="archive-dropdown" onChange='document.location.href=this.options[this.selectedIndex].value;'>
				<option value=""><p>バックナンバーを見る</p></option>
				<?php wp_get_archives( array( 'type' => 'daily', 'format' => 'option', 'after' => '出版号', 'post_type'=> $post_type ) ); ?>
			</select>
		</div>
		<!-----------------------------------メインコンテンツ--------------------------------->
		<div id="home_main">
			<h1><?php echo esc_html(get_post_type_object(get_post_type())->label); ?> <?php single_term_title(); ?> 一覧</h1>
			<!-------------------------------------記事一覧----------------------------------->
			<article class="list_news">

				<?php $pub_date; ?>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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
				<?php endwhile; ?><?php endif; ?>
				</ul>
			</article>
		</div>
		<!------------------------------事業内容メニュー------------------------------>
		<?php get_sidebar(); ?>
	</section>
</div>
<div id="toTop"><a href="#header">▲このページのトップへ</a></div>
<?php get_footer(); ?>




