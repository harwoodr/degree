<?php
Part::input($form, 'ModelForm');
Part::input($title, 'string');
?>
<?php $form->begin(); ?>
	<fieldset>
		<legend><?php echo $title ?></legend>
		<?php $form->input('id'); ?>		
				<p>
			<label for="<?php echo $form->status->getName(); ?>">Status</label><br />
			<?php $form->input('status'); ?>
		</p>
		<p>
			<label for="<?php echo $form->reading_id->getName(); ?>">Reading Id</label><br />
			<?php $form->input('reading_id'); ?>
		</p>

		<input type="submit" value="Save" />
	</fieldset>
<?php $form->end(); ?>