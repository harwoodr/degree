<?php
Library::import('degree.models.metric');
Library::import('recess.framework.forms.ModelForm');

/**
 * !RespondsWith Layouts, Json
 * !Prefix metric/
 */
class metricController extends Controller {
	
	/** @var metric */
	protected $metric;
	
	/** @var Form */
	protected $_form;
	
	function init() {
		$this->metric = new metric();
		$this->_form = new ModelForm('metric', $this->request->data('metric'), $this->metric);
	}
	
	/** !Route GET */
	function index() {
		$this->metricSet = $this->metric->all();
		if(isset($this->request->get['flash'])) {
			$this->flash = $this->request->get['flash'];
		}
	}
	
	/** !Route GET, $id */
	function details($id) {
		$this->metric->id = $id;
		if($this->metric->exists()) {
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
			$this->metric->insert();
			return $this->created($this->urlTo('details', $this->metric->id));		
		} catch(Exception $exception) {
			return $this->conflict('editForm');
		}
	}
	
	/** !Route GET, $id/edit */
	function editForm($id) {
		$this->metric->id = $id;
		if($this->metric->exists()) {
			$this->_form->to(Methods::PUT, $this->urlTo('update', $id));
		} else {
			return $this->forwardNotFound($this->urlTo('index'), 'metric does not exist.');
		}
	}
	
	/** !Route PUT, $id */
	function update($id) {
		$oldmetric = new metric($id);
		if($oldmetric->exists()) {
			$oldmetric->copy($this->metric)->save();
			return $this->forwardOk($this->urlTo('details', $id));
		} else {
			return $this->forwardNotFound($this->urlTo('index'), 'metric does not exist.');
		}
	}
	
	/** !Route DELETE, $id */
	function delete($id) {
		$this->metric->id = $id;
		if($this->metric->delete()) {
			return $this->forwardOk($this->urlTo('index'));
		} else {
			return $this->forwardNotFound($this->urlTo('index'), 'metric does not exist.');
		}
	}
}
?>