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
        Schema::create('overalls_logs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('raw_id')->unsigned()->index();
            $table->string('type');
            $table->date('term');
            $table->double('cost');
            $table->timestamp('updated_at')->useCurrent();
        });
        Schema::table('overalls_logs', function($table) {
            $table->foreign('raw_id')->references('id')->on('overalls');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('overalls_logs');
    }
};
