<?php
Part::input($text, 'text');
?>
<form method="POST" action="<?php echo Url::action('textController::delete', $text->id) ?>">
	<fieldset>
	<h3><?php echo Html::anchor(Url::action('textController::details', $text->id), 'text #' . $text->id) ?></h3>
	<p>
		<strong>Name</strong>: <?php echo $text->name; ?><br />
		<strong>Description</strong>: <?php echo $text->description; ?><br />
		<strong>Body</strong>: <?php echo $text->body; ?><br />

	</p>
	<?php echo Html::anchor(Url::action('textController::editForm', $text->id), 'Edit') ?> - 
	<input type="hidden" name="_METHOD" value="DELETE" />
	<input type="submit" name="delete" value="Delete" />
	</fieldset>
</form>