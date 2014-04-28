<?php 
Layout::extend('layouts/sessionStage');
$title = 'Details of session_stage #' . $sessionStage->stage_id ;
?>

<?php Part::draw('sessionStage/details', $sessionStage) ?>

<?php echo Html::anchor(Url::action('session_stageController::index'), 'Back to list of sessionStages') ?>
<hr />