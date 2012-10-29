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
					
					<?
					$my_attachments = $attachments->the_meta();
					$my_links = $link_out->the_meta(); 
					if(sizeof($my_links['out_links']) > 0 || sizeof($my_attachments['docs']) > 0){ 
					?>
					<article id="game_footer_links" >
						<h3>LINKS AND DOWNLOADS</h3>
						<?	
							$i=1;
		
							foreach($my_links['out_links'] as $link)
							{
			
								if($i%2==0){
									?>
								<div class="bio_badge yellow">
								<? }else{ ?>
								<div class="bio_badge blue">	
								<? } ?>
									<a href="<? echo $link['link']; ?>" ><p><? echo $link['title']; ?></p></a>
								</div><!-- bio_links -->
						<?
						 		$i++;
							} 
							
							foreach($my_attachments['docs'] as $download)
								{

									if($i%2==0){
										?>
									<div class="bio_badge yellow">
									<? }else{ ?>
									<div class="bio_badge blue">	
									<? } ?>
										<a href="<? echo $download['link']; ?>" ><p><? echo $download['title']; ?></p></a>
									</div><!-- bio_links -->
							<?
							 		$i++;
								}
						?>
					</article><!-- game_footer_links -->
					<? } ?>
					
					<section id="game_meta">
					<?php
						$context->the_field('context');
						if($context->the_value()){
						?>
							<article id="game_context">
								<h3>CONTEXT</h3>
								<?php
									$context->the_value();
								?>
								<!-- commented out until we create a seperate type for events, etc... -->
								<!-- <br/>Created <?php the_time('F jS, Y'); ?> -->
							</article><!-- game_context -->
						<?php
						}
					?>
						
						<article id="game_medium">
							<h3>MEDIUM</h3>
							<?php
								$medium->the_field('medium');
								$medium->the_value();
							?>
							
						</article><!-- game_medium -->
						<article id="game_credits">
							<h3>CREDITS</h3>
							<?php $game_credits->the_meta(); ?>
							<?php 
							while($game_credits->have_fields_and_multi('credits')): 
								 $game_credits->the_group_open(); 
								 $game_credits->the_field('person'); 
								 echo "<span class='name'>";
								 echo $game_credits->the_value() ;
								 echo "</span>"; 
							?>
							&nbsp;:&nbsp;
							<?php
								 $game_credits->the_field('roll'); 
								 echo $game_credits->the_value(); 
								 $game_credits->the_group_close(); 
							endwhile; 
							?>
						</article><!-- game_credits -->

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