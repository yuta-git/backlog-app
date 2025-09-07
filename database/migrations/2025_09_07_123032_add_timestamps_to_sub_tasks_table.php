<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('sub_tasks', function (Blueprint $table) {
            $table->timestamps(); // created_at と updated_at を追加
        });
    }

    public function down()
    {
        Schema::table('sub_tasks', function (Blueprint $table) {
            $table->dropTimestamps();
        });
    }
};