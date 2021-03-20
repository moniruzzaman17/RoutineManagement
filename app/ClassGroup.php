<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassGroup extends Model
{
    protected $primaryKey = 'entity_id';
    public $timestamps = false;
    protected $fillable = [
         'class_id',
         'group_id',
    ];
    public function class() {
        return $this->belongsTo('App\ClassInfo','class_id','entity_id');
    }
    public function group() {
        return $this->belongsTo('App\Group','group_id','entity_id');
    }
}
