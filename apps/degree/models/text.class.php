<?php
/**
 * !Database Default
 * !HasMany readings
 * !HasMany stages, Through: reading
 * !Table text
 */
class text extends Model {
	/** !Column PrimaryKey, Integer, AutoIncrement */
	public $id;

	/** !Column String */
	public $name;

	/** !Column Text */
	public $description;

	/** !Column Text */
	public $body;

}
?>