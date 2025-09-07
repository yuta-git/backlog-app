<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::table('sub_tasks', function (Blueprint $table) {
      $table->dropForeign(['task_id']);
      $table->dropColumn('task_id');
    });
  }

  public function down(): void
  {
    Schema::table('sub_tasks', function (Blueprint $table) {
      $table->unsignedBigInteger('task_id')->after('content');
      $table->foreign('task_id')
        ->references('id')->on('tasks')
        ->onDelete('cascade');
    });
  }
};