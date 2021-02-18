<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	use Sluggable;

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

}
