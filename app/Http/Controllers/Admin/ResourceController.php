<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{

    public function index()
    {
        return view('admin.resource.index', [
            'resources' => Resource::query()
                ->orderBy('created_at', 'DESC')
                ->paginate(6)
        ]);
    }

    public function create(Resource $resource)
    {
        return view('admin.resource.create', [
            'resource' => $resource,
        ]);
    }

    public function store(Request $request, Resource $resource)
    {

        $this->validate($request, $this->validateRulesOnChange(), $this->messagesOnChange(), $this->attributesOnChange());

        $request->flash();

        try {
            $resource->fill($request->all());
            $resource->save();
        }catch (\Exception $e) {
            if(str_contains($e->getMessage(), 'Duplicate entry \'http')) {
                return redirect()->route('admin.resource.create', $resource)->with('error', 'Ресурс c таким URL существует');
            }
            return redirect()->route('admin.resource.create', $resource)->with('error', 'Ресурс c таким названием уже существует');
        }


        return redirect()->route('admin.resource.index')->with('success', 'Ресурс добавлен');
    }

    public function update(Request $request, Resource $resource)
    {
        $this->validate($request, $this->validateRulesOnChange(), $this->messagesOnChange(), $this->attributesOnChange());

        $request->flash();

        try {
            $resource->fill($request->all());
            $resource->save();
        }catch (\Exception $e) {
            if(str_contains($e->getMessage(), 'Duplicate entry \'http')) {
                return redirect()->route('admin.resource.create', $resource)->with('error', 'Ресурс c таким URL существует');
            }
            return redirect()->route('admin.resource.create', $resource)->with('error', 'Ресурс c таким названием уже существует');
        }


        return redirect()->route('admin.resource.edit', $resource)->with('success', 'Ресурс изменён');
    }

    public function edit(Resource $resource)
    {
        return view('admin.resource.create', [
            'resource' => $resource,
        ]);
    }

    public function destroy(Resource $resource)
    {
        $resource->delete();
        return redirect()->route('admin.resource.index')->with('success', 'Ресурс удалён');
    }

//Валидация
    public function validateRulesOnChange()
    {
        return [
            'title' => 'required|string|min:5|max:50',
            'url' => 'required|url',
        ];
    }

    public function messagesOnChange()
    {
        return [
            'title.required' => 'Ты забыл заполнить :attribute',
            'title.min' => 'Мало символов в поле :attribute',
            'title.max' => 'Много символов в поле :attribute',
            'url.required' => 'Ты забыл заполнить :attribute',
            'url.url' => 'Поле :attribute не валидно'
        ];
    }

    public function attributesOnChange()
    {
        return [
            'title' => 'Название ресурса',
            'url' => 'URL ресурса',
        ];
    }
}
