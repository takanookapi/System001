<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ArticleCategory
 * 
 * @property int $ArticleCategory
 * @property int $ArticleClassID
 * @property string $Caption
 * @property int|null $MemberID
 * @property string|null $Image01
 * @property string|null $Description
 * @property int $StatusID
 * @property int $Priority
 * @property Carbon $Created
 * @property string $CreatedBy
 * @property Carbon $Updated
 * @property string $UpdatedBy
 * 
 * @property ArticleCategoryStatus $article_category_status
 * @property ArticleClass $article_class
 * @property Member|null $member
 * @property Collection|Article[] $articles
 *
 * @package App\Models
 */
class ArticleCategory extends Model
{
	use SerializeDate;
	protected $table = 'ArticleCategory';
	protected $primaryKey = 'ArticleCategory';
	public $timestamps = false;

	protected $casts = [
		'ArticleClassID' => 'int',
		'MemberID' => 'int',
		'StatusID' => 'int',
		'Priority' => 'int'
	];

	protected $dates = [
		'Created',
		'Updated'
	];

	protected $fillable = [
		'ArticleClassID',
		'Caption',
		'MemberID',
		'Image01',
		'Description',
		'StatusID',
		'Priority',
		'Created',
		'CreatedBy',
		'Updated',
		'UpdatedBy'
	];

	public function article_category_status()
	{
		return $this->belongsTo(ArticleCategoryStatus::class, 'StatusID');
	}

	public function article_class()
	{
		return $this->belongsTo(ArticleClass::class, 'ArticleClassID');
	}

	public function member()
	{
		return $this->belongsTo(Member::class, 'MemberID');
	}

	public function articles()
	{
		return $this->hasMany(Article::class, 'ArticleCategoryID');
	}
}
