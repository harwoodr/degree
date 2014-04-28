<?php 
Layout::extend('layouts/sessionStage');
$title = 'Index';
?>

<h3><?php echo Html::anchor(Url::action('session_stageController::newForm'), 'Create New session_stage') ?></h3>

<?php if(isset($flash)): ?>
	<div class="error">
	<?php echo $flash; ?>
	</div>
<?php endif; ?>

<?php foreach($sessionStageSet as $sessionStage): ?>
	<?php Part::draw('sessionStage/details', $sessionStage) ?>
	<hr />
<?php endforeach; ?>