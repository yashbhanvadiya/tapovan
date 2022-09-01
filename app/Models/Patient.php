<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function cities()
    {
        return $this->belongsTo('App\Models\City','city');
    }

    public function getPatientDisease()
    {
        return $this->hasMany('App\Models\PatientDisease', 'patient_id');
    }

    protected $dates = [ 'deleted_at' ];
}
