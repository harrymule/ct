<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 31 Jul 2018 14:59:28 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Project
 * 
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $budget
 * @property int $manager
 * @property int $customer
 * @property string $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $modified_at
 *
 * @package App\Models
 */
class Project extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'budget' => 'int',
		'manager' => 'int',
		'customer' => 'int'
	];

	protected $dates = [
		'modified_at'
	];

	protected $fillable = [
		'name',
		'description',
		'budget',
		'manager',
		'customer',
		'status',
		'modified_at'
	];
}
