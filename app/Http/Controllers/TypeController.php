<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{

    public function   list()
    {
        return Type::limit(10)->get();
    }


    public function create(Request $request)
    {

        Type::create($request->all());
        return response()->json(['success'=>'ok']);

    }

    public function update(Request $request)
    {

        $type = Type::findOrFail($request->id);
        $type->update($request->all());
        return $type;

    }

    public function delete(Request $request)
    {
        $type = Type::findOrFail($request->id);
        $type->delete();
        return 'type deleted';
    }

}
