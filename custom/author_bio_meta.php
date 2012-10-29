<div class="my_meta_control">
 
	<p>You can use this section to write about the person who wrote this article, regardless if it was you or someone else</p>
 
	<p>
		<?php $metabox->the_field('author_bio'); ?>
		<textarea name="<?php $metabox->the_name(); ?>" rows="3"><?php $metabox->the_value(); ?></textarea>
		<span>Enter in a description</span>
	</p>

</div>