<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('schudelis', function (Blueprint $table) {
            $table->unsignedBigInteger('smena_id')->after('id')->nullable();

            // Agar bu ustun boshqa jadvalga bog‘lanadigan bo‘lsa (masalan, smena_types)
            // foreign key qo‘shish tavsiya etiladi:
            // $table->foreign('smena_id')->references('id')->on('smena_types')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('schudelis', function (Blueprint $table) {
            $table->dropColumn('smena_id');
        });
    }
};


