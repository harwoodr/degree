<?php 
Layout::extend('layouts/device');
$title = 'Index';
?>

<h3><?php echo Html::anchor(Url::action('deviceController::newForm'), 'Create New device') ?></h3>

<?php if(isset($flash)): ?>
	<div class="error">
	<?php echo $flash; ?>
	</div>
<?php endif; ?>

<?php foreach($deviceSet as $device): ?>
	<?php Part::draw('device/details', $device) ?>
	<hr />
<?php endforeach; ?>