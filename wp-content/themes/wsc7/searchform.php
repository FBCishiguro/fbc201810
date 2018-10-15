<?php /* WordPress CMS Theme WSC Project. */ ?>

<form role="search" method="get" id="searchform" action="<?php bloginfo('url'); ?>" >
<input type="text" value="" name="s" class="s"  value="<?php the_search_query(); ?>"/>
<input type="submit" class="searchsubmit" value="検索" />
</form>


