<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ArticleTag
 * 
 * @property int $ArticleID
 * @property int $TagID
 * 
 * @property Article $article
 * @property Tag $tag
 *
 * @package App\Models
 */
class ArticleTag extends Model
{
	use SerializeDate;
	protected $table = 'ArticleTag';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ArticleID' => 'int',
		'TagID' => 'int'
	];

	public function article()
	{
		return $this->belongsTo(Article::class, 'ArticleID');
	}

	public function tag()
	{
		return $this->belongsTo(Tag::class, 'TagID');
	}
}
