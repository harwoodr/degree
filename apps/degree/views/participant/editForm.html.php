<?php 
Layout::extend('layouts/participant');
if(isset($participant->id)) {
	$title = 'Edit participant #' . $participant->id;
} else {
	$title = 'Create New participant';
}
$title = $title;
?>

<?php Part::draw('participant/form', $_form, $title) ?>

<?php echo Html::anchor(Url::action('participantController::index'), 'participant List') ?>