<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $primaryKey = 'entity_id';
    public $timestamps = false;
    protected $fillable = [
         'section_name',
         'class_id',
    ];

    public function class() {
        return $this->belongsTo('App\ClassInfo','class_id','entity_id');
    }
}
