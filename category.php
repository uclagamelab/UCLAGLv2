<?php
/*
Template Name: Category
*/
?>
<?php get_header(); ?>
		<section id="main_section">
			<section id="games_intro" class="grey_plate">

<?php 

echo get_category_parents($cat, TRUE, ' &raquo; ') . "<br/>";
$parent_cats =  get_category_parents( get_query_var('cat') , false , ' ' );  
if (is_category()){ 
  $this_category = get_category($cat);
  if (get_category_children($this_category->cat_ID) != "") {
    echo "<ul>";
    wp_list_categories('orderby=id&show_count=0&title_li=&use_desc_for_title=1&child_of='.$this_category->cat_ID);
    echo "</ul>";
  }
} 

?>
			</section><!-- #games_intro -->
			<section id="feature_spots">
      <?php 
         $count = 1;
         $loop = new WP_Query(array(
           'post_type'=> array('resource','game','person'),
           'category_name'=>single_cat_title('', false)
         )); 
         if ($loop->have_posts()) : while ( $loop->have_posts() ) : $loop->the_post();
         if($count%3==0){ 
      ?>
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
								$short_description->the_field('description'); 
								$short_description->the_value();
							?>
						</p>
					</div>
				</article>
			<?php $count ++;?>
			<?php endwhile; else: ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
      <?php endif; ?>
			</section><!-- feature_spots -->
		</section><!-- main_section -->
		

<?php get_footer(); ?>


