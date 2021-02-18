<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MediaGallery extends Model
{
	protected $primaryKey = 'entity_id';
	protected $fillable = [
		'name',
		'value',
		'media_type',
		'position',
		'url',
		'visibility_status',
	];
}
