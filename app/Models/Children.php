<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Children extends Model
{
    use HasFactory;

    protected $fillable = [
        'tutor_id',
        'name',
        'middlename',
        'lastname',
        'birthdate',
        'photo',
        'gender',
        'height',
        'weight',
        'description',
    ];

    public function tutor()
    {
        return $this->belongsTo(Tutor::class);
    }
}
