<?php 
Layout::extend('layouts/participant');
$title = 'Index';
?>

<h3><?php echo Html::anchor(Url::action('participantController::newForm'), 'Create New participant') ?></h3>

<?php if(isset($flash)): ?>
	<div class="error">
	<?php echo $flash; ?>
	</div>
<?php endif; ?>

<?php foreach($participantSet as $participant): ?>
	<?php Part::draw('participant/details', $participant) ?>
	<hr />
<?php endforeach; ?>