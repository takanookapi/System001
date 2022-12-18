<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MemberStatus
 * 
 * @property int $StatusID
 * @property string $Caption
 * @property string|null $Description
 * @property int $Priority
 * 
 * @property Collection|Member[] $members
 *
 * @package App\Models
 */
class MemberStatus extends Model
{
	use SerializeDate;
	protected $table = 'MemberStatus';
	protected $primaryKey = 'StatusID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'StatusID' => 'int',
		'Priority' => 'int'
	];

	protected $fillable = [
		'Caption',
		'Description',
		'Priority'
	];

	public function members()
	{
		return $this->hasMany(Member::class, 'StatusID');
	}
}
