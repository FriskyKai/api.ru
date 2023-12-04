<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return response()->json($users)->setStatusCode(200, 'OK');
    }

    public function create(Request $request) {
        $user = new User($request->all());
        $user->save();
        return response()->json($user)->setStatusCode(201, 'CREATED');
    }

    public function update(Request $request, $id) {
        $user = User::where('id', '=', $id)->first();
        if (isset($request->surname)) {
            $user->surname = $request->surname;
        }
        if (isset($request->name)) {
            $user->name = $request->name;
        }
        if (isset($request->patronymic)) {
            $user->patronymic = $request->patronymic;
        }
        if (isset($request->sex)) {
            $user->sex = $request->sex;
        }
        if (isset($request->birth)) {
            $user->birth = $request->birth;
        }
        if (isset($request->login)) {
            $user->login = $request->login;
        }
        if (isset($request->password)) {
            $user->password = $request->password;
        }
        if (isset($request->email)) {
            $user->email = $request->email;
        }
        $user->save();
        return response()->json($user)->setStatusCode(200, 'OK');
    }

    public function delete($id) {
        $role = User::where('id', '=', $id)->first();
        $role->delete();
        return response()->json('Объект удалён')->setStatusCode(200, 'OK');
    }

    public function view($id) {
        $role = User::where('id', '=', $id)->first();
        return response()->json($role)->setStatusCode(200, 'OK');
    }
}
