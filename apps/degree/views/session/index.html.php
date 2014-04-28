<?php 
Layout::extend('layouts/session');
$title = 'Index';
?>

<h3><?php echo Html::anchor(Url::action('sessionController::newForm'), 'Create New session') ?></h3>

<?php if(isset($flash)): ?>
	<div class="error">
	<?php echo $flash; ?>
	</div>
<?php endif; ?>

<?php foreach($sessionSet as $session): ?>
	<?php Part::draw('session/details', $session) ?>
	<hr />
<?php endforeach; ?>