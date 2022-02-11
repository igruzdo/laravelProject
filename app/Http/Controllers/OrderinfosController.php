<?php

namespace App\Http\Controllers;

use App\Models\Orderinfos;
use Illuminate\Http\Request;

class OrderinfosController extends Controller
{
    public function index()
    {
        return view('forms/orderinfo');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {      
        $data = $request->only(['name', 'phone', 'email', 'description']);

        $created = Orderinfos::create($data);

        if($created) {
            return redirect()->route('orderinfo.index')->with('success', 'Запись успешно добавлена');
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
