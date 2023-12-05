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
        Schema::create('enrolment', function (Blueprint $table) {
            $table->id();
            $table->date('dateEnrolment');
            $table->float('grade');
            $table->unsignedBigInteger('fk_student');
            $table->unsignedBigInteger('fk_class');
            $table->foreign('fk_student')->references('id')->on('users');
            $table->foreign('fk_class')->references('id')->on('classes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrolment');
    }
};
