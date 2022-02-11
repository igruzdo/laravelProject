<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;

class NewsController extends Controller
{
    private $news;

    public function __construct() {
        $this->news = new News();
    }

    public function index () {

    }

    public function showCategoryNews (int $incategory) {

        $catRelation = Category::findOrFail($incategory);       
        $categoryNews = $this->news->getNewsByCategory($incategory);
        
        return view('news/newsOfCategory', [
            'category' => $incategory,
            'allNews' => $categoryNews
        ]);
    }

    public function showNews (int $id) {
       $news = News::findOrFail($id);

        return view('news/showNews', [

            'news' => $news
        ]);
    }
}
