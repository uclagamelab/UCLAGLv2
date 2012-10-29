<div class="my_meta_control">
 
	<p>This is the blurb that gets attached to the thumbnail image throughout the site and is also displayed on the top of the project page. It should be about 146 characters long. (maybe two or three short sentences)</p>
 
	<p>
		<?php $metabox->the_field('description'); ?>
		<textarea name="<?php $metabox->the_name(); ?>" rows="3"><?php $metabox->the_value(); ?></textarea>
		<span>Enter in a description</span>
	</p>

</div>