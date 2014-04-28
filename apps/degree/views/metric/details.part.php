<?php
Part::input($metric, 'metric');
?>
<form method="POST" action="<?php echo Url::action('metricController::delete', $metric->id) ?>">
	<fieldset>
	<h3><?php echo Html::anchor(Url::action('metricController::details', $metric->id), 'metric #' . $metric->id) ?></h3>
	<p>
		<strong>Reading Id</strong>: <?php echo $metric->reading_id; ?><br />
		<strong>Type</strong>: <?php echo $metric->type; ?><br />
		<strong>Value</strong>: <?php echo $metric->value; ?><br />

	</p>
	<?php echo Html::anchor(Url::action('metricController::editForm', $metric->id), 'Edit') ?> - 
	<input type="hidden" name="_METHOD" value="DELETE" />
	<input type="submit" name="delete" value="Delete" />
	</fieldset>
</form>