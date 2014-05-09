<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11"><!-- ここから head -->
	<title><?php wp_title('&laquo; ', 1, 'right'); ?><?php bloginfo('name'); ?></title>
	
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	
	<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url'); ?>" title="の最新記事" />
	<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url'); ?>" title="の最新コメント" />
	<link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />
	
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
	
	<?php wp_head() ?>
</head><!-- ここまで head -->

<body <?php body_class(); ?> ><!-- ここから bodyです -->

	<div id="wrapper"><!-- ここから div#wrapperです -->
		<div id="header"><!-- ここから div#headerです -->
			<h1 id="blog-title"><a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('name'); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
			<p class="description"><?php bloginfo('description'); ?></p>
		</div><!-- ここまで div#headerです -->