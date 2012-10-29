<div class="my_meta_control">
 	

	<p>Add names of any other people and what they did on the project. If someone did more than one thing you can add their name more than once</p>
 
	<?php while($mb->have_fields_and_multi('credits')): ?>
	<?php $mb->the_group_open(); ?>
 
		<?php $mb->the_field('person'); ?>
		<p><label>PERSON</label><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" /></p>
		<?php $mb->the_field('roll'); ?>
		<p><label>ROLL</label><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/></p>
 
		<a href="#" class="dodelete">Remove Person</a>
	<?php $mb->the_group_close(); ?>
	<?php endwhile; ?>
 
	<p style="margin-bottom:15px; padding-top:5px;"><a href="#" class="docopy-credits button">Add Person</a></p>
	




</div>