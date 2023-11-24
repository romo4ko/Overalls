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
        Schema::create('receiving_logs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('raw_id')->unsigned()->index();
            $table->bigInteger('employer_id')->unsigned()->index();
            $table->bigInteger('overall_id')->unsigned()->index();
            $table->timestamp('updated_at')->useCurrent();
        });
        Schema::table('receiving_logs', function($table) {
            $table->foreign('raw_id')->references('id')->on('receiving');
            $table->foreign('employer_id')->references('id')->on('employers');
            $table->foreign('overall_id')->references('id')->on('overalls');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receiving_logs');
    }
};
