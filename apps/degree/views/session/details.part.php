<?php
Part::input($session, 'session');
?>
<form method="POST" action="<?php echo Url::action('sessionController::delete', $session->id) ?>">
	<fieldset>
	<h3><?php echo Html::anchor(Url::action('sessionController::details', $session->id), 'session #' . $session->id) ?></h3>
	<p>
		<strong>Participant Id</strong>: <?php echo $session->participant_id; ?><br />
		<strong>Device Id</strong>: <?php echo $session->device_id; ?><br />
		<strong>Date</strong>: <?php echo date(DATE_ISO8601,$session->date); ?><br />

	</p>
	<?php echo Html::anchor(Url::action('sessionController::editForm', $session->id), 'Edit') ?> - 
	<input type="hidden" name="_METHOD" value="DELETE" />
	<input type="submit" name="delete" value="Delete" />
	</fieldset>
</form>