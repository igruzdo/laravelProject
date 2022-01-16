<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index () {
        $category = $this->getCategories();

        return view('news/index', [
            'categories' => $category
        ]);
    }

    public function showCategoryNews (string $incategory) {

        $category = $this->getCategories($incategory);
        $categoryNews = $this->getNews();

        return view('news/newsOfCategory', [
            'category' => $category,
            'allNews' => $categoryNews
        ]);
    }

    public function showNews (int $id) {
        $news = $this->getNews($id);

        return view('news/showNews', [

            'news' => $news
        ]);
    }
}
