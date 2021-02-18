<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	use Sluggable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'title', 'body', 'iframe', 'image', 'user_id',
	];

	/**
	 * Return the sluggable configuration array for this model.
	 *
	 * @return array
	 */
	public function sluggable(): array
	{
		return [
			'slug' => [
				'source'             => 'title',
				'onUpdate'           => true,
				'separator'          => '-',
				'method'             => null,
				'unique'             => true,
				'uniqueSuffix'       => null,
				'includeTrashed'     => false,
				'reserved'           => null,
				'maxLength'          => null,
				'maxLengthKeepWords' => true,
				'slugEngineOptions'  => [],
				]
		];
	}

	public function user(){
		return $this->belongsTo(User::class);
	}

	public function getGetExcerptAttribute(){
		return substr($this->body, 0, 140);
	}

	public function getGetImageAttribute(){
		if($this->image)
			return url("storage/$this->image");
	}

}
