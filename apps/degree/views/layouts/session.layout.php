<?php
Layout::extend('layouts/master');
Layout::input($title, 'string');
Layout::input($body, 'Block');

$title .= 'session - ';

$navigation = Part::block('parts/navigation');
?>