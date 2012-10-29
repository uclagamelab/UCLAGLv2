<?php get_header(); ?>
<section id="main_section">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<section id="post_main">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
				
				<?php
				echo('<div id="opening_image" >');
				the_post_thumbnail('slider'); 
				echo('</div>');
				?>
				<header>	
					<h1><?php the_title(); ?></h1>	
				</header>

					<section id="game_caption">
						<h2>
						<?php 
							$short_description->the_field('description'); 
							$short_description->the_value();
						?>
						</h2>
					</section><!-- game_caption -->
					
					<?php
					$my_attachments = $attachments->the_meta();
					$my_links = $link_out->the_meta(); 
					if(sizeof($my_links['out_links']) > 0 || sizeof($my_attachments['docs']) > 0){ 
					?>
					<article id="game_footer_links" >
						<h3>LINKS AND DOWNLOADS</h3>
						<?php	
							$i=1;
		
							foreach($my_links['out_links'] as $link)
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
							
							foreach($my_attachments['docs'] as $download)
								{

									if($i%2==0){
										?>
									<div class="bio_badge yellow">
									<?php }else{ ?>
									<div class="bio_badge blue">	
									<?php } ?>
										<a href="<?php echo $download['link']; ?>" ><p><?php echo $download['title']; ?></p></a>
									</div><!-- bio_links -->
							<?php
							 		$i++;
								}
						?>
					</article><!-- game_footer_links -->
					<?php } ?>
					
					<section id="game_meta">
						<article id="datetime">
							<?php 
							$eventdate->the_field('startdate');
							//check if theres a date
							if($eventdate->get_the_value()){ 
								echo "<h3>WHEN</h3>";
								$ss = explode(" ", $eventdate->get_the_value());
								$eventdate->the_field('enddate');
								$es = explode(" ", $eventdate->get_the_value());
								if($ss[0] == $es[0]){
									if($ss[2]==$es[2]){
										$eventdate->the_value();
									}
									else
									{
										echo $ss[0] . " from " . $ss[2] . " to " . $es[2];
									}
								}
								else if($es[0])
								{
									echo "From " . $ss[0] . " to " . $es[0];
								}
								else
								{
									$eventdate->the_field('startdate');
									$eventdate->the_value();
								} 
							}
							?>
							
						</article><!-- datetime -->
	
						<article id="requirements">
							<?php 
							$requirements->the_field('requirements');
							if($requirements->get_the_value()){ 
							//check if there are requirements
								echo "<h3>REQUIREMENTS</h3>";
								$requirements->the_field('requirements');
								$requirements->the_value();

							 } 
							?>
						</article><!-- requirements -->
						
						<article id="author_bio">
							<?php
							$author_bio->the_field('author_bio');
							if($author_bio->get_the_value('author_bio'))
							{
								echo "<h3>ABOUT THE AUTHOR</H3>";
								$author_bio->the_value();
							}
							?>
						</article> <!-- author_bio -->


					</section><!-- game_meta -->
					<hr/>
					
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
