<?php
/**
 * !Database Default
 * !HasMany sessions
 * !Table device
 */
class device extends Model {
	/** !Column PrimaryKey, Integer, AutoIncrement */
	public $id;

	/** !Column String */
	public $name;

	/** !Column String */
	public $type;

	/** !Column Integer */
	public $xres;

	/** !Column Integer */
	public $yres;

	/** !Column Float */
	public $diagonal;

	/** !Column String */
	public $os;

	/** !Column String */
	public $version;

}
?>