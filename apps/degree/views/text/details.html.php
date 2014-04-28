<?php 
Layout::extend('layouts/text');
$title = 'Details of text #' . $text->id ;
?>

<?php Part::draw('text/details', $text) ?>

<?php echo Html::anchor(Url::action('textController::index'), 'Back to list of texts') ?>
<hr />