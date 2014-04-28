<?php
Library::import('degree.models.stage');
Library::import('recess.framework.forms.ModelForm');

/**
 * !RespondsWith Layouts, Json
 * !Prefix stage/
 */
class stageController extends Controller {
	
	/** @var stage */
	protected $stage;
	
	/** @var Form */
	protected $_form;
	
	function init() {
		$this->stage = new stage();
		$this->_form = new ModelForm('stage', $this->request->data('stage'), $this->stage);
	}
	
	/** !Route GET */
	function index() {
		$this->stageSet = $this->stage->all();
		if(isset($this->request->get['flash'])) {
			$this->flash = $this->request->get['flash'];
		}
	}
	
	/** !Route GET, $id */
	function details($id) {
		$this->stage->id = $id;
		if($this->stage->exists()) {
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
			$this->stage->insert();
			return $this->created($this->urlTo('details', $this->stage->id));		
		} catch(Exception $exception) {
			return $this->conflict('editForm');
		}
	}
	
	/** !Route GET, $id/edit */
	function editForm($id) {
		$this->stage->id = $id;
		if($this->stage->exists()) {
			$this->_form->to(Methods::PUT, $this->urlTo('update', $id));
		} else {
			return $this->forwardNotFound($this->urlTo('index'), 'stage does not exist.');
		}
	}
	
	/** !Route PUT, $id */
	function update($id) {
		$oldstage = new stage($id);
		if($oldstage->exists()) {
			$oldstage->copy($this->stage)->save();
			return $this->forwardOk($this->urlTo('details', $id));
		} else {
			return $this->forwardNotFound($this->urlTo('index'), 'stage does not exist.');
		}
	}
	
	/** !Route DELETE, $id */
	function delete($id) {
		$this->stage->id = $id;
		if($this->stage->delete()) {
			return $this->forwardOk($this->urlTo('index'));
		} else {
			return $this->forwardNotFound($this->urlTo('index'), 'stage does not exist.');
		}
	}
}
?>