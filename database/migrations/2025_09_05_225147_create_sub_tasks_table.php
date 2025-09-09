<?php

use App\Models\Task;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('sub_tasks', function (Blueprint $table) {
      $table->bigIncrements('id');

      //IDとNAMEの間のほうがDBを直接見たときに分かりやすい「このレコードが紐づいているタスクIDは何なのか？」
      $table->foreignIdFor(Task::class)
        ->constrained()
        ->onDelete('cascade');

      $table->string('name', 30);
      $table->text('content')->nullable();
      $table->timestamps();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('sub_tasks');
  }
};