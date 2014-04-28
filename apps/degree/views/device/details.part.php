<?php
Part::input($device, 'device');
?>
<form method="POST" action="<?php echo Url::action('deviceController::delete', $device->id) ?>">
	<fieldset>
	<h3><?php echo Html::anchor(Url::action('deviceController::details', $device->id), 'device #' . $device->id) ?></h3>
	<p>
		<strong>Name</strong>: <?php echo $device->name; ?><br />
		<strong>Type</strong>: <?php echo $device->type; ?><br />
		<strong>Xres</strong>: <?php echo $device->xres; ?><br />
		<strong>Yres</strong>: <?php echo $device->yres; ?><br />
		<strong>Diagonal</strong>: <?php echo $device->diagonal; ?><br />
		<strong>Os</strong>: <?php echo $device->os; ?><br />
		<strong>Version</strong>: <?php echo $device->version; ?><br />

	</p>
	<?php echo Html::anchor(Url::action('deviceController::editForm', $device->id), 'Edit') ?> - 
	<input type="hidden" name="_METHOD" value="DELETE" />
	<input type="submit" name="delete" value="Delete" />
	</fieldset>
</form>