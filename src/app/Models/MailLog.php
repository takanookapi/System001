<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MailLog
 * 
 * @property int $MailLogID
 * @property string|null $MailFrom
 * @property string|null $MailTo
 * @property string|null $Subject
 * @property string|null $Body
 * @property Carbon|null $Created
 * @property string|null $CreatedBy
 *
 * @package App\Models
 */
class MailLog extends Model
{
	use SerializeDate;
	protected $table = 'MailLog';
	protected $primaryKey = 'MailLogID';
	public $timestamps = false;

	protected $dates = [
		'Created'
	];

	protected $fillable = [
		'MailFrom',
		'MailTo',
		'Subject',
		'Body',
		'Created',
		'CreatedBy'
	];
}
