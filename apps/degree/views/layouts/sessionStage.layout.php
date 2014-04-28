<?php
Layout::extend('layouts/master');
Layout::input($title, 'string');
Layout::input($body, 'Block');

$title .= 'session_stage - ';

$navigation = Part::block('parts/navigation');
?>