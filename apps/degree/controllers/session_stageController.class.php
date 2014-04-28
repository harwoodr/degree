<?php
Library::import('degree.models.session_stage');
Library::import('recess.framework.forms.ModelForm');

/**
 * !RespondsWith Layouts
 * !Prefix sessionStage/
 */
class session_stageController extends Controller {
	
	/** @var session_stage */
	protected $sessionStage;
	
	/** @var Form */
	protected $_form;
	
	function init() {
		$this->sessionStage = new session_stage();
		$this->_form = new ModelForm('sessionStage', $this->request->data('sessionStage'), $this->sessionStage);
	}
	
	/** !Route GET */
	function index() {
		$this->sessionStageSet = $this->sessionStage->all();
		if(isset($this->request->get['flash'])) {
			$this->flash = $this->request->get['flash'];
		}
	}
	
	/** !Route GET, $stage_id */
	function details($stage_id) {
		$this->sessionStage->stage_id = $stage_id;
		if($this->sessionStage->exists()) {
			return $this->ok('details');
		} else {
			return $this->forwardNotFound($this->urlTo('index'));
		}
	}
	
	/** !Route GET, new */
	function newForm() {
		$this->_form->to(Methods::POST, $this->urlTo('insert'));
		return $this->ok('editForm');
	}
	
	/** !Route POST */
	function insert() {
		try {
			$this->sessionStage->insert();
			return $this->created($this->urlTo('details', $this->sessionStage->stage_id));		
		} catch(Exception $exception) {
			return $this->conflict('editForm');
		}
	}
	
	/** !Route GET, $stage_id/edit */
	function editForm($stage_id) {
		$this->sessionStage->stage_id = $stage_id;
		if($this->sessionStage->exists()) {
			$this->_form->to(Methods::PUT, $this->urlTo('update', $stage_id));
		} else {
			return $this->forwardNotFound($this->urlTo('index'), 'session_stage does not exist.');
		}
	}
	
	/** !Route PUT, $stage_id */
	function update($stage_id) {
		$oldsession_stage = new session_stage($stage_id);
		if($oldsession_stage->exists()) {
			$oldsession_stage->copy($this->sessionStage)->save();
			return $this->forwardOk($this->urlTo('details', $stage_id));
		} else {
			return $this->forwardNotFound($this->urlTo('index'), 'session_stage does not exist.');
		}
	}
	
	/** !Route DELETE, $stage_id */
	function delete($stage_id) {
		$this->sessionStage->stage_id = $stage_id;
		if($this->sessionStage->delete()) {
			return $this->forwardOk($this->urlTo('index'));
		} else {
			return $this->forwardNotFound($this->urlTo('index'), 'session_stage does not exist.');
		}
	}
}
?>