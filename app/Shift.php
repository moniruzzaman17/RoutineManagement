<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    protected $primaryKey = 'entity_id';
    public $timestamps = false;
    protected $fillable = [
         'shift_name',
    ];

    public function periods() {
        return $this->hasMany('App\periods','shift_id','entity_id');
    }
}
