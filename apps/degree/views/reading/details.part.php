<?php
Part::input($reading, 'reading');
?>
<form method="POST" action="<?php echo Url::action('readingController::delete', $reading->id) ?>">
	<fieldset>
	<h3><?php echo Html::anchor(Url::action('readingController::details', $reading->id), 'reading #' . $reading->id) ?></h3>
	<p>
		<strong>Start</strong>: <?php echo date(DATE_ISO8601,$reading->start); ?><br />
		<strong>End</strong>: <?php echo date(DATE_ISO8601,$reading->end); ?><br />
		<strong>Text Id</strong>: <?php echo $reading->text_id; ?><br />
		<strong>Presentation</strong>: <?php echo $reading->presentation; ?><br />
		<strong>Angle</strong>: <?php echo $reading->angle; ?><br />
		<strong>Speed</strong>: <?php echo $reading->speed; ?><br />

	</p>
	<?php echo Html::anchor(Url::action('readingController::editForm', $reading->id), 'Edit') ?> - 
	<input type="hidden" name="_METHOD" value="DELETE" />
	<input type="submit" name="delete" value="Delete" />
	</fieldset>
</form>