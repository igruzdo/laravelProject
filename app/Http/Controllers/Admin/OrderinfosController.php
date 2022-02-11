<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orderinfos;
use Illuminate\Http\Request;

class OrderinfosController extends Controller
{
    public function index()
    {
        $orderinfo = Orderinfos::paginate(5);
        
        return view('admin.orderinfos.index', [
            'orderinfos' => $orderinfo
        ]);
    
    }

     public function create()
    {
        return view('admin.orderinfos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => ['required', 'string', 'min:5']
        ]);
        $data = $request->only(['name','phone', 'email', 'description']);
        $created = Orderinfos::create($data);
        if($created) {
            return redirect()->route('admin.orderinfos.index')->with('success', 'Запись успешно добавлена');
        }
        return back()->with('error', 'Ошибка добавления данных')->withInput();
    }

    public function show($id)
    {
        //
    }

    public function edit(Orderinfos $orderinfo)
    {
        return view('admin.orderinfos.edit', [
            'orderinfo' => $orderinfo
        ]);
    }

    public function update(Request $request, Orderinfos $orderinfo)
    {
        $request->validate([
            "name" => ['required', 'string', 'min:5']
        ]);

        $data = $request->only(['name','phone', 'email', 'description']);
        $updated = $orderinfo->fill($data)->save();
        if($updated) {
            return redirect()->route('admin.orderinfos.index')->with('success', 'Запись успешно обновлена');
        }
        return back()->with('error', 'Ошибка обновления данных')->withInput();
    }

    public function destroy($id)
    {
        //
    }
}
