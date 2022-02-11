<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsParsingJob;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Resource;

class ParserController extends Controller
{
    public function __invoke(Request $request, Category $categories)
    {
        $urls = Resource::all('name')->toArray();
        dd($urls);

        foreach($urls as $url) {
            dispatch(new NewsParsingJob($url['name']));
        }
        echo "Parsing complete";
    }
}
