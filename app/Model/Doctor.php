<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'last_name',
        'first_name',
        'patronymic',
        'date_of_birth',
        'position',
        'id_specialization'
    ];
}
