<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chequeo extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
    public function doctor_logueado()
    {
        return $this->belongsTo(User::class, 'doctor');
    }
}
