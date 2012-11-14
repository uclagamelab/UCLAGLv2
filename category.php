<?php
/*
Template Name: Category
*/
?>
<?php get_header(); ?>
		<section id="main_section">
			<section id="games_intro" class="grey_plate">


<form class="search category"method="get" action="<?php bloginfo('url'); ?>/">
<label for="s">Search: </label>
<?php 

$parentCatList = get_category_parents($cat,false,',');
$parentCatListArray = split(",",$parentCatList);
$topParentName = $parentCatListArray[0];
$topParentID = get_cat_ID(strtolower($topParentName));
global $firephp;
$firephp->log(get_the_category());

$args = array(
    'child_of' => $topParentID,
    'hierarchical' => true,
    'depth' => 4,
    'show_option_all' => "All " . $topParentName
    ); 
wp_dropdown_categories($args); 

?>
  <input type="text" id="s" name="s" class="ss-form-entry ss-q-short search_entry" title="ENTER YOUR SEARCH HERE"value="<?php the_search_query(); ?>">
  <input type="submit" class="ss-q-submit" value="OK!">
</form>
<?php 


echo get_category_parents($cat, TRUE, ' &raquo; ') . "<br/>";


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
           'post_type'=> array('resource','game',),
           //'category_name'=>single_cat_title('', false)
           'cat' => $this_category->cat_ID
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


