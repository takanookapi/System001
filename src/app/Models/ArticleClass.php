<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ArticleClass
 * 
 * @property int $ArticleClassID
 * @property string $Caption
 * @property string|null $Description
 * @property string $Priority
 * 
 * @property Collection|ArticleCategory[] $article_categories
 *
 * @package App\Models
 */
class ArticleClass extends Model
{
	use SerializeDate;
	protected $table = 'ArticleClass';
	protected $primaryKey = 'ArticleClassID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ArticleClassID' => 'int'
	];

	protected $fillable = [
		'Caption',
		'Description',
		'Priority'
	];

	public function article_categories()
	{
		return $this->hasMany(ArticleCategory::class, 'ArticleClassID');
	}
}
