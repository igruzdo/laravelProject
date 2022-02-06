<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $news = News::with('categories')->paginate(10);
        
        return view('admin.news.index', [
            'newsList' => $news
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $categories = Category::all();
        return view('admin.news.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $request->validate([
            "title" => ['required', 'string', 'min:5']
        ]);
        $data = $request->only(['title', 'data', 'status', 'author',  'description']) + [
            'slug' => Str::slug($request->input('title'))
        ];

        $created = News::create($data);

        if($created) {
            foreach($request->input('categories') as $category) {
                // DB::table('categories_has_news')->insert([
                //     'category_id' => intval($category),
                //     'news_id' => $created->id
                // ]);
                $created->categories()->attach($category);
            }
            return redirect()->route('admin.news.index')->with('success', 'Запись успешно добавлена');
        }
        return back()->with('error', 'Ошибка добавления данных')->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        
        $categories = Category::all();
        $selectCategories = DB::table('categories_has_news')->where('news_id', '=', $news->id)->get()->map(fn($item) => $item->category_id)->toArray();

        return view('admin.news.edit', [
            'news' => $news,
            'categories' => $categories,
            'selectCategories' => $selectCategories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        
        $request->validate([
            "title" => ['required', 'string', 'min:5']
        ]);
        $data = $request->only(['title', 'data', 'status', 'description']) + [
            'slug' => Str::slug($request->input('title'))
        ];

        $updated = $news->fill($data)->save();

        if($updated) {
            DB::table('categories_has_news')->where('news_id', $news->id)->delete();

            foreach($request->input('categories') as $category) {
                DB::table('categories_has_news')->insert([
                    'category_id' => intval($category),
                    'news_id' => $news->id
                ]);
            }
            return redirect()->route('admin.news.index')->with('success', 'Запись успешно обновлена');
        }
        return back()->with('error', 'Ошибка обновления данных')->withInput();

    }

    public function destroy(News $news)
    {

        DB::table('categories_has_news')->where('news_id', $news->id)->delete();
        DB::table('news')->delete($news->id);

        return redirect()->route('admin.news.index')->with('success', 'Запись успешно удалена');

    }
}
