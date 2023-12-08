<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return response()->json($users)->setStatusCode(200, 'OK');
    }

    public function create(UserRequest $request) {
        $user = new User($request->all());
        $user->save();
        return response()->json($user)->setStatusCode(201, 'CREATED');
    }

    public function update(UserRequest $request, $id) {
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

    public function login(LoginRequest $request) {
        $user = User::where($request->all())->first();

        if (!$user) {
            throw new ApiException(401, 'Авторизация провалена!');
        }
        else {
            Auth::login($user);
            return [
                'data' => [
                    'user_token' => Auth::user()->generateToken(),
                ]
            ];
        }
    }

    public function logout() {

    }
}
