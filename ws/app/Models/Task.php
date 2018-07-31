<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 31 Jul 2018 14:59:28 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Task
 * 
 * @property int $id
 * @property int $project
 * @property string $task_name
 * @property string $task_type
 * @property int $priority
 * @property \Carbon\Carbon $due_date
 * @property string $status
 * @property int $percentage
 * @property int $created_by
 * @property int $assigned_by
 * @property \Carbon\Carbon $created
 * @property \Carbon\Carbon $modified
 *
 * @package App\Models
 */
class Task extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'project' => 'int',
		'priority' => 'int',
		'percentage' => 'int',
		'created_by' => 'int',
		'assigned_by' => 'int'
	];

	protected $dates = [
		'due_date',
		'created',
		'modified'
	];

	protected $fillable = [
		'project',
		'task_name',
		'task_type',
		'priority',
		'due_date',
		'status',
		'percentage',
		'created_by',
		'assigned_by',
		'created',
		'modified'
	];
}
