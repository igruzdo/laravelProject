<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    private $news;

    public function __construct() {
        $this->news = new News();
    }

    public function index () {

        $category = new Category();

        $categories = $category->getCategories();

        return view('news/index', [
            'categories' => $categories
        ]);
    }

    public function showCategoryNews (int $incategory) {

        
        $categoryNews = $this->news->getNewsByCategory($incategory);

        return view('news/newsOfCategory', [
            'category' => $incategory,
            'allNews' => $categoryNews
        ]);
    }

    public function showNews (int $id) {

        $news = $this->news->getNewsById($id)[0];
        return view('news/showNews', [

            'news' => $news
        ]);
    }
}
