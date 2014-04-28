<?php
/**
 * !Database Default
 * !HasMany sessions
 * !HasMany devices, Through: sessions
 * !Table participant
 */
class participant extends Model {
	/** !Column PrimaryKey, Integer, AutoIncrement */
	public $id;

	/** !Column String */
	public $fname;

	/** !Column String */
	public $lname;

	/** !Column String */
	public $token;

}
?>