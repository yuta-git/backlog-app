<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubTask extends Model
{
  use HasFactory;

  protected $table = 'sub_tasks';

  protected $fillable = [
    'name',
    'content',
    'task_id',
  ];

  // 親タスクとのリレーション
  public function task()
  {
    return $this->belongsTo(Task::class);
  }
  
}