<?php
Part::input($form, 'ModelForm');
Part::input($title, 'string');
?>
<?php $form->begin(); ?>
	<fieldset>
		<legend><?php echo $title ?></legend>
		<?php $form->input('id'); ?>		
				<p>
			<label for="<?php echo $form->participant_id->getName(); ?>">Participant Id</label><br />
			<?php $form->input('participant_id'); ?>
		</p>
		<p>
			<label for="<?php echo $form->device_id->getName(); ?>">Device Id</label><br />
			<?php $form->input('device_id'); ?>
		</p>
		<p>
			<label for="<?php echo $form->date->getName(); ?>">Date</label><br />
			<?php $form->input('date'); ?>
		</p>

		<input type="submit" value="Save" />
	</fieldset>
<?php $form->end(); ?>