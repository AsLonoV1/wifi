<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{


    public function list(Request $request)
    {
        return User::pagination($request->per_page ?: 10)->get();
    }


    public function show($id)
    {
        return User::where('id', $id)->first();
    }


    public function create(Request $request)
    {
        //requestga ko'chirish kerak
        $user = new User();
        $user->name = $request->name;
        $user->role_id = $request->role_id;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->sinior_id = $request->sinior_id;
        $user->skilad_id = $request->skilad_id;
        $user->password = bcrypt($request->password);
        try {
            $user->save();
            return response()->json(['success'=>'ok']);
        }catch (QueryException $e){
            return response()->json(['error'=>['message'=>$e->getMessage()]],400);
        }
    }

    public function update(Request $request)
    {

        $user = User::findOrFail($request->id);
        if (!is_null($request->name)) $user->name = $request->name;
        if ($request->role_id != null) $user->role_id = $request->role_id;
        if ($request->email != null) $user->email = $request->email;
        if ($request->phone != null) $user->phone = $request->phone;
        if (!is_null($request->sinior_id)) $user->sinior_id = $request->sinior_id;
        if (!is_null($request->skilad_id)) $user->skilad_id = $request->skilad_id;
        if ($request->password != null) $user->password = bcrypt($request->password);
        try {
            $user->save();
        }catch (QueryException $exception){
            //errorni qaytarish kerak
        }
        //jsonda qaytarish kerak
        return $user;

    }

    public function delete(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->delete();
        return 'User deleted';
    }

}
