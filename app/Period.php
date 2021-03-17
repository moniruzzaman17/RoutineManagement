<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    protected $primaryKey = 'entity_id';
    public $timestamps = false;
    protected $fillable = [
         'period_name',
         'shift_id',
         'start_time',
         'end_time',
         'remarks',
    ];

    public function shift() {
        return $this->belongsTo('App\Shift','shift_id','entity_id');
    }
}
