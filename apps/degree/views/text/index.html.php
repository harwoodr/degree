<?php 
Layout::extend('layouts/text');
$title = 'Index';
?>

<h3><?php echo Html::anchor(Url::action('textController::newForm'), 'Create New text') ?></h3>

<?php if(isset($flash)): ?>
	<div class="error">
	<?php echo $flash; ?>
	</div>
<?php endif; ?>

<?php foreach($textSet as $text): ?>
	<?php Part::draw('text/details', $text) ?>
	<hr />
<?php endforeach; ?>