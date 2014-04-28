<?php
Library::import('degree.models.user');
Library::import('recess.framework.forms.ModelForm');

/**
 * !RespondsWith Layouts, Json
 * !Prefix user/
 */
class userController extends Controller {
	
	/** @var user */
	protected $user;
	
	/** @var Form */
	protected $_form;
	
	function init() {
		$this->user = new user();
		$this->_form = new ModelForm('user', $this->request->data('user'), $this->user);
	}
	
	/** !Route GET */
	function index() {
		$this->userSet = $this->user->all();
		if(isset($this->request->get['flash'])) {
			$this->flash = $this->request->get['flash'];
		}
	}
	
	/** !Route GET, $id */
	function details($id) {
		$this->user->id = $id;
		if($this->user->exists()) {
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
			$this->user->insert();
			return $this->created($this->urlTo('details', $this->user->id));		
		} catch(Exception $exception) {
			return $this->conflict('editForm');
		}
	}
	
	/** !Route GET, $id/edit */
	function editForm($id) {
		$this->user->id = $id;
		if($this->user->exists()) {
			$this->_form->to(Methods::PUT, $this->urlTo('update', $id));
		} else {
			return $this->forwardNotFound($this->urlTo('index'), 'user does not exist.');
		}
	}
	
	/** !Route PUT, $id */
	function update($id) {
		$olduser = new user($id);
		if($olduser->exists()) {
			$olduser->copy($this->user)->save();
			return $this->forwardOk($this->urlTo('details', $id));
		} else {
			return $this->forwardNotFound($this->urlTo('index'), 'user does not exist.');
		}
	}
	
	/** !Route DELETE, $id */
	function delete($id) {
		$this->user->id = $id;
		if($this->user->delete()) {
			return $this->forwardOk($this->urlTo('index'));
		} else {
			return $this->forwardNotFound($this->urlTo('index'), 'user does not exist.');
		}
	}
}
?>