<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pasutijumu_produkti', function (Blueprint $table) {
            $table->id();

            $table->foreignId('pasutijums_id')
                ->constrained('pasutijumi')
                ->cascadeOnDelete();

            $table->string('nosaukums');
            $table->decimal('cena', 8, 2);
            $table->integer('daudzums');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pasutijumu_produkti');
    }
};
