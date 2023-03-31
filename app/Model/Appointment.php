<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'appointment_date',
        'appointment_time',
        'id_doctor',
        'id_medcard',
        'id_diagnosis',
        'id_cabinet',
    ];
}
