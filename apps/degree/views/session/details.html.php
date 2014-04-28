<?php 
Layout::extend('layouts/session');
$title = 'Details of session #' . $session->id ;
?>

<?php Part::draw('session/details', $session) ?>

<?php echo Html::anchor(Url::action('sessionController::index'), 'Back to list of sessions') ?>
<hr />