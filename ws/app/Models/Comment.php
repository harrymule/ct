<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 31 Jul 2018 14:59:28 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Comment
 * 
 * @property int $id
 * @property string $comment
 * @property int $comment_by
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $modified_at
 * @property int $task
 * @property int $project
 *
 * @package App\Models
 */
class Comment extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'comment_by' => 'int',
		'task' => 'int',
		'project' => 'int'
	];

	protected $dates = [
		'modified_at'
	];

	protected $fillable = [
		'comment',
		'comment_by',
		'modified_at',
		'task',
		'project'
	];
}
