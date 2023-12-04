<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return response()->json($products)->setStatusCode(200, 'OK');
    }

    public function create(Request $request) {
        $product = new Product($request->all());
        $product->save();
        return response()->json($product)->setStatusCode(201, 'CREATED');
    }

    public function update(Request $request, $id) {
        $product = Product::where('id', '=', $id)->first();
        if (isset($request->name)) {
            $product->name = $request->name;
        }
        if (isset($request->price)) {
            $product->price = $request->price;
        }
        if (isset($request->quantity)) {
            $product->quantity = $request->quantity;
        }
        if (isset($request->photo)) {
            $product->photo = $request->photo;
        }
        if (isset($request->description)) {
            $product->description = $request->description;
        }
        if (isset($request->category_id)) {
            $product->category_id = $request->category_id;
        }
        $product->save();
        return response()->json($product)->setStatusCode(200, 'OK');
    }

    public function delete($id) {
        $product = Product::where('id', '=', $id)->first();
        $product->delete();
        return response()->json('Объект удалён')->setStatusCode(200, 'OK');
    }

    public function view($id) {
        $product = Product::where('id', '=', $id)->first();
        return response()->json($product)->setStatusCode(200, 'OK');
    }
}
