<div class="my_meta_control">
	<?php $mb->the_field('person_department'); ?>
	<select name="<?php $mb->the_name(); ?>">
		<option value="">Select...</option>
		<option value="DMA"<?php $mb->the_select_state('DMA'); ?>>DMA</option>
		<option value="TFT"<?php $mb->the_select_state('TFT'); ?>>TFT</option>
		<option value="CMS"<?php $mb->the_select_state('CMS'); ?>>CMS</option>
		<option value="CS"<?php $mb->the_select_state('CS'); ?>>CS</option>
		<option value="Math"<?php $mb->the_select_state('Math'); ?>>Math</option>
		<option value="Architecture"<?php $mb->the_select_state('Architecture'); ?>>Architecture</option>
		<option value="UCLA Community School"<?php $mb->the_select_state('UCLACS'); ?>>UCLA Community School</option>
		<option value="Psychology"<?php $mb->the_select_state('Psychology'); ?>>Psychology</option>
	</select>

</div>