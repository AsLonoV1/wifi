<?php

namespace App\Http\Controllers;

use App\Models\Sklad;
use Illuminate\Http\Request;

class SkladController extends Controller
{
    
    public function   list()
    {
    return   Sklad::limit(10)->get();  
    }


    public function show(Request $request)
    {
       return  Sklad::where('id',$request->id)->first(); 
    }


    public function create(Request $request)
    {
      
        Sklad::create($request->all());
       return 'Sklad created successfully';

    }

    public function update(Request $request)
    {

        $sklad =Sklad::findOrFail($request->id);
        $sklad->update($request->all());
        return $sklad;
 
    }

    public function  delete(Request $request)
    {
        $sklad =Sklad::findOrFail($request->id);
        $sklad->delete();
        return 'Sklad deleted';
    }


    
}
