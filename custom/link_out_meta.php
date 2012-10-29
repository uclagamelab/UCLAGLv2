<div class="my_meta_control">
 
	<p>This is where you can add external links</p>
 
	<?php while($mb->have_fields_and_multi('out_links')): ?>
	<?php $mb->the_group_open(); ?>
 
		<?php $mb->the_field('title'); ?>
		
		<p><label>Label</label><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/></p>
 
		<?php $mb->the_field('link'); ?>
		
		<p><label>URL</label><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/></p>
 
		<a href="#" class="dodelete">Remove Link</a>
		
 
	<?php $mb->the_group_close(); ?>
	<?php endwhile; ?>
 
	<p style="margin-bottom:15px; padding-top:5px;"><a href="#" class="docopy-out_links button">Add Another Link</a></p>

</div>