<?php

namespace App\Http\Controllers;

use App\Models\Sklad;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Http\Request;

class SkladController extends Controller
{

    public function   list()
    {
        return Sklad::limit(10)->get();
    }


    public function show(Request $request)
    {
        return Sklad::where('id', $request->id)->first();
    }


    public function create(Request $request)
    {
            $warehouse = new Sklad();
            $warehouse->code = $request->input('code');
            $warehouse->title = $request->input('title');
            $warehouse->type_id = $request->input('type_id');
        try {
            $warehouse->save();
        } catch (\Exception $e) {
            return response()->json(
                ['error' =>
                    [
                        'message' => $e->getMessage()
                    ]
                ]
            );
        }
        return response()->json(["success"=>"ok"]);

    }

    public function update(Request $request)
    {

        $sklad = Sklad::findOrFail($request->id);
        $sklad->update($request->all());
        return $sklad;

    }

    public function delete(Request $request)
    {
        $sklad = Sklad::findOrFail($request->id);
        $sklad->delete();
        return 'Sklad deleted';
    }


}
