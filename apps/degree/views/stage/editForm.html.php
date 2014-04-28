<?php 
Layout::extend('layouts/stage');
if(isset($stage->id)) {
	$title = 'Edit stage #' . $stage->id;
} else {
	$title = 'Create New stage';
}
$title = $title;
?>

<?php Part::draw('stage/form', $_form, $title) ?>

<?php echo Html::anchor(Url::action('stageController::index'), 'stage List') ?>