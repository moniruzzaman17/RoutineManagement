<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $primaryKey = 'entity_id';
    public $timestamps = false;
    protected $fillable = [
         'subject_code',
         'subject_name',
         'subject_description',
         'group_id',
    ];
    public function group() {
        return $this->belongsTo('App\Group','group_id','entity_id');
    }
}
