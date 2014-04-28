<?php
Part::input($form, 'ModelForm');
Part::input($title, 'string');
?>
<?php $form->begin(); ?>
	<fieldset>
		<legend><?php echo $title ?></legend>
		<?php $form->input('id'); ?>		
				<p>
			<label for="<?php echo $form->uname->getName(); ?>">Uname</label><br />
			<?php $form->input('uname'); ?>
		</p>
		<p>
			<label for="<?php echo $form->pword->getName(); ?>">Pword</label><br />
			<?php $form->input('pword'); ?>
		</p>

		<input type="submit" value="Save" />
	</fieldset>
<?php $form->end(); ?>