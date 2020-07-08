<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    // Primary Key
    public $primaryKey = 'id';

    // Disable timestamps
    public $timestamps = false;

    public function civ()
    {
        return $this->belongsTo('App\Civ');
    }
}
