<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MemberClass
 * 
 * @property int $MemberClassID
 * @property string $Caption
 * @property string|null $Description
 * @property int $Priority
 * 
 * @property Collection|Member[] $members
 *
 * @package App\Models
 */
class MemberClass extends Model
{
	use SerializeDate;
	protected $table = 'MemberClass';
	protected $primaryKey = 'MemberClassID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'MemberClassID' => 'int',
		'Priority' => 'int'
	];

	protected $fillable = [
		'Caption',
		'Description',
		'Priority'
	];

	public function members()
	{
		return $this->hasMany(Member::class, 'MemberClassID');
	}
}
