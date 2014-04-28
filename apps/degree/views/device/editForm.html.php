<?php 
Layout::extend('layouts/device');
if(isset($device->id)) {
	$title = 'Edit device #' . $device->id;
} else {
	$title = 'Create New device';
}
$title = $title;
?>

<?php Part::draw('device/form', $_form, $title) ?>

<?php echo Html::anchor(Url::action('deviceController::index'), 'device List') ?>