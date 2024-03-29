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
    Schema::table('users', function (Blueprint $table) {
      $table->boolean('is_admin')->default(false);
    });

    Schema::table('students', function (Blueprint $table) {
      $table->unsignedInteger('user_id')->nullable();
      $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();
      ;
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('users', function (Blueprint $table) {
      $table->dropColumn('is_admin');
    });

    Schema::table('students', function (Blueprint $table) {
      $table->dropForeign(['user_id']);
      $table->dropColumn('user_id');
    });
  }
};
