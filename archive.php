<?php get_header(); ?>

		<section id="main_section">

		<?php if (have_posts()) : ?>
		<section class="grey_plate">
			<h1 id="blog_header">UCLA Game Lab Blog</h1>
		</section>
		<?php while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>">
				<header>
					<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
					<p>Posted on <?php the_time('F jS, Y'); ?> by <?php the_author(); ?></p>
				</header>
				<section>
					<?php the_post_thumbnail('featured');  ?>
					<?php the_excerpt(); ?>
					
				</section>
				<footer>
					<p><?php the_tags('Tags: ', ', ', '<br>'); ?> Posted in <?php the_category(', '); ?> </p>
				</footer>
			</article>

			<?php endwhile; ?>
			

				
			<nav>
				<p><?php posts_nav_link('&nbsp;&bull;&nbsp;'); ?></p>
			</nav>

			<?php else : ?>

			<article>
				<h1>Not Found</h1>
				<p>Sorry, but the requested resource was not found on this site.</p>
				<?php get_search_form(); ?>
			</article>

			<?php endif; ?>

		</section>



<?php get_footer(); ?>
