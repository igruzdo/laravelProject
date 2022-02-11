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

        // $category = new Category();

        // $categories = $category->getCategories();
        // $categories = Category::query()->select(Category::$availableFields)->get();

        // return view('news/index', [
        //     'categories' => $categories
        // ]);
    }

    public function showCategoryNews (int $incategory) {

        $catRelation = Category::findOrFail($incategory);      
        
        $categoryNews = $this->news->getNewsByCategory($incategory);
        

        // $categoryNews = News::findOrFail($incategory);

        // dd($categoryNews['#attributes']);

        return view('news/newsOfCategory', [
            'category' => $incategory,
            'allNews' => $categoryNews
        ]);
    }

    public function showNews (int $id) {

        

        $news = News::findOrFail($id);

        // dd($news->categories);

        return view('news/showNews', [

            'news' => $news
        ]);
    }
}
