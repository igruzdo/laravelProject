<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedback = Feedback::paginate(5);
        
        return view('admin.feedback.index', [
            'feedbackList' => $feedback
        ]);
    }

     public function create()
    {
        return view('admin.feedback.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => ['required', 'string', 'min:5']
        ]);
        $data = $request->only(['name', 'description']);

        $created = Feedback::create($data);

        if($created) {
            return redirect()->route('admin.feedback.index')->with('success', 'Запись успешно добавлена');
        }
        return back()->with('error', 'Ошибка добавления данных')->withInput();
    }

    public function show($id)
    {
        //
    }

    public function edit(Feedback $feedback)
    {
        return view('admin.feedback.edit', [
            'feedback' => $feedback
        ]);
    }

    public function update(Request $request, Feedback $feedback)
    {
        $request->validate([
            "name" => ['required', 'string', 'min:5']
        ]);

        $data = $request->only(['title', 'description']);

        $updated = $feedback->fill($data)->save();

        if($updated) {
            return redirect()->route('admin.feedback.index')->with('success', 'Запись успешно обновлена');
        }
        return back()->with('error', 'Ошибка обновления данных')->withInput();
    }

    public function destroy($id)
    {
        //
    }
}
