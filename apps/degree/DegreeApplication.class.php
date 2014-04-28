<?php
Library::import('recess.framework.Application');

class DegreeApplication extends Application {
	public function __construct() {
		
		$this->name = 'degree';
		
		$this->viewsDir = $_ENV['dir.apps'] . 'degree/views/';
		
		$this->assetUrl = $_ENV['url.base'] . 'apps/degree/public/';
		
		$this->modelsPrefix = 'degree.models.';
		
		$this->controllersPrefix = 'degree.controllers.';
		
		$this->routingPrefix = 'degree/';
				
	}
}
?>