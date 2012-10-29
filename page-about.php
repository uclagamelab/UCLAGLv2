<?php
/*
Template Name: About Page
*/
?>
<?php get_header(); ?>
		<section id="main_section">
			<section id="about_intro">
				<?php while (have_posts()) : the_post(); ?>
				<?php the_post_thumbnail('inline-large'); ?>
				<article id="intro_text">
				<h3>
				<?php 
					$short_description->the_field('description'); 
					$short_description->the_value();
				?>	
				</h3>
				</article><!-- intro_text -->
				
			</section><!-- #about_intro -->
			<section id="main_description">
				<h3>The UCLA Game Lab Mission ~</h3>
				<?php the_content(); ?>
			</section><!-- main_description -->
			
			
			<?php endwhile; ?>
			
			<section id="about_map">
				<iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=ucla+game+lab&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=78.693042,63.632813&amp;vpsrc=6&amp;ie=UTF8&amp;hq=ucla+game+lab&amp;hnear=&amp;t=m&amp;ll=34.076933,-118.440557&amp;spn=0.006221,0.01929&amp;z=16&amp;output=embed"></iframe>
			</section> <!--end of map-->
			
			
			<section id="contact" class="embed">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('contact') ) : endif; ?>
			</section>

		</section><!-- main_section -->
		

<?php get_footer(); ?>

