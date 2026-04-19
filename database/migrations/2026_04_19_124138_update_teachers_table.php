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
    Schema::table('teachers', function (Blueprint $table) {
        $table->string('subject');
        $table->integer('experience');
        $table->float('hourly_rate');
        $table->text('bio')->nullable();
        $table->enum('status', ['pending', 'approved'])->default('pending');
        $table->string('cv_path')->nullable();
        $table->string('certificate_path')->nullable();
        $table->string('diploma_path')->nullable();
        $table->string('id_card_path')->nullable();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
