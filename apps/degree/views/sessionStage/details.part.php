<?php
Part::input($sessionStage, 'session_stage');
?>
<form method="POST" action="<?php echo Url::action('session_stageController::delete', $sessionStage->stage_id) ?>">
	<fieldset>
	<h3><?php echo Html::anchor(Url::action('session_stageController::details', $sessionStage->stage_id), 'session_stage #' . $sessionStage->stage_id) ?></h3>
	<p>
		<strong>Session Id</strong>: <?php echo $sessionStage->session_id; ?><br />

	</p>
	<?php echo Html::anchor(Url::action('session_stageController::editForm', $sessionStage->stage_id), 'Edit') ?> - 
	<input type="hidden" name="_METHOD" value="DELETE" />
	<input type="submit" name="delete" value="Delete" />
	</fieldset>
</form>