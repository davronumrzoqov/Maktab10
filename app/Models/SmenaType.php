<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmenaType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_uz',
        'name_ru',
    ];

    // Har bir smena turiga bir nechta schudeli bo‘lishi mumkin
    public function schudelis()
    {
        return $this->hasMany(Schudeli::class, 'smena_id');
    }
}
