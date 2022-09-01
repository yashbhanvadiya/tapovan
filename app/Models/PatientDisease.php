<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientDisease extends Model
{
    use HasFactory;

    public function getDisease()
    {
        return $this->belongsTo('App\Models\Disease', 'disease_id');
    }

}
