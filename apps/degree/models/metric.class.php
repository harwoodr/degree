<?php
/**
 * !Database Default
 * !Table metric
 */
class metric extends Model {
	/** !Column PrimaryKey, Integer, AutoIncrement */
	public $id;

	/** !Column Integer */
	public $reading_id;

	/** !Column String */
	public $type;

	/** !Column String */
	public $value;

}
?>