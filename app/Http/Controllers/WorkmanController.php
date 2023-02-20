<?php

namespace App\Http\Controllers;

use App\Models\Chief;
use App\Models\Workman;
use App\Models\AbortWorkman;
use Illuminate\Http\Request;

class WorkmanController extends Controller
{
    public function   list()
    {
    return   Workman::where('status',0)->get();  
    }

    public function   abortList()
    {
    return   Workman::where('status',1)->get();  
    }

    public function show(Request $request)
    {
       return  Workman::where('id',$request->id)->first(); 
    }

    public function create(Request $request)
    {
      
        Workman::create($request->all());
       return 'Document created successfully';

    }

    public function  delete(Request $request)
    {
        $workman =Workman::findOrFail($request->id);
        $workman->delete();
        return 'Document deleted';
    }

    public function  send(Request $request)
    {
        $workman =Workman::findOrFail($request->id);
        $chief= new Chief();
        $chief->address=$workman->address;
        $chief->company_name=$workman->company_name;
        $chief->product_title=$workman->product_title;
        $chief->amout=$workman->amout;
        $chief->count=$workman->count;
        $chief->meter=$workman->meter;
        $chief->save();
        $workman->delete();
        return 'Done send successfully';
    }
    

}
