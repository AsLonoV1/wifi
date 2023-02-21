<?php

namespace App\Http\Controllers;

use App\Models\Chief;
use App\Models\Bugalter;
use App\Models\Director;
use App\Models\AbortChief;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    public function   list()
    {
    return   Director::limit(10)->with('products')->get();  
    }

    public function show(Request $request)
    {
       return  Director::where('id',$request->id)->with('products')->first(); 
    }

    public function  send(Request $request)
    {
        $director =Director::findOrFail($request->id);
        $bugalter= new Bugalter();
        $bugalter->document_id=$director->document_id;
        $bugalter->address=$director->address;
        $bugalter->company_name=$director->company_name;
        $bugalter->save();
        $director->delete();
        return 'Done send successfully';
    }

    
    public function  unsend(Request $request)
    {
        $director =Director::findOrFail($request->id);
        $chief= new Chief();
        $chief->document_id=$director->document_id;
        $chief->address=$director->address;
        $chief->company_name=$director->company_name;
        $chief->comment=$request->comment;
        $chief->status=1;
        $chief->save();
        $director->delete();
        return 'Done abort successfully';
    }
    
}
