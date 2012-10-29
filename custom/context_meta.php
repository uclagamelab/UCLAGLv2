<div class="my_meta_control">
 	

	<p>Describe where this game was made and what for. (E.G. This game was made as part of the DMA 157 A class as a final project.) Don't forget to use post tags found in the side bar if the context is common like in the case of a class project.</p>

		<p>
			<?php $metabox->the_field('context'); ?>
			<textarea name="<?php $metabox->the_name(); ?>" rows="3"><?php $metabox->the_value(); ?></textarea>
		</p>



</div>