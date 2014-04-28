<?php
Part::input($stage, 'stage');
?>
<form method="POST" action="<?php echo Url::action('stageController::delete', $stage->id) ?>">
	<fieldset>
	<h3><?php echo Html::anchor(Url::action('stageController::details', $stage->id), 'stage #' . $stage->id) ?></h3>
	<p>
		<strong>Status</strong>: <?php echo $stage->status; ?><br />
		<strong>Reading Id</strong>: <?php echo $stage->reading_id; ?><br />

	</p>
	<?php echo Html::anchor(Url::action('stageController::editForm', $stage->id), 'Edit') ?> - 
	<input type="hidden" name="_METHOD" value="DELETE" />
	<input type="submit" name="delete" value="Delete" />
	</fieldset>
</form>