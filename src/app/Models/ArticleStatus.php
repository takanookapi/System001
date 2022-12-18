<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ArticleStatus
 * 
 * @property int $StatusID
 * @property string $Caption
 * @property string|null $Description
 * @property int $Priority
 * 
 * @property Collection|Article[] $articles
 *
 * @package App\Models
 */
class ArticleStatus extends Model
{
	use SerializeDate;
	protected $table = 'ArticleStatus';
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

	public function articles()
	{
		return $this->hasMany(Article::class, 'StatusID');
	}
}
