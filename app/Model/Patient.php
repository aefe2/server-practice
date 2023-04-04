<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Patient extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'first_name',
        'last_name',
        'patronymic',
        'date_of_birth',
        'medcard_photo',
        'id_diagnosis'
    ];

    public function a(): HasMany
    {
        return $this->hasMany(Diagnoses::class);
    }
}
