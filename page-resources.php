<?php
/*
Template Name: Resources Page
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
			$count = 1;
			$args = array( 
				'post_type' => 'resource', 
				// 'category_name' => 'events'
			);
			$loop = new WP_Query($args); 
			while ( $loop->have_posts() ) : $loop->the_post(); 	
			?>
				<?php if($count%3==0){ ?>
				<article <?php post_class('featured_article last'); ?> >
				<?php }else{ ?>
				<article  <?php post_class('featured_article'); ?> >
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
								if ( in_category( 'uncategorized' )) { echo("TRUE");}
								
								$short_description->the_field('description'); 
								$short_description->the_value();
							?>
						</p>
					</div>
				</article>
			<?php $count ++;?>
			<?php endwhile; ?>
			</section><!-- feature_spots -->

		</section><!-- main_section -->
		

<?php get_footer(); ?>

