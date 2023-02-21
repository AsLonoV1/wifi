<?php

namespace App\Http\Controllers;

use App\Models\Chief;
use App\Models\Workman;
use App\Models\Director;
use App\Models\AbortChief;
use App\Models\AbortWorkman;
use Illuminate\Http\Request;

class ChiefController extends Controller
{
    public function   list()
    {
    return   Chief::where('status',0)->with('products')->get();  
    }

    public function   abortList()
    {
    return   Chief::where('status',1)->with('products')->get();  
    }

    public function show(Request $request)
    {
       return  Chief::where('id',$request->id)->with('products')->first(); 
    }

    public function  send(Request $request)
    {
        $chief =Chief::findOrFail($request->id);
        $director= new Director();
        $director->address=$chief->address;
        $director->company_name=$chief->company_name;
        $director->document_id=$chief->document_id;
        $director->save();
        $chief->delete();
        return 'Done send successfully';
    }
    
    public function  unsend(Request $request)
    {
        $chief =Chief::findOrFail($request->id);
        $workman= new Workman();
        $workman->id=$chief->document_id;
        $workman->address=$chief->address;
        $workman->company_name=$chief->company_name;
        $workman->comment=$request->comment;
        $workman->status=1;
        $workman->save();
        $chief->delete();
        return 'Done abort successfully';
    }
    

}
