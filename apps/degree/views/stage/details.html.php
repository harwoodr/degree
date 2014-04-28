<?php 
Layout::extend('layouts/stage');
$title = 'Details of stage #' . $stage->id ;
?>

<?php Part::draw('stage/details', $stage) ?>

<?php echo Html::anchor(Url::action('stageController::index'), 'Back to list of stages') ?>
<hr />