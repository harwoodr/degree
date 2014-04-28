<?php
Part::input($form, 'ModelForm');
Part::input($title, 'string');
?>
<?php $form->begin(); ?>
	<fieldset>
		<legend><?php echo $title ?></legend>
		<?php $form->input('stage_id'); ?>		
				<p>
			<label for="<?php echo $form->session_id->getName(); ?>">Session Id</label><br />
			<?php $form->input('session_id'); ?>
		</p>

		<input type="submit" value="Save" />
	</fieldset>
<?php $form->end(); ?>