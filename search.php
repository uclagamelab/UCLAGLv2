<?php get_header(); ?>

		<section id="main_section" >
			<section class="grey_plate">
			<?php if (have_posts()) : ?>

			<article id="post-<?php the_ID(); ?>" >
				<h1>Search Results for &ldquo;<?php the_search_query(); ?>&rdquo;</h1>
				<ol>

					<?php while (have_posts()) : the_post(); ?>

					<li>
						<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
						<?php the_excerpt(); ?>
					</li>

					<?php endwhile; ?>

				</ol>
			</article>
			<p>Didn't find what you're looking for? Try searching again, or browse our random projects below.</p>
			<?php get_search_form(); ?>
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
			</section><!-- grey_plate -->
		</section><!-- main_section -->

<?php get_footer(); ?>