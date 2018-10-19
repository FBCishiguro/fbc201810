<?php /* WordPress CMS Theme WSC Project. */ get_header(); ?>
<?php $post = $posts[0]; ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <!---------------------------------------------header下全体--------------------------------------->
    <section id="content" class="container-fluid">
    <div class="row">

    <!-----------------------------------左メニュー--------------------------------->
        <div id="home_left" class="col-md-3">
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
                        <li><a href= "/category">全ての速報をまとめて見る</a></li>
                    </ul>
                </nav>
            </div>

            <!------------------------------メインコンテンツ------------------------------>
        <div id="home_main" class="col-md-6">
            <h1><?php single_cat_title(); ?> 一覧</h1>
            <!-------------------------------------記事一覧----------------------------------->
            <article class="list_news">
                <ul class="list_length shadow curve">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <li>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?><span class="meta"><?php the_time('Y/n/j'); ?></span>
                            </a>
                        </li>
                    <?php endwhile; ?><?php endif; ?>
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
<div id="toTop"><a href="#header">▲このページのトップへ</a></div>
<?php get_footer(); ?>