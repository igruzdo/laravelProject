<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\resource\CreateRequest;
use App\Http\Requests\resource\UpdateRequest;
use App\Models\Resource;

class ResourceController extends Controller
{
    public function index()
    {
        $resource = Resource::paginate(10);
        
        return view('admin.resource.index', [
            'resourceList' => $resource
        ]);
    }

    public function create()
    {
        return view('admin.resource.create');
    }

    public function store(CreateRequest $request)
    {
        $created = Resource::create( $request->validated());
        if($created) {
            return redirect()->route('admin.resource.index')->with('success', trans('messages.admin.resource.created.success'));
        }
        return back()->with('error', trans('messages.admin.resource.created.error'))->withInput();
    }

    public function show($id)
    {
        //
    }

    public function edit(Resource $resource)
    {
        return view('admin.resource.edit', [
            'resource' => $resource
        ]);
    }

    public function update(UpdateRequest $request, Resource $resource)
    {
        $validated = $request->validated();
        $updated = $resource->fill($validated)->save();
        if($updated) {
            return redirect()->route('admin.resource.index')->with('success', trans('messages.admin.resource.created.success'));
        }
        return back()->with('error', trans('messages.admin.resource.created.error'))->withInput();
    }

    public function destroy(Resource $resource)
    {
        try {
            $resource->delete();
            return response()->json('ok');
        } catch (\Exception $th) {
            
            return response()->json('error', 400);
        }
        return redirect()->route('admin.resource.index')->with('success', 'Запись успешно удалена');
    }
}
