<?php
Part::input($user, 'user');
?>
<form method="POST" action="<?php echo Url::action('userController::delete', $user->id) ?>">
	<fieldset>
	<h3><?php echo Html::anchor(Url::action('userController::details', $user->id), 'user #' . $user->id) ?></h3>
	<p>
		<strong>Uname</strong>: <?php echo $user->uname; ?><br />
		<strong>Pword</strong>: <?php echo $user->pword; ?><br />

	</p>
	<?php echo Html::anchor(Url::action('userController::editForm', $user->id), 'Edit') ?> - 
	<input type="hidden" name="_METHOD" value="DELETE" />
	<input type="submit" name="delete" value="Delete" />
	</fieldset>
</form>