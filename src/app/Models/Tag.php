<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tag
 * 
 * @property int $TagID
 * @property string $TagName
 * @property int $Priority
 * @property Carbon $Created
 * @property string $CreatedBy
 * @property Carbon $Updated
 * @property string $UpdatedBy
 * 
 * @property Collection|Article[] $articles
 *
 * @package App\Models
 */
class Tag extends Model
{
	use SerializeDate;
	protected $table = 'Tag';
	protected $primaryKey = 'TagID';
	public $timestamps = false;

	protected $casts = [
		'Priority' => 'int'
	];

	protected $dates = [
		'Created',
		'Updated'
	];

	protected $fillable = [
		'TagName',
		'Priority',
		'Created',
		'CreatedBy',
		'Updated',
		'UpdatedBy'
	];

	public function articles()
	{
		return $this->belongsToMany(Article::class, 'ArticleTag', 'TagID', 'ArticleID');
	}
}
