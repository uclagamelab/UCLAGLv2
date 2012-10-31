<?php
/*
Template Name: Category
*/
?>
<?php get_header(); ?>
		<section id="main_section">
			<section id="games_intro" class="grey_plate">
Some text
			</section><!-- #games_intro -->
			<section id="feature_spots">
		<h1>This is outside the loop</h1>	
      <?php 
         $cats = new WP_Query(array('post_type'=>'any','category_name'=>single_cat_title('', false))); 
         if ($cats->have_posts()){
           _e('made it.'); 
         }
      ?>
			</section><!-- feature_spots -->
		</section><!-- main_section -->
		

<?php get_footer(); ?>

