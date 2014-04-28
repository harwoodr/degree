<?php
Library::import('degree.models.reading');
Library::import('recess.framework.forms.ModelForm');

/**
 * !RespondsWith Layouts, Json
 * !Prefix reading/
 */
class readingController extends Controller {
	
	/** @var reading */
	protected $reading;
	
	/** @var Form */
	protected $_form;
	
	function init() {
		$this->reading = new reading();
		$this->_form = new ModelForm('reading', $this->request->data('reading'), $this->reading);
	}
	
	/** !Route GET */
	function index() {
		$this->readingSet = $this->reading->all();
		if(isset($this->request->get['flash'])) {
			$this->flash = $this->request->get['flash'];
		}
	}
	
	/** !Route GET, $id */
	function details($id) {
		$this->reading->id = $id;
		if($this->reading->exists()) {
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
			$this->reading->insert();
			return $this->created($this->urlTo('details', $this->reading->id));		
		} catch(Exception $exception) {
			return $this->conflict('editForm');
		}
	}
	
	/** !Route GET, $id/edit */
	function editForm($id) {
		$this->reading->id = $id;
		if($this->reading->exists()) {
			$this->_form->to(Methods::PUT, $this->urlTo('update', $id));
		} else {
			return $this->forwardNotFound($this->urlTo('index'), 'reading does not exist.');
		}
	}
	
	/** !Route PUT, $id */
	function update($id) {
		$oldreading = new reading($id);
		if($oldreading->exists()) {
			$oldreading->copy($this->reading)->save();
			return $this->forwardOk($this->urlTo('details', $id));
		} else {
			return $this->forwardNotFound($this->urlTo('index'), 'reading does not exist.');
		}
	}
	
	/** !Route DELETE, $id */
	function delete($id) {
		$this->reading->id = $id;
		if($this->reading->delete()) {
			return $this->forwardOk($this->urlTo('index'));
		} else {
			return $this->forwardNotFound($this->urlTo('index'), 'reading does not exist.');
		}
	}
}
?>