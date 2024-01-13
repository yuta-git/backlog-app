<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'deadline',
        'content',
        'user_id',
        'project_id',
    ];

    /**
     * プロジェクト名で絞り込むようにクエリのスコープを設定
     */
    public function scopeSearch($query, $search)
    {
        $converted = $this->convertFullToHalfWidth($search);
        foreach ($this->splitSpaceToArray($converted) as $value) {
            $query->where('name', 'like', '%' . $value . '%'); // WHERE句をキーワードの数分繰り返すとAND検索になる
        }

        return $query;
    }

    public function convertFullToHalfWidth($word): string
    {
        return mb_convert_kana($word, 's');
    }

    public function splitSpaceToArray(string $word): array
    {
        if (!$word) {
            return [];
        }
        return preg_split('/[\s]+/', $word);
    }
}
