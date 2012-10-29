<?php
/*
Template Name: Contact Page
*/
?>
<?php get_header(); ?>
		<section id="main_section">

	
			
			
			<section id="contact">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('contact') ) : endif; ?>
			</section>

		</section><!-- main_section -->
		

<?php get_footer(); ?>

