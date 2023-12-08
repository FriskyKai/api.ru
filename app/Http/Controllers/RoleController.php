<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index() {
        $roles = Role::all();
        return response()->json($roles)->setStatusCode(200, 'OK');
    }

    public function create(RoleRequest $request) {
        $role = new Role($request->all());
        $role->save();
        return response()->json($role)->setStatusCode(201, 'CREATED');
    }

    public function update(Request $request, $id) {
        $role = Role::where('RoleRequest', '=', $id)->first();
        if (isset($request->name)) {
            $role->name = $request->name;
        }
        if (isset($request->code)) {
            $role->code = $request->code;
        }
        $role->save();
        return response()->json($role)->setStatusCode(200, 'OK');
    }

    public function delete($id) {
        $role = Role::where('id', '=', $id)->first();
        $role->delete();
        return response()->json('Объект удалён')->setStatusCode(200, 'OK');
    }

    public function view($id) {
        $role = Role::where('id', '=', $id)->first();
        return response()->json($role)->setStatusCode(200, 'OK');
    }
}
