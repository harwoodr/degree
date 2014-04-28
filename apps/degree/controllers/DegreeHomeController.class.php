<?php
Library::import('recess.framework.controllers.Controller');

/**
 * !RespondsWith Layouts, Json
 * !Prefix Views: home/, Routes: /
 */
class DegreeHomeController extends Controller {
	
	/** !Route GET */
	function index() {
		
		$this->flash = 'Welcome to your new Recess application!';
		
	}
	
}
?>