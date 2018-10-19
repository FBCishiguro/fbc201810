<?php /* WordPress CMS Theme WSC Project. */ get_header(); ?>
<?php /* Template Name: 欧州経済ウオッチャーヘッドライン*/ ?>

<!--タクソノミーセット-->
<?php $taxonomies	= 'eur_sorte'; ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!---------------------------------------------header下全体-------<?php /* WordPress CMS Theme WSC Project. */ get_header(); ?>
<?php /* Template Name: 欧州経済ウオッチャーヘッドライン*/ ?>

<!--タクソノミーセット-->
<?php $taxonomies    = 'eur_sorte'; ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <!---------------------------------------------header下全体--------------------------------------->
    <section id="content" class="container-fluid">
    <div class="row">

    <!-----------------------------------左メニュー--------------------------------->
        <div id="home_left" class="col-md-3">
            <nav class="left_menu">
                <h2>誌面区分ごとに過去の記事一覧を見る</h2>
                <ul>
                    <?php 
                        $args = array(
                        'orderby'            => 'ID',
                        'order'              => 'ASC',
                        'title_li'           => '',
                        'exclude'            => '5522,5537,6592,5523',
                        'taxonomy'           => $taxonomies
                        ); ?>
                    <?php wp_list_categories( $args ); ?>
                </ul>
            </nav>

            <select name="archive-dropdown" onChange='document.location.href=this.options[this.selectedIndex].value;'>
                <option value=""><p>バックナンバーを見る</p></option>
                <?php wp_get_archives( array( 'type' => 'daily', 'format' => 'option', 'post_type'=>'eur')); ?>
            </select>
        </div>
        <!------------------------------メインコンテンツ------------------------------>
        <div id="home_main" class="col-md-6">
            <?php $post = $posts[0]; ?>
            <h1><?php post_type_archive_title(); ?>  <?php the_time(__('Y.n.j', 'wsc7')); ?>号ヘッドライン</h1>

            <?php $args = array('orderby' => 'id'); ?>
            <?php $terms = get_terms($taxonomies, $args); ?>

            <?php foreach ($terms as $term) {  ?>
                <?php $name = null; ?>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php if( has_term($term->name, $taxonomies)): ?>
                        <?php $path = get_term_link($term->slug, $taxonomies); $name = $term->name; ?>
                    <?php endif; ?>
                <?php endwhile; ?><?php endif; ?>

                <?php if (isset($name)) { ?>
                    <h2><?php echo $name; ?></h2>
                    <div class="list_news">
                        <ul class="shadow curve list_length">
                            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <?php if (has_term($name, $taxonomies)): ?>
                                     <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                <?php endif; ?>
                            <?php endwhile; ?><?php endif; ?>
                        </ul>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
        <!------------------------------グローバルサイドメニュー------------------------------>
        <div id="home_right" class="col-md-3">
            <nav class="shadow"><?php wp_nav_menu(array('container_id' => 'global_side_menu', 'theme_location' => 'globalMenu', 'depth' => 2)); ?></nav>
        </div>
    </div>
    </section>
</div>
<div id="toTop"><a href="#header">▲このページのトップへ</a></div>
<?php get_footer(); ?>

-------------------------------->
    <section id="content" class="container-fluid">
	<div class="row">

	<!-----------------------------------左メニュー--------------------------------->
        <div id="home_left" class="col-md-3">
			<nav class="left_menu">
				<h2>誌面区分ごとに過去の記事一覧を見る</h2>
				<ul>
					<?php 
						$args = array(
						'orderby'            => 'ID',
						'order'              => 'ASC',
						'title_li'           => '',
						'exclude'            => '5522,5537,6592,5523',
						'taxonomy'           => $taxonomies
					    ); ?>
					<?php wp_list_categories( $args ); ?>
				</ul>
			</nav>

			<select name="archive-dropdown" onChange='document.location.href=this.options[this.selectedIndex].value;'>
				<option value=""><p>バックナンバーを見る</p></option>
				<?php wp_get_archives( array( 'type' => 'daily', 'format' => 'option', 'post_type'=>'eur')); ?>
			</select>
		</div>
		<!------------------------------メインコンテンツ------------------------------>
        <div id="home_main" class="col-md-6">
			<?php $post = $posts[0]; ?>
			<h1><?php post_type_archive_title(); ?>  <?php the_time(__('Y.n.j', 'wsc7')); ?>号ヘッドライン</h1>

			<?php $args = array('orderby' => 'id'); ?>
			<?php $terms = get_terms($taxonomies, $args); ?>

			<?php foreach ($terms as $term) {  ?>
				<?php $name = null; ?>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php if( has_term($term->name, $taxonomies)): ?>
						<?php $path = get_term_link($term->slug, $taxonomies); $name = $term->name; ?>
					<?php endif; ?>
				<?php endwhile; ?><?php endif; ?>

				<?php if (isset($name)) { ?>
					<h2><?php echo $name; ?></h2>
					<div class="list_news">
						<ul class="shadow curve list_length">
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
								<?php if (has_term($name, $taxonomies)): ?>
		 							<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
								<?php endif; ?>
							<?php endwhile; ?><?php endif; ?>
						</ul>
					</div>
				<?php } ?>
			<?php } ?>
		</div>
        <!------------------------------グローバルサイドメニュー------------------------------>
        <div id="home_right" class="col-md-3">
            <nav class="shadow"><?php wp_nav_menu(array('container_id' => 'global_side_menu', 'theme_location' => 'globalMenu', 'depth' => 2)); ?></nav>
        </div>
    </div>
    </section>
</div>
<div id="toTop"><a href="#header">▲このページのトップへ</a></div>
<?php get_footer(); ?>

