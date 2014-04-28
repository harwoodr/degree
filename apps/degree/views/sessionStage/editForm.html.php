<?php 
Layout::extend('layouts/sessionStage');
if(isset($sessionStage->stage_id)) {
	$title = 'Edit session_stage #' . $sessionStage->stage_id;
} else {
	$title = 'Create New session_stage';
}
$title = $title;
?>

<?php Part::draw('sessionStage/form', $_form, $title) ?>

<?php echo Html::anchor(Url::action('session_stageController::index'), 'session_stage List') ?>