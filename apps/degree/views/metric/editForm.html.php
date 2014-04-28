<?php 
Layout::extend('layouts/metric');
if(isset($metric->id)) {
	$title = 'Edit metric #' . $metric->id;
} else {
	$title = 'Create New metric';
}
$title = $title;
?>

<?php Part::draw('metric/form', $_form, $title) ?>

<?php echo Html::anchor(Url::action('metricController::index'), 'metric List') ?>