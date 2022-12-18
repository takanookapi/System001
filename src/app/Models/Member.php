<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Member
 * 
 * @property int $MemberID
 * @property string $MemberName
 * @property int $MemberClassID
 * @property string|null $LoginID
 * @property string|null $Password
 * @property string|null $Hash
 * @property string|null $PostalCode
 * @property string|null $Address
 * @property string|null $TelNo
 * @property string|null $Email
 * @property string|null $Image01
 * @property string|null $Image02
 * @property string|null $Description
 * @property int $StatusID
 * @property int $Priority
 * @property Carbon $Created
 * @property string $CreatedBy
 * @property Carbon $Updated
 * @property string $UpdatedBy
 * 
 * @property MemberClass $member_class
 * @property MemberStatus $member_status
 * @property Collection|Article[] $articles
 * @property Collection|ArticleCategory[] $article_categories
 * @property Collection|MemberLog[] $member_logs
 *
 * @package App\Models
 */
class Member extends Model
{
	use SerializeDate;
	protected $table = 'Member';
	protected $primaryKey = 'MemberID';
	public $timestamps = false;

	protected $casts = [
		'MemberClassID' => 'int',
		'StatusID' => 'int',
		'Priority' => 'int'
	];

	protected $dates = [
		'Created',
		'Updated'
	];

	protected $fillable = [
		'MemberName',
		'MemberClassID',
		'LoginID',
		'Password',
		'Hash',
		'PostalCode',
		'Address',
		'TelNo',
		'Email',
		'Image01',
		'Image02',
		'Description',
		'StatusID',
		'Priority',
		'Created',
		'CreatedBy',
		'Updated',
		'UpdatedBy'
	];

	public function member_class()
	{
		return $this->belongsTo(MemberClass::class, 'MemberClassID');
	}

	public function member_status()
	{
		return $this->belongsTo(MemberStatus::class, 'StatusID');
	}

	public function articles()
	{
		return $this->hasMany(Article::class, 'MemberID');
	}

	public function article_categories()
	{
		return $this->hasMany(ArticleCategory::class, 'MemberID');
	}

	public function member_logs()
	{
		return $this->hasMany(MemberLog::class, 'MemberID');
	}
}
