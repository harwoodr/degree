<?php 
Layout::extend('layouts/text');
if(isset($text->id)) {
	$title = 'Edit text #' . $text->id;
} else {
	$title = 'Create New text';
}
$title = $title;
?>

<?php Part::draw('text/form', $_form, $title) ?>

<?php echo Html::anchor(Url::action('textController::index'), 'text List') ?>