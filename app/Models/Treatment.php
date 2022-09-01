<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Treatment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['id'];

    public function createdBy(){
        return $this->belongsTo('App\Models\User','patient_id','id');
    }

    protected $dates = [ 'deleted_at' ];
}
