<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;
use Cviebrock\EloquentSluggable\Sluggable;

class News extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'news';
    protected $joinTable = 'categories_has_news';
    protected $availableFields = ['title', 'author','link', 'image', 'status', 'description'];
    protected $fillable = [
        'title',
        'link',
        'slug',
        'author',
        'status',
        'image',
        'description'
    ];

    public function getNews() {
        return DB::table($this->table)->select($this->availableFields)->get()->toArray();
    }

    public function getNewsById(int $id) {
        return DB::table($this->table)->select($this->availableFields)->where('id', $id)->get()->toArray();
    }

    public function getNewsByCategory(int $category_id) {

        return DB::table($this->table)->join($this->joinTable, 'id', '=', 'news_id')->where('category_id', $category_id)->get()->toArray();
    }

    public function categories():BelongsToMany {
        return $this->belongsToMany(Category::class, 'categories_has_news', 'news_id', 'category_id');
    }

    public function sluggable():array {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
