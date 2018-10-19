<?php /* WordPress CMS Theme WSC Project.*/ ?>
<!DOCTYPE html>
<html <?php language_attributes($doctype); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<title><?php bloginfo('name'); wp_title(); ?></title>
<meta name="description" content= <?php bloginfo('description'); ?>>
<meta name="keywords" content="欧州経済, ニューズレター, 市場調査, サンプル入手サービス, ロングリストショートリスト">
<meta name="author" content="I/FBC GmbH" />
<link rel="SHORTCUT ICON" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<?php wp_enqueue_script('jquery'); ?>
<?php if (is_singular() ) wp_enqueue_script('comment-reply'); wp_head(); ?>

<!-- sideFix -->
<script type="text/javascript">
jQuery(function($) { var nav = $('#sideFix'), offset = nav.offset(); 
$(window).scroll(function (){ 
if($(window).scrollTop() > offset.top - 20 ) { nav.addClass('fixed');} else { nav.removeClass('fixed');}
});});
</script>

<!-- Analytics conversion -->
<script>
document.addEventListener( 'wpcf7mailsent', function( event ) {
    ga('send', 'event', 'Contact Form', 'submit');
}, false );
</script>

<body <?php body_class(); ?>>
<!-最新号日付取得->
<?php $args = array('post_type' => 'sc','posts_per_page' => 1); $postlist = get_posts( $args ); ?>
<?php foreach ($postlist as $post) : setup_postdata($post); ?>
    <?php global $midashi_date_sc; $midashi_date_sc = get_the_time('m/d'); ?>
<?php endforeach; ?>

<?php $args = array('post_type' => 'ost','posts_per_page' => 1); $postlist = get_posts( $args ); ?>
<?php foreach ($postlist as $post) : setup_postdata($post); ?>
    <?php global $midashi_date_ost; $midashi_date_ost= get_the_time('m/d'); ?>
<?php endforeach; ?>

<?php $args = array('post_type' => 'eur','posts_per_page' => 1); $postlist = get_posts( $args ); ?>
<?php foreach ($postlist as $post) : setup_postdata($post); ?>
    <?php global $midashi_date_eur; $midashi_date_eur= get_the_time('m/d'); ?>
<?php endforeach; ?>

<?php $args = array('post_type' => 'auto','posts_per_page' => 1); $postlist = get_posts( $args ); ?>
<?php foreach ($postlist as $post) : setup_postdata($post); ?>
    <?php global $midashi_date_auto; $midashi_date_auto= get_the_time('m/d'); ?>
<?php endforeach; ?>

<!-ユーザー情報取得->
<?php global $current_user;
$current_user = wp_get_current_user();
$accounttype0 = $current_user->account_type[0];
$accounttype1 = $current_user->account_type[1];
$accounttype2 = $current_user->account_type[2];
$accounttype3 = $current_user->account_type[3]; ?>
<!-- header -->

<header>
    <!-- ヘッダー上部 -->
    <div class="header_top">
        <div id="site-title">
            <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png"  alt="<?php bloginfo('name'); ?>" /></a>
        </div>
        <div id="header-search"><?php get_search_form(); ?></div>
            <div id="header-loginform">
            <?php if ( is_user_logged_in() ) { ?>
            <?php echo $current_user->user_login . " 様ログイン中"; ?>
            <br><a href="<?php echo wp_logout_url(home_url()); ?>">ログアウトする</a>
            <?php } else { ?>
            <form id="loginform" method="post" action="<?php echo home_url(); ?>/login/">
            <p><label>メールアドレス<input type="text" name="log" id="user_login" class="input imedisabled user_login" value="" tabindex="1" /></label></p>
            <p><label>パスワード<input type="password" name="pwd" id="user_pass" class="input user_pass" value="" tabindex="2" /></label></p>
            <p class="forgetmenot left">
            <label><input name="rememberme" type="checkbox" id="rememberme" value="forever" tabindex="3" checked="checked" /> ログイン情報を記憶</label></p>
            <p class="submit">
            <input type="submit" name="wp-submit" id="wp-submit" class="submit login" value="ログイン &raquo;" tabindex="4" />
            <input type="hidden" name="redirect_to" value="<?php echo  (is_ssl() ? 'https' : 'http') . '://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];?>" />
            <input type="hidden" name="testcookie" value="1" />
            </p>
            </form>
            <?php }; ?>
        </div>
    </div>

    <!-- globalMenu -->
    <nav id="" class="header_bottom">
        <ul>
            <li><a href="<?php echo home_url(); ?>"><b>トップ</b></a></li>
            <!-sc最新号を読む->
            <li class="newest_letters_footers"><a class="nodec" href="<?php echo home_url( '/' ); ?>sc">
                <img src="<?php echo get_template_directory_uri(); ?>/img/topsc.jpg" />
                <p><b>ドイツ経済ニュース</b></br>最新<?php echo $midashi_date_sc; ?>号</p></a>
            </li>

            <!-OST最新号を読む->
            <li class="newest_letters_footers"><a class="nodec" href="<?php echo home_url( '/' ); ?>ost">
                <img src="<?php echo get_template_directory_uri(); ?>/img/topost.jpg" />
                <p><b>東欧経済ニュース</b></br>最新<?php echo $midashi_date_ost; ?>号</p></a>
            </li>

            <!-EUR最新号を読む->
            <li class="newest_letters_footers"><a class="nodec" href="<?php echo home_url( '/' ); ?>eur">
                <img src="<?php echo get_template_directory_uri(); ?>/img/topeur.jpg" />
                <p><b>欧州経済ウオッチャー</b></br>最新<?php echo $midashi_date_eur; ?>号</p></a>
            </li>

            <!-auto最新号を読む->
            <li class="newest_letters_footers"><a class="nodec" href="<?php echo home_url( '/' ); ?>auto">
                <img src="<?php echo get_template_directory_uri(); ?>/img/topauto.jpg" />
                <p><b>自動車産業ニュース</b></br>最新<?php echo $midashi_date_auto; ?>号</p></a>
            </li>
        </ul>
    </nav>

    <!-- スマホ用loginボタン -->
    <a href="#login" class="toggle_mb loginform-toggle left">ログイン</a>
    <!-- スマホ用menuボタン -->
    <a href="#nav" class="toggle_mb nav-toggle right">Menu</a>
    <div class="mb_cf"></div>
</header>
