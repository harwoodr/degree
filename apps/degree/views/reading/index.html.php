<?php 
Layout::extend('layouts/reading');
$title = 'Index';
?>

<h3><?php echo Html::anchor(Url::action('readingController::newForm'), 'Create New reading') ?></h3>

<?php if(isset($flash)): ?>
	<div class="error">
	<?php echo $flash; ?>
	</div>
<?php endif; ?>

<?php foreach($readingSet as $reading): ?>
	<?php Part::draw('reading/details', $reading) ?>
	<hr />
<?php endforeach; ?>