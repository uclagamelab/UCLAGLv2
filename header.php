<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>

		<!-- "UCLAGL": Game Lab Site -->
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>">
		<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen">
		<link rel="alternate" type="text/xml" title="<?php bloginfo('name'); ?> RSS 0.92 Feed" href="<?php bloginfo('rss_url'); ?>">
		<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>">
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS 2.0 Feed" href="<?php bloginfo('rss2_url'); ?>">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<link rel="icon" type="image/ico" href="<?php bloginfo('template_directory'); ?>/favicon.ico">
		


		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/javascript/jquery.easing.1.2.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/javascript/jquery.marquee.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/javascript/jquery.anythingslider.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/javascript/UCLAGL.js"></script>
		
		<?php wp_head(); ?>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-18966343-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

	</head>
	<body <?php body_class(); ?>>
		<header>
			
			<a href="<?php bloginfo('url'); ?>/">
				
				<section id="logo">
					<img src="<?php bloginfo('template_directory'); ?>/images/logo.png" />
				</section>
				<!-- <span><?php bloginfo('name'); ?></span> -->
			</a>


			<nav id="header_nav">
				<?php wp_nav_menu(array('theme_location' => 'main-nav','container'=>'false','container_class' => 'main-nav','link_before'=>'<div class="link_text">', 'link_after' => '</div><div class="background"></div>')); ?>
			</nav>
			<section id="social_box">
				<div id="subscribe_bar"></div><!-- subscribe_bar -->
				<a href="http://www.facebook.com/pages/UCLA-Game-Lab/150951808280719" title="Friend us on Facebook"><div id="subscribe_fb" class="subscribe"><span>Friend us on Facebook</span></div></a><!-- subscribe_fb -->
				<a href="http://twitter.com/uclagames" title="Follow us on Twitter"><div id="subscribe_tw" class="subscribe"><span>Follow us on Twitter</span></div></a><!-- subscribe_tw -->
				<a href="http://eepurl.com/cG3WU" title="Subscribe to our mailing list"><div id="subscribe_em" class="subscribe"><span>Subscribe to our mailing list</span></div></a><!-- subscribe_em -->
				<a href="http://feeds.feedburner.com/uclagamelab" title="Subscribe to our blog"><div id="subscribe_bl" class="subscribe last"><span>Subscribe to our blog</span></div></a><!-- subscribe_em -->
			</section><!-- social_box -->
		</header>
		


