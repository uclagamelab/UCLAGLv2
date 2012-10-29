<div class="my_meta_control">
	<?php $mb->the_field('person_title'); ?>
	<select name="<?php $mb->the_name(); ?>">
		<option value="">Select...</option>
		<option value="faculty"<?php $mb->the_select_state('faculty'); ?>>Faculty</option>
		<option value="staff"<?php $mb->the_select_state('staff'); ?>>Staff</option>
		<option value="PHD"<?php $mb->the_select_state('PHD'); ?>>PHD</option>
		<option value="grad"<?php $mb->the_select_state('grad'); ?>>Graduate</option>
		<option value="undergrad"<?php $mb->the_select_state('undergrad'); ?>>Undergraduate</option>
	</select>

</div>