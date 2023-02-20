<?php

namespace App\Http\Controllers;

use App\Models\Bugalter;
use App\Models\Director;
use App\Models\AbortChief;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    public function   list()
    {
    return   Director::limit(10)->get();  
    }

    public function show(Request $request)
    {
       return  Director::where('id',$request->id)->first(); 
    }

    public function  send(Request $request)
    {
        $director =Director::findOrFail($request->id);
        $bugalter= new Bugalter();
        $bugalter->address=$director->address;
        $bugalter->company_name=$director->company_name;
        $bugalter->product_title=$director->product_title;
        $bugalter->amout=$director->amout;
        $bugalter->count=$director->count;
        $bugalter->meter=$director->meter;
        $bugalter->save();
        $director->delete();
        return 'Done send successfully';
    }

    
    public function  unsend(Request $request)
    {
        $director =Director::findOrFail($request->id);
        $chief= new AbortChief();
        $chief->address=$director->address;
        $chief->company_name=$director->company_name;
        $chief->product_title=$director->product_title;
        $chief->amout=$director->amout;
        $chief->count=$director->count;
        $chief->meter=$director->meter;
        $chief->comment=$request->comment;
        $chief->save();
        $director->delete();
        return 'Done abort successfully';
    }
    
}
