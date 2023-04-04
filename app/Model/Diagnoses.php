<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Diagnoses extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function diagnosis(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

}