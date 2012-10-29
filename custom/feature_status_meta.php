<div class="feature_status">
 
	<p>Here you can select how this item will be displayed in various featured content areas of the site.</p>

	<div class="page_options">
		<label>How should this be featured on the front page of the site?</label><br/>
		<?php $mb->the_field('front_page_feature_status'); ?>
		<select name="<?php $mb->the_name(); ?>">
			<option value="">Select...</option>
			<option value="slider"<?php $mb->the_select_state('slider'); ?>>Slider</option>
			<option value="feature"<?php $mb->the_select_state('feature'); ?>>Feature</option>
		</select>
	</div><!-- page_options -->
	<div class="page_options">
		<label>How should this be featured on the Archive Page?</label><br/>
		<?php $mb->the_field('archive_page_feature_status'); ?>
		<select name="<?php $mb->the_name(); ?>">
			<option value="">Select...</option>
			<option value="slider"<?php $mb->the_select_state('slider'); ?>>Slider</option>
			<option value="feature"<?php $mb->the_select_state('feature'); ?>>Feature</option>
		</select>
	</div><!-- page_options -->
	
	<div class="page_options">
	<?php $mb->the_field('cb_random_posts'); ?>
	<input type="checkbox" name="<?php $mb->the_name(); ?>" value="random_posts_false"<?php $mb->the_checkbox_state('random_posts_false'); ?>/> Should this be filtered from Random Posts section?
	</div><!-- page_options -->

</div>