<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    public static $availableFields = ['id', 'title', 'description'];
    protected $fillable = [
        'title',
        'description'
    ];

    public function getCategories() {
        return DB::table($this->table)->select($this->availableFields)->get()->toArray();
    }

    public function getCategoryById(int $id) {

        return DB::table($this->table)->where('id', '=', $id)->get();
    }
}
