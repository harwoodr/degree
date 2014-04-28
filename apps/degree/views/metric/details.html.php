<?php 
Layout::extend('layouts/metric');
$title = 'Details of metric #' . $metric->id ;
?>

<?php Part::draw('metric/details', $metric) ?>

<?php echo Html::anchor(Url::action('metricController::index'), 'Back to list of metrics') ?>
<hr />