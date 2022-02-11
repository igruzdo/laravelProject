<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    public static $availableFields = ['id', 'title', 'description', 'image'];
    protected $fillable = [
        'title',
        'link',
        'image',
        'description'
    ];

    public function news():BelongsToMany {
        return $this->belongsToMany(News::class, 'categories_has_news', 'category_id', 'news_id');
        // return $this->belongsToMany(News::class, 'categories_has_news', 'news_id', 'category_id');
    }
}
