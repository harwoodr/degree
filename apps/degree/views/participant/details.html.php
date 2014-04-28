<?php 
Layout::extend('layouts/participant');
$title = 'Details of participant #' . $participant->id ;
?>

<?php Part::draw('participant/details', $participant) ?>

<?php echo Html::anchor(Url::action('participantController::index'), 'Back to list of participants') ?>
<hr />