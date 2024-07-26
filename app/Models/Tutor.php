<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'middlename',
        'lastname',
        'phone',
        'photo',
    ];

    public function children()
    {
        return $this->hasMany(Child::class);
    }
}
