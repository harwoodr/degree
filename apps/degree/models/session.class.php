<?php
/**
 * !Database Default
 * !BelongsTo participant
 * !BelongsTo device
 * !HasMany stages, Through: session_stage
 * !Table session
 */
class session extends Model {
	/** !Column PrimaryKey, Integer, AutoIncrement */
	public $id;

	/** !Column Integer */
	public $participant_id;

	/** !Column Integer */
	public $device_id;

	/** !Column Date */
	public $date;

}
?>