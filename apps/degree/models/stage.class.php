<?php
/**
 * !Database Default
 * !HasMany sessions, Through: session_stage
 * !HasMany readings
 * !Table stage
 */
class stage extends Model {
	/** !Column PrimaryKey, Integer, AutoIncrement */
	public $id;

	/** !Column String */
	public $status;



}
?>