<?php
Part::input($form, 'ModelForm');
Part::input($title, 'string');
?>
<?php $form->begin(); ?>
	<fieldset>
		<legend><?php echo $title ?></legend>
		<?php $form->input('id'); ?>		
				<p>
			<label for="<?php echo $form->name->getName(); ?>">Name</label><br />
			<?php $form->input('name'); ?>
		</p>
		<p>
			<label for="<?php echo $form->type->getName(); ?>">Type</label><br />
			<?php $form->input('type'); ?>
		</p>
		<p>
			<label for="<?php echo $form->xres->getName(); ?>">Xres</label><br />
			<?php $form->input('xres'); ?>
		</p>
		<p>
			<label for="<?php echo $form->yres->getName(); ?>">Yres</label><br />
			<?php $form->input('yres'); ?>
		</p>
		<p>
			<label for="<?php echo $form->diagonal->getName(); ?>">Diagonal</label><br />
			<?php $form->input('diagonal'); ?>
		</p>
		<p>
			<label for="<?php echo $form->os->getName(); ?>">Os</label><br />
			<?php $form->input('os'); ?>
		</p>
		<p>
			<label for="<?php echo $form->version->getName(); ?>">Version</label><br />
			<?php $form->input('version'); ?>
		</p>

		<input type="submit" value="Save" />
	</fieldset>
<?php $form->end(); ?>