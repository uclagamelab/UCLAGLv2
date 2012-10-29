<?php
/*
Template Name: Games Page
*/
?>
<?php get_header(); ?>
		<section id="main_section">
			<section id="games_intro" class="grey_plate">
				<?php while (have_posts()) : the_post(); ?>
				<?php the_content(); ?>
				<?php endwhile; ?>
			</section><!-- #games_intro -->
			<section id="feature_spots">
			
			<?php 
				$args = array( 
					'post_type' => 'game', 
//					'tag' => 'current-projects',
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
			endwhile; ?>
			</section><!-- feature_spots -->

		</section><!-- main_section -->
		

<?php get_footer(); ?>

