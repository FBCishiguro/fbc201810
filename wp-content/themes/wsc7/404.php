<?php /* WordPress CMS Theme WSC Project. */ get_header(); ?>
	<!---------------------------------------------header下全体--------------------------------------->
	<section id="content" class="flex btw">
		<!------------------------------メインコンテンツ------------------------------>
		<div id="page_main">
			<div id="404">
				<h1 class="pageTitle"><?php _e( 'Page not found' ); ?></h1>
				<p><?php _e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'wsc7' ); ?></p>
				<?php get_search_form(); ?>
			</div>
		</div>
		<!------------------------------グローバルサイドメニュー------------------------------>
		<?php get_sidebar(); ?>
	</section>
<?php get_footer(); ?>
