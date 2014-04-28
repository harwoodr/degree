<?php
Library::import('degree.models.participant');
Library::import('recess.framework.forms.ModelForm');

/**
 * !RespondsWith Layouts, Json
 * !Prefix participant/
 */
class participantController extends Controller {
	
	/** @var participant */
	protected $participant;
	
	/** @var Form */
	protected $_form;
	
	function init() {
		$this->participant = new participant();
		$this->_form = new ModelForm('participant', $this->request->data('participant'), $this->participant);
	}
	
	/** !Route GET */
	function index() {
		$this->participantSet = $this->participant->all();
		if(isset($this->request->get['flash'])) {
			$this->flash = $this->request->get['flash'];
		}
	}
	
	/** !Route GET, $id */
	function details($id) {
		$this->participant->id = $id;
		if($this->participant->exists()) {
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
			$this->participant->insert();
			return $this->created($this->urlTo('details', $this->participant->id));		
		} catch(Exception $exception) {
			return $this->conflict('editForm');
		}
	}
	
	/** !Route GET, $id/edit */
	function editForm($id) {
		$this->participant->id = $id;
		if($this->participant->exists()) {
			$this->_form->to(Methods::PUT, $this->urlTo('update', $id));
		} else {
			return $this->forwardNotFound($this->urlTo('index'), 'participant does not exist.');
		}
	}
	
	/** !Route PUT, $id */
	function update($id) {
		$oldparticipant = new participant($id);
		if($oldparticipant->exists()) {
			$oldparticipant->copy($this->participant)->save();
			return $this->forwardOk($this->urlTo('details', $id));
		} else {
			return $this->forwardNotFound($this->urlTo('index'), 'participant does not exist.');
		}
	}
	
	/** !Route DELETE, $id */
	function delete($id) {
		$this->participant->id = $id;
		if($this->participant->delete()) {
			return $this->forwardOk($this->urlTo('index'));
		} else {
			return $this->forwardNotFound($this->urlTo('index'), 'participant does not exist.');
		}
	}
}
?>