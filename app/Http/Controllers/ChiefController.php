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
    return   Chief::where('status',0)->get();  
    }

    public function   abortList()
    {
    return   Chief::where('status',1)->get();  
    }

    public function show(Request $request)
    {
       return  Chief::where('id',$request->id)->first(); 
    }

    public function  send(Request $request)
    {
        $chief =Chief::findOrFail($request->id);
        $director= new Director();
        $director->address=$chief->address;
        $director->company_name=$chief->company_name;
        $director->product_title=$chief->product_title;
        $director->amout=$chief->amout;
        $director->count=$chief->count;
        $director->meter=$chief->meter;
        $director->save();
        $chief->delete();
        return 'Done send successfully';
    }
    
    public function  unsend(Request $request)
    {
        $chief =Chief::findOrFail($request->id);
        $workman= new Workman();
        $workman->address=$chief->address;
        $workman->company_name=$chief->company_name;
        $workman->product_title=$chief->product_title;
        $workman->amout=$chief->amout;
        $workman->count=$chief->count;
        $workman->meter=$chief->meter;
        $workman->comment=$request->comment;
        $workman->status=1;
        $workman->save();
        $chief->delete();
        return 'Done abort successfully';
    }
    

}
