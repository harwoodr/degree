<?php 
Layout::extend('layouts/session');
if(isset($session->id)) {
	$title = 'Edit session #' . $session->id;
} else {
	$title = 'Create New session';
}
$title = $title;
?>

<?php Part::draw('session/form', $_form, $title) ?>

<?php echo Html::anchor(Url::action('sessionController::index'), 'session List') ?>