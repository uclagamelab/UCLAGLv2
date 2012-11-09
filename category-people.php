<?php
/*
Template Name: People Page
*/
?>
<?php get_header(); ?>
		<section id="main_section">
			<section id="about_intro">
      <img src="<?php bloginfo('template_directory'); ?>/images/game-lab.jpg" />
				<article id="intro_text">
				<h3>
THE GAME LAB BRINGS STUDENTS FROM A VARIETY OF BACKGROUNDS TOGETHER TO CREATE, PLAY, AND DISCUSS GAMES.
				</h3>
				</article><!-- intro_text -->
				
			</section><!-- #about_intro -->
			<section id="main_description">
      <p><?php echo category_description( $category_id ); ?></p>
<?php echo get_category_parents($cat, TRUE, ' &raquo; '); ?><br />
<?php $parent_cats =  get_category_parents( get_query_var('cat') , false , ' ' ); ?>
<?php 
  if (is_category()){
    $this_category = get_category($cat);
      if (get_term_children($this_category->cat_ID, 'category') != "") {
            $args = array(
              'show_option_none' => __(''),
              'orderby' => 'id',
              'show_count' => 0,
              'title_li' => __(''),
              'use_desc_for_title' => 1,
              'child_of' => $this_category->cat_ID
            );
            echo "<ul>";
            wp_list_categories($args);
            echo "</ul>";
      }     
} ?>  
			</section><!-- main_description -->
			
			
			
			<section id="bio_banner">

					
				<article id="bio_banner_background"><img src="<?php bloginfo('template_directory'); ?>/images/yellow_banner.png" /></article>
				<article id="bio_banner_title">
					<p><span>~
            <?php 
            
            $current_cat = single_cat_title("",false);
            if($current_cat == "People"){ ?>
            ALL TIME GAME LAB TEAM 
            <?php } else if($current_cat == "Alumni"){ ?>
            PAST GAME LAB TEAM
            <?php } else if($current_cat == "Current"){ ?>
            CURRENT GAME LAB TEAM
            <?php } ?>
					~</span></p>
				</article>
			</section><!-- news_feed -->
			
			<section id="bio_spots">
			
			<?php 
				$args = array( 
					'post_type' => 'person',
          'order' => 'ASC',
          'category_name'=>single_cat_title('', false)
				);
				$loop = new WP_Query($args);
				$count = 1;
	 			while ( $loop->have_posts() ) : $loop->the_post(); 
	 			

				?>
				<article <?php post_class('bio_article'); ?>>
          <?php the_post_thumbnail('featured');  ?>
					<div class="bio_article_text">


							<?php the_title( '<h3>', '</h3>' ); ?>
						<p>

							<?php 
								$short_description->the_field('description'); 
								$short_description->the_value();
							?>
						</p>
					</div><!-- bio_article_text -->
					<div class="badges">
						<?php 
						$lab_employee->the_field('job_title'); $my_meta = $lab_employee->the_meta(); if($my_meta['job_title'] != ""){ 
						?>
							<div class="bio_badge blue">
								<p>Game Lab <?php echo $my_meta['job_title']; ?></p>
							</div><!-- lab_title -->
						<?php } ?>
						
						
		
						
						<div class="bio_badge yellow">
							<p>
							<?php
								$person_department->the_field('person_department');
								$person_department->the_value();
							?> 
							<?php
								$person_title->the_field('person_title');
								$person_title->the_value();
							?> 
	
							</p>
						</div><!-- bio_title -->
						
	
								
							<?php	
								$i=1;
								$my_meta = $link_out->the_meta();
								foreach($my_meta['out_links'] as $link)
								{
									
									if($i%2==0){
										?>
									<div class="bio_badge yellow">
									<?php }else{ ?>
									<div class="bio_badge blue">	
									<?php } ?>
										<a href="<?php echo $link['link']; ?>" ><p><?php echo $link['title']; ?></p></a>
									</div><!-- bio_links -->
							<?php
							 		$i++;
								} 
							?>
						</div><!--badges-->

					
				</article><!-- bio_article -->
			<?php 
			$count ++;
			endwhile; ?>				
			</section><!-- bio_spots -->
			

		</section><!-- main_section -->
		

<?php get_footer(); ?>

