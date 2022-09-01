<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientTreatments extends Model
{
    use HasFactory;

    public function getPatientName()
    {
        return $this->hasOne('App\Models\Patient', 'id', 'patient_id');
    }
}
