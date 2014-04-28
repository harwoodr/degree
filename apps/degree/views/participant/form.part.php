<?php
Part::input($form, 'ModelForm');
Part::input($title, 'string');
?>
<?php $form->begin(); ?>
	<fieldset>
		<legend><?php echo $title ?></legend>
		<?php $form->input('id'); ?>		
				<p>
			<label for="<?php echo $form->fname->getName(); ?>">Fname</label><br />
			<?php $form->input('fname'); ?>
		</p>
		<p>
			<label for="<?php echo $form->lname->getName(); ?>">Lname</label><br />
			<?php $form->input('lname'); ?>
		</p>
		<p>
			<label for="<?php echo $form->token->getName(); ?>">Token</label><br />
			<?php $form->input('token'); ?>
		</p>

		<input type="submit" value="Save" />
	</fieldset>
<?php $form->end(); ?>