<?php 
Layout::extend('layouts/reading');
if(isset($reading->id)) {
	$title = 'Edit reading #' . $reading->id;
} else {
	$title = 'Create New reading';
}
$title = $title;
?>

<?php Part::draw('reading/form', $_form, $title) ?>

<?php echo Html::anchor(Url::action('readingController::index'), 'reading List') ?>