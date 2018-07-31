<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 31 Jul 2018 14:59:28 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Issue
 * 
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $status
 * @property int $owner
 * @property int $task
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $modified_at
 *
 * @package App\Models
 */
class Issue extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'owner' => 'int',
		'task' => 'int'
	];

	protected $dates = [
		'modified_at'
	];

	protected $fillable = [
		'name',
		'description',
		'status',
		'owner',
		'task',
		'modified_at'
	];
}
