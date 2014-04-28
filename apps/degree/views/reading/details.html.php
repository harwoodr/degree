<?php 
Layout::extend('layouts/reading');
$title = 'Details of reading #' . $reading->id ;
?>

<?php Part::draw('reading/details', $reading) ?>

<?php echo Html::anchor(Url::action('readingController::index'), 'Back to list of readings') ?>
<hr />