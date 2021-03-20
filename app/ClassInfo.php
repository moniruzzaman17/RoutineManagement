<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassInfo extends Model
{
    protected $primaryKey = 'entity_id';
    public $timestamps = false;
    protected $fillable = [
         'class_name',
         'class_num',
    ];

    public function sections() {
        return $this->hasMany('App\Section','class_id','entity_id');
    }
    public function classGroup() {
        return $this->hasMany('App\ClassGroup','class_id','entity_id');
    }
}
