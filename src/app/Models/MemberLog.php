<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MemberLog
 * 
 * @property int $LogID
 * @property int|null $MemberID
 * @property string $Action
 * @property string|null $UserAgent
 * @property string|null $RemoteAddress
 * @property Carbon $Created
 * @property string $CreatedBy
 * 
 * @property Member|null $member
 *
 * @package App\Models
 */
class MemberLog extends Model
{
	use SerializeDate;
	protected $table = 'MemberLog';
	protected $primaryKey = 'LogID';
	public $timestamps = false;

	protected $casts = [
		'MemberID' => 'int'
	];

	protected $dates = [
		'Created'
	];

	protected $fillable = [
		'MemberID',
		'Action',
		'UserAgent',
		'RemoteAddress',
		'Created',
		'CreatedBy'
	];

	public function member()
	{
		return $this->belongsTo(Member::class, 'MemberID');
	}
}
