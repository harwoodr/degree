<?php
Library::import('degree.models.session');
Library::import('recess.framework.forms.ModelForm');

/**
 * !RespondsWith Layouts, Json
 * !Prefix session/
 */
class sessionController extends Controller {
	
	/** @var session */
	protected $session;
	
	/** @var Form */
	protected $_form;
	
	function init() {
		$this->session = new session();
		$this->_form = new ModelForm('session', $this->request->data('session'), $this->session);
	}
	
	/** !Route GET */
	function index() {
		$this->sessionSet = $this->session->all();
		if(isset($this->request->get['flash'])) {
			$this->flash = $this->request->get['flash'];
		}
	}
	
	/** !Route GET, $id */
	function details($id) {
		$this->session->id = $id;
		if($this->session->exists()) {
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
			$this->session->insert();
			return $this->created($this->urlTo('details', $this->session->id));		
		} catch(Exception $exception) {
			return $this->conflict('editForm');
		}
	}
	
	/** !Route GET, $id/edit */
	function editForm($id) {
		$this->session->id = $id;
		if($this->session->exists()) {
			$this->_form->to(Methods::PUT, $this->urlTo('update', $id));
		} else {
			return $this->forwardNotFound($this->urlTo('index'), 'session does not exist.');
		}
	}
	
	/** !Route PUT, $id */
	function update($id) {
		$oldsession = new session($id);
		if($oldsession->exists()) {
			$oldsession->copy($this->session)->save();
			return $this->forwardOk($this->urlTo('details', $id));
		} else {
			return $this->forwardNotFound($this->urlTo('index'), 'session does not exist.');
		}
	}
	
	/** !Route DELETE, $id */
	function delete($id) {
		$this->session->id = $id;
		if($this->session->delete()) {
			return $this->forwardOk($this->urlTo('index'));
		} else {
			return $this->forwardNotFound($this->urlTo('index'), 'session does not exist.');
		}
	}
}
?>