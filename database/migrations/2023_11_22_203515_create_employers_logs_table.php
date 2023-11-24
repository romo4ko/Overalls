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
        Schema::create('employers_logs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('raw_id')->unsigned()->index();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('job');
            $table->bigInteger('workshop_id')->unsigned()->index();
            $table->integer('sale');
            $table->timestamp('updated_at')->useCurrent();
        });
        Schema::table('employers_logs', function($table) {
            $table->foreign('raw_id')->references('id')->on('employers');
            $table->foreign('workshop_id')->references('id')->on('workshops');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employers_logs');
    }
};
