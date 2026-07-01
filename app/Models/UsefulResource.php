<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsefulResource extends Model
{
    use HasFactory;

    protected $table = 'useful_resources'; // jadval nomi

    protected $fillable = [
        'title_uz',
        'title_ru',
        'body_uz',
        'body_ru',
        'image',
        'url',
        'qr_code',
    ];
}
