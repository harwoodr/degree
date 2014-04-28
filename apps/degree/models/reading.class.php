<?php
/**
 * !Database Default
 * !BelongsTo text
 * !BelongsTo stage
 * !HasMany metrics
 * !Table reading
 */
class reading extends Model {
	/** !Column PrimaryKey, Integer, AutoIncrement */
	public $id;

	/** !Column Time */
	public $start;

	/** !Column Time */
	public $end;

	/** !Column Integer */
	public $text_id;
        
	/** !Column Integer */
	public $stage_id;
        
	/** !Column String */
	public $presentation;

	/** !Column Float */
	public $angle;

	/** !Column Integer */
	public $speed;

}
?>