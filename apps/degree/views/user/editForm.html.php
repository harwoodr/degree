<?php 
Layout::extend('layouts/user');
if(isset($user->id)) {
	$title = 'Edit user #' . $user->id;
} else {
	$title = 'Create New user';
}
$title = $title;
?>

<?php Part::draw('user/form', $_form, $title) ?>

<?php echo Html::anchor(Url::action('userController::index'), 'user List') ?>