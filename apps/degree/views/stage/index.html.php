<?php 
Layout::extend('layouts/stage');
$title = 'Index';
?>

<h3><?php echo Html::anchor(Url::action('stageController::newForm'), 'Create New stage') ?></h3>

<?php if(isset($flash)): ?>
	<div class="error">
	<?php echo $flash; ?>
	</div>
<?php endif; ?>

<?php foreach($stageSet as $stage): ?>
	<?php Part::draw('stage/details', $stage) ?>
	<hr />
<?php endforeach; ?>