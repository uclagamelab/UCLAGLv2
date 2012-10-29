

<section id="background_bottom">
	<!-- <img src="<?php bloginfo('template_directory'); ?>/images/background_bottom.gif" /> -->
</section>

		<footer>
			<section id="random_project_feed">
				<header><section id="header_contents"><img src="<?php bloginfo('template_directory'); ?>/images/project_feed_icon.png" /><span><em>RANDOM PROJECT FEED~</em> Lots of AWESOME projects here for you to check out! Click on some of these or visit our Games+ page to see more.</span><img src="<?php bloginfo('template_directory'); ?>/images/project_feed_icon.png" /></section></header>
				<article id="random_project_grid">
					<?php
						$i = 1;
						$args = array(
							'post_type' => 'game',
							'posts_per_page' => 10,
							'orderby' => rand,
							);
						$loop = new WP_Query($args);
						while ( $loop->have_posts() ) : $loop->the_post();
					?>
						<?php if($i%5==0){ ?>
							<a class="last" href="<?php the_permalink() ?>">
						<?php }else{ ?>
							<a href="<?php the_permalink() ?>">
						<?php }?>
							<?php the_post_thumbnail('inline-thumbnail');  ?>
						</a>
							
					<?php
						$i++;
						endwhile;
					?>
					
					
					
					
		
					
				</article><!-- random project grid -->
				<hr/>
				<article id="sponsors"></article>
				
			</section><!-- random_project_feed -->
			<section id="bottom_footer">
				<section id="nav_copyright">
					<article id="bottom_nav">
						<?php wp_nav_menu(array('theme_location' => 'footer-nav','container'=>'false', 'link_before'=>'<span class="separator">|</span>')); ?>
					</article>
					<article id="copyright">
						The UCLA Game Lab is a research center at the University of Los Angeles California. It is supported by the School of the Arts and Architecture and the School of Theater, Film and Television.
					</article>
				</section>
				<article id="sponsors">
					<img id="arts_logo" src="<?php bloginfo('template_directory'); ?>/images/arts_logo.gif" />
					<img id="tft_logo" src="<?php bloginfo('template_directory'); ?>/images/tft_logo.jpg" />
				</article>
				<article id="designed_by">
					This website was designed and developed by the UCLA Game Lab with help from <br/> <a href="http://www.averynicedesignstudio.org/">a verynice design studio</a>.
				</article>
				
			</section>
			<article id="random_project_grid_bottom"></article>
		</footer>
		<?php wp_footer(); ?>
		<div id="coming_soon"></div>
	</body>
</html>
