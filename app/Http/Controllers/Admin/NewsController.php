<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\news\CreateRequest;
use App\Http\Requests\news\UpdateRequest;
use App\Models\Category;
use App\Models\News;
use App\Services\UploadService;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index()
    {       
        $news = News::with('categories')->paginate(10);

        return view('admin.news.index', [
            'newsList' => $news
        ]);
    }
    public function create()
    {
        
        $categories = Category::all();
        return view('admin.news.create', [
            'categories' => $categories
        ]);
    }

    public function store(CreateRequest $request)
    {
        $created = News::create( $request->validated());
        if($created) {
            foreach($request->input('categories') as $category) {
                $created->categories()->attach($category);
            }
            return redirect()->route('admin.news.index')->with('success', trans('messages.admin.news.created.success'));
        }
        return back()->with('error', trans('messages.admin.news.created.error'))->withInput();
    }

    public function show($id)
    {
        //
    }

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

    public function update(UpdateRequest $request, News $news)
    {
        $validated = $request->validated();
        
        if($request->hasFile('image')) {
            $validated['image'] = app(UploadService::class)->saveFile($request->file('image'));
        }
        $updated = $news->fill($validated)->save();
        if($updated) {
            $news->categories()->detach();
            $news->categories()->attach($request->input('categories'));
            return redirect()->route('admin.news.index')->with('success', trans('messages.admin.news.created.success'));
        }
        return back()->with('error', trans('messages.admin.news.created.error'))->withInput();
    }

    public function destroy(News $news)
    {
        try {
            $news->delete();
            return response()->json('ok');
        } catch (\Exception $th) {
            
            return response()->json('error', 400);
        }
        DB::table('categories_has_news')->where('news_id', $news->id)->delete();
        DB::table('news')->delete($news->id);

        return redirect()->route('admin.news.index')->with('success', 'Запись успешно удалена');

    }
}
