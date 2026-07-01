<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('schudelis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lesson_id');
            $table->string('week_day');
            $table->string('room');
            $table->time('time');           // Qo‘shildi
            $table->string('image')->nullable(); // Qo‘shildi
            $table->string('file')->nullable();  // PDF fayl uchun
            $table->unsignedBigInteger('employee_id')->nullable(); // Agar kerak bo‘lsa
            $table->timestamps();
        });


    }

    public function down(): void
    {
        Schema::dropIfExists('schudelis');
    }
};
