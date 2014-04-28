<?php 
Layout::extend('layouts/device');
$title = 'Details of device #' . $device->id ;
?>

<?php Part::draw('device/details', $device) ?>

<?php echo Html::anchor(Url::action('deviceController::index'), 'Back to list of devices') ?>
<hr />