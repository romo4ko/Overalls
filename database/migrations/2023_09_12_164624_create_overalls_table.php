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
        Schema::create('overalls', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->date('term');
            $table->double('cost');
        });

        Schema::table('overalls', function (Blueprint $table) {
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('overalls', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::dropIfExists('overalls');
    }
};
