<?php
/*
Template Name: Main Page
*/
?>
<?php get_header(); ?>

		<section id="main_section">
			<section class="anythingSlider">
				<?php
				$args = array( 
					'post_type' => array('game','resource'), 
					'tag' => 'slider',
					//use tag__not_in to handle posts that are tagged slider and feature
					//slider cat id is 33
					//'tag__not_in' => array(33),
				);
				$loop = new WP_Query($args);
				?>
				<div class="wrapper">
					<ul>
						<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
						<li>
							<a href="<?php the_permalink() ?>">
								<?php the_post_thumbnail('slider');  ?>
							</a>
							<div class="slider_caption">
								<?php the_title( '<h3>', '</h3>' ); ?>
								<p>
									<?php 
										$short_description->the_field('description'); 
										$short_description->the_value();
									?>
								</p>
							</div><!-- slider_caption -->
						</li>
						<?php endwhile; ?>
					</ul>
				</div><!-- wrapper -->
			</section><!-- anythingSlider -->
			<section id="news_feed">
				<article id="news_banner_background"><img src="<?php bloginfo('template_directory'); ?>/images/orange_banner.png" /></article>
				  
				<article id="news_feed_content">
					
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('news') ) : endif; ?> 
				</article>
				 
			</section><!-- news_feed -->
			<section id="feature_spots">
			
			<?php 
				$args = array( 
					'post_type' => array('game','resource'),  
					'tag' => 'current-projects',
					'posts_per_page' => 3,
					//use tag__not_in to handle posts that are tagged slider and feature
					//slider cat id is 33
					//'tag__not_in' => array(33),
				);
				$loop = new WP_Query($args);
				$count = 1;
	 			while ( $loop->have_posts() ) : $loop->the_post(); 
				if($count%3==0){ ?>
				<article class="featured_article last">
				<?php } else { ?>
				<article class="featured_article">
				<?php } ?>
					<a href="<?php the_permalink() ?>">
						<?php the_post_thumbnail('featured');  ?>
					</a>
					<div class="featured_article_text">
						<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
							<?php the_title( '<h3>', '</h3>' ); ?>
						</a>
						<p>

							<?php 
								$short_description->the_field('description'); 
								$short_description->the_value();
							?>
						</p>
					</div>
				</article>
			<?php 
			$count ++;
			endwhile;
			?>
			</section><!-- feature_spots -->
		</section><!-- main_section -->
		

<?php get_footer(); ?>

