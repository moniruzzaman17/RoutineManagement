<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    protected $primaryKey = 'entity_id';
    protected $fillable = [
         'shift_name',
    ];
}
