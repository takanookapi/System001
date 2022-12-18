<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ArticleCategoryStatus
 * 
 * @property int $StatusID
 * @property string $Caption
 * @property string|null $Description
 * @property int $Priority
 * 
 * @property Collection|ArticleCategory[] $article_categories
 *
 * @package App\Models
 */
class ArticleCategoryStatus extends Model
{
	use SerializeDate;
	protected $table = 'ArticleCategoryStatus';
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

	public function article_categories()
	{
		return $this->hasMany(ArticleCategory::class, 'StatusID');
	}
}
