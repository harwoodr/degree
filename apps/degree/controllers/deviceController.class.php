<?php
Library::import('degree.models.device');
Library::import('recess.framework.forms.ModelForm');

/**
 * !RespondsWith Layouts, Json
 * !Prefix device/
 */
class deviceController extends Controller {
	
	/** @var device */
	protected $device;
	
	/** @var Form */
	protected $_form;
	
	function init() {
		$this->device = new device();
		$this->_form = new ModelForm('device', $this->request->data('device'), $this->device);
	}
	
	/** !Route GET */
	function index() {
		$this->deviceSet = $this->device->all();
		if(isset($this->request->get['flash'])) {
			$this->flash = $this->request->get['flash'];
		}
	}
	
	/** !Route GET, $id */
	function details($id) {
		$this->device->id = $id;
		if($this->device->exists()) {
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
			$this->device->insert();
			return $this->created($this->urlTo('details', $this->device->id));		
		} catch(Exception $exception) {
			return $this->conflict('editForm');
		}
	}
	
	/** !Route GET, $id/edit */
	function editForm($id) {
		$this->device->id = $id;
		if($this->device->exists()) {
			$this->_form->to(Methods::PUT, $this->urlTo('update', $id));
		} else {
			return $this->forwardNotFound($this->urlTo('index'), 'device does not exist.');
		}
	}
	
	/** !Route PUT, $id */
	function update($id) {
		$olddevice = new device($id);
		if($olddevice->exists()) {
			$olddevice->copy($this->device)->save();
			return $this->forwardOk($this->urlTo('details', $id));
		} else {
			return $this->forwardNotFound($this->urlTo('index'), 'device does not exist.');
		}
	}
	
	/** !Route DELETE, $id */
	function delete($id) {
		$this->device->id = $id;
		if($this->device->delete()) {
			return $this->forwardOk($this->urlTo('index'));
		} else {
			return $this->forwardNotFound($this->urlTo('index'), 'device does not exist.');
		}
	}
}
?>