<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ingatlans', function (Blueprint $table) {
            $table->id();
            $table->foreignId("kategoria")->references("id")->on("kategoria")->onDelete("cascade");
            $table->string("leiras");
            $table->date("hirdetesDatuma")->default(now());
            $table->boolean("tehermentes");
            $table->integer("ar");
            $table->string("kepUrl");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingatlans');
    }
};
