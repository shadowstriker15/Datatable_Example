<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Civ extends Model
{
    // Primary Key
    public $primaryKey = 'id';

    // Disable timestamps
    public $timestamps = false;

    public function bonuses()
    {
        return $this->hasMany('App\Bonus', 'civ_id');
    }
}
