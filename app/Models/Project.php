<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'content'
    ];

    /**
     * プロジェクト名で絞り込むようにクエリのスコープを設定
     */
    public function scopeSearch($query, $search)
    {
        if($search !== null){
            $search_split = mb_convert_kana($search, 's'); //全角スペースを半角に
            $search_split2 = preg_split('/[\s]+/', $search_split); //空白で区切る
            foreach($search_split2 as $value) {
                $query->where('name', 'like', '%' .$value. '%'); // WHERE句をキーワードの数分繰り返すとAND検索になる
            }
        }
        return $query;
    }
}
