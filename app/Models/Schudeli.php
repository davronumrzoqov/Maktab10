<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schudeli extends Model
{
    use HasFactory;

    protected $fillable = [
        'smena_id',
        'lesson_id',
        'week_day',
        'time',
        'room',
        'file', // fayl uchun maydon
    ];

    // Har bir schudeli qaysi smenaga tegishli
    public function smena()
    {
        return $this->belongsTo(SmenaType::class, 'smena_id');
    }

    // Har bir schudeli qaysi darsga tegishli
    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }
}
