<?php get_header(); ?>
<section id="main_section">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<section id="post_main">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

				<?php
				if(has_post_thumbnail()){
					echo('<div id="opening_image" >');
					the_post_thumbnail('slider'); 
					echo('</div>');
				}
				?>
				<header>	
					<h1><?php the_title(); ?></h1>	
					<p>Posted on <?php the_time('F jS, Y'); ?> by <?php the_author(); ?></p>
				</header>
					
					<?php the_content(); ?>

			</article>

		</section>

	<?php endwhile; else: ?>

		<section>
			<article>
				<p>Sorry, no posts matched your criteria.</p>
			</article>
		</section>

	<?php endif; ?>

</section><!-- main_section -->

<?php get_footer(); ?>