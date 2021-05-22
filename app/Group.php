<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $primaryKey = 'entity_id';
    public $timestamps = false;
    protected $fillable = [
         'group_name',
    ];
    public function classGroup() {
        return $this->hasMany('App\ClassGroup','group_id','entity_id');
    }

    public function groupSubject() {
        return $this->hasMany('App\Subject','group_id','entity_id');
    }
}
