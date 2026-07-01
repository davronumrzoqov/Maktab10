<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('useful_resources', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('title_uz');
            $table->string('title_ru');
            $table->longText('body_uz'); // 🔄 string o‘rniga longText
            $table->longText('body_ru'); // 🔄 string o‘rniga longText
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::table('useful_resources', function (Blueprint $table) {
            $table->string('body_uz', 255)->change();
            $table->string('body_ru', 255)->change();
        });
    }
};
