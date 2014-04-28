<?php
/**
 * !Database Default
 * !BelongsTo session
 * !BelongsTo stage
 * !Table session_stage
 */
class session_stage extends Model {
	/** !Column Integer */
	public $session_id;

	/** !Column PrimaryKey, Integer */
	public $stage_id;

}
?>