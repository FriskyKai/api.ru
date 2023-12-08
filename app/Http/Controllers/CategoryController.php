<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return response()->json($categories)->setStatusCode(200, 'OK');
    }

    public function create(CategoryRequest $request) {
        $category = new Category($request->all());
        $category->save();
        return response()->json($category)->setStatusCode(201, 'CREATED');
    }

    public function update(CategoryRequest $request, $id) {
        $category = Category::where('id', '=', $id)->first();
        if (isset($request->name)) {
            $category->name = $request->name;
        }
        $category->save();
        return response()->json($category)->setStatusCode(200, 'OK');
    }

    public function delete($id) {
        $category = Category::where('id', '=', $id)->first();
        $category->delete();
        return response()->json('Объект удалён')->setStatusCode(200, 'OK');
    }

    public function view($id) {
        $category = Category::where('id', '=', $id)->first();
        return response()->json($category)->setStatusCode(200, 'OK');
    }
}
