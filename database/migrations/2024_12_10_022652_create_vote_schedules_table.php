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
        Schema::create('vote_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->json('candidates_ids');
            $table->dateTime('start');
            $table->dateTime('end');

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vote_schedules');
    }
};
