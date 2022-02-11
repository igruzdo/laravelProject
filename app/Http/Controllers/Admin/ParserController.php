<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Parser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Illuminate\Support\Arr;
use App\Models\News;
use App\Models\Category;
use Illuminate\Support\Str;


class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Parser $service, Category $categories)
    {
        $urls =['https://news.yandex.ru/computers.rss', 'https://news.yandex.ru/sport.rss'];

       foreach($urls as $url) {
           $news = $service->setLink($url)->parse();

           $title = $news['title'];
           $newsList = $news['news'];
        //    dd($newsList);

           $categoryIsExisted = Category::query()->select()->where('title', $title)->get()->contains('title', $title);
        //    создаем категорию, если такой не существует
           if(!$categoryIsExisted) {
            $categoryCreated = Category::create([
                'title' =>  $title,
                'link' =>  $news['link'],
                'description' =>  $news['description'],
                'image' =>  $news['image'],
            ]);
            
           }

           foreach($newsList as $newsItem) {
                $newsItemIsExisted = News::query()->select()->where('title', $newsItem['title'])->get()->contains('title', $newsItem['title']);
        // создаем новости, если их не существует
                if(!$newsItemIsExisted) {
                    $data = $newsItem + [
                        'slug' => Str::slug($request->input('title'))
                    ];  
                    $created = News::create($data);
                    $category = Category::query()->select()->where('title', $title)->get();
                    $created->categories()->attach($category);
                }
           }
       }
    }
}
