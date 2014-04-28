<?php
Part::input($form, 'ModelForm');
Part::input($title, 'string');
?>
<?php $form->begin(); ?>
	<fieldset>
		<legend><?php echo $title ?></legend>
		<?php $form->input('id'); ?>		
				<p>
			<label for="<?php echo $form->start->getName(); ?>">Start</label><br />
			<?php $form->input('start'); ?>
		</p>
		<p>
			<label for="<?php echo $form->end->getName(); ?>">End</label><br />
			<?php $form->input('end'); ?>
		</p>
		<p>
			<label for="<?php echo $form->text_id->getName(); ?>">Text Id</label><br />
			<?php $form->input('text_id'); ?>
		</p>
		<p>
			<label for="<?php echo $form->presentation->getName(); ?>">Presentation</label><br />
			<?php $form->input('presentation'); ?>
		</p>
		<p>
			<label for="<?php echo $form->angle->getName(); ?>">Angle</label><br />
			<?php $form->input('angle'); ?>
		</p>
		<p>
			<label for="<?php echo $form->speed->getName(); ?>">Speed</label><br />
			<?php $form->input('speed'); ?>
		</p>

		<input type="submit" value="Save" />
	</fieldset>
<?php $form->end(); ?>