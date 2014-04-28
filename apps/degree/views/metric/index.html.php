<?php 
Layout::extend('layouts/metric');
$title = 'Index';
?>

<h3><?php echo Html::anchor(Url::action('metricController::newForm'), 'Create New metric') ?></h3>

<?php if(isset($flash)): ?>
	<div class="error">
	<?php echo $flash; ?>
	</div>
<?php endif; ?>

<?php foreach($metricSet as $metric): ?>
	<?php Part::draw('metric/details', $metric) ?>
	<hr />
<?php endforeach; ?>