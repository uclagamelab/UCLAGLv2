<div class="my_meta_control">
 
	<p>This is what people will need in order to attend an event. It could list things such as RSVP, cost, things to bring, etc...</p>
 
	<p>
		<?php $metabox->the_field('requirements'); ?>
		<textarea name="<?php $metabox->the_name(); ?>" rows="3"><?php $metabox->the_value(); ?></textarea>
	</p>

</div>