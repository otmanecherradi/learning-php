<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('students', function (Blueprint $table) {
      $table->id('pk');
      $table->string('first_name');
      $table->string('last_name');
      $table->enum('gender', ['MALE', 'FEMALE']);
      $table->unsignedBigInteger('branch_pk')->nullable();
      $table->foreign('branch_pk')->references('pk')->on('branches')->nullOnDelete();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('students');
  }
};
