<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        return view('forms.feedback');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => ['required', 'string', 'min:5']
        ]);
        $data = $request->only(['name', 'description']);

        $created = Feedback::create($data);

        if($created) {
            return redirect()->route('feedback.index')->with('success', 'Запись успешно добавлена');
        }
        return back()->with('error', 'Ошибка добавления данных')->withInput();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
