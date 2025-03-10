<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void//Crea las tabla anuncio con los campos
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('subject');
            $table->text('content');
            $table->decimal('price', 10, 2);
            //$table->string('image')->nullable(); 
            $table->timestamps();
        });
    }

    public function down(): void//Elimina la tabla anuncios
    {
        Schema::dropIfExists('ads');
    }
};
