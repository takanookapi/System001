<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LaraveltemInfo
 * 
 * @property string $Key
 * @property string $Value
 * @property string|null $Description
 * @property Carbon $Created
 * @property string $CreatedBy
 * @property Carbon $Updated
 * @property string $UpdatedBy
 *
 * @package App\Models
 */
class LaraveltemInfo extends Model
{
	protected $table = 'laraveltemInfo';
	protected $primaryKey = 'Key';
	public $incrementing = false;
	public $timestamps = false;

	protected $dates = [
		'Created',
		'Updated'
	];

	protected $fillable = [
		'Value',
		'Description',
		'Created',
		'CreatedBy',
		'Updated',
		'UpdatedBy'
	];
}
