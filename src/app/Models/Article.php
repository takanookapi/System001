<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Article
 * 
 * @property int $ArticleID
 * @property int $ArticleCategoryID
 * @property string $Caption
 * @property int|null $MemberID
 * @property Carbon|null $DisplayFrom
 * @property Carbon|null $DisplayTo
 * @property string|null $LinkURL
 * @property string|null $LinkCaption
 * @property string|null $Image01
 * @property string|null $Image02
 * @property string|null $Image03
 * @property string|null $Image04
 * @property string|null $Image05
 * @property string|null $Description
 * @property int $StatusID
 * @property int $Priority
 * @property Carbon $Created
 * @property string $CreatedBy
 * @property Carbon $Updated
 * @property string $UpdatedBy
 * 
 * @property ArticleCategory $article_category
 * @property ArticleStatus $article_status
 * @property Member|null $member
 * @property Collection|Tag[] $tags
 *
 * @package App\Models
 */
class Article extends Model
{
	use SerializeDate;
	protected $table = 'Article';
	protected $primaryKey = 'ArticleID';
	public $timestamps = false;

	protected $casts = [
		'ArticleCategoryID' => 'int',
		'MemberID' => 'int',
		'StatusID' => 'int',
		'Priority' => 'int'
	];

	protected $dates = [
		'DisplayFrom',
		'DisplayTo',
		'Created',
		'Updated'
	];

	protected $fillable = [
		'ArticleCategoryID',
		'Caption',
		'MemberID',
		'DisplayFrom',
		'DisplayTo',
		'LinkURL',
		'LinkCaption',
		'Image01',
		'Image02',
		'Image03',
		'Image04',
		'Image05',
		'Description',
		'StatusID',
		'Priority',
		'Created',
		'CreatedBy',
		'Updated',
		'UpdatedBy'
	];

	public function article_category()
	{
		return $this->belongsTo(ArticleCategory::class, 'ArticleCategoryID');
	}

	public function article_status()
	{
		return $this->belongsTo(ArticleStatus::class, 'StatusID');
	}

	public function member()
	{
		return $this->belongsTo(Member::class, 'MemberID');
	}

	public function tags()
	{
		return $this->belongsToMany(Tag::class, 'ArticleTag', 'ArticleID', 'TagID');
	}
}
