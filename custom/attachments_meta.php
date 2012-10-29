<div class="my_meta_control">
 
	<p>This section will let you add download links to the bottom of the page. Add items by entering in a title and 
	URL. You can upload items by using the "Add Media" box at the top of this form, and then copy their URL from there to enter here. Attachments can be anything (PDF, JPG, ZIP, etc...)</p>
 
	<?php while($mb->have_fields_and_multi('docs')): ?>
	<?php $mb->the_group_open(); ?>
 
		<?php $mb->the_field('title'); ?>
		
		<p><label>Title</label><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/></p>
 
		<?php $mb->the_field('link'); ?>
		
		<p><label>URL</label><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/></p>
 
		<a href="#" class="dodelete">Remove Document</a>
		
 
	<?php $mb->the_group_close(); ?>
	<?php endwhile; ?>
 
	<p style="margin-bottom:15px; padding-top:5px;"><a href="#" class="docopy-docs button">Add Document</a></p>

</div>