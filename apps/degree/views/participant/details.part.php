<?php
Part::input($participant, 'participant');
?>
<form method="POST" action="<?php echo Url::action('participantController::delete', $participant->id) ?>">
	<fieldset>
	<h3><?php echo Html::anchor(Url::action('participantController::details', $participant->id), 'participant #' . $participant->id) ?></h3>
	<p>
		<strong>Fname</strong>: <?php echo $participant->fname; ?><br />
		<strong>Lname</strong>: <?php echo $participant->lname; ?><br />
		<strong>Token</strong>: <?php echo $participant->token; ?><br />

	</p>
	<?php echo Html::anchor(Url::action('participantController::editForm', $participant->id), 'Edit') ?> - 
	<input type="hidden" name="_METHOD" value="DELETE" />
	<input type="submit" name="delete" value="Delete" />
	</fieldset>
</form>