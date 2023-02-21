<?php

namespace App\Http\Controllers;

use App\Models\Bugalter;
use Illuminate\Http\Request;

class BugalterController extends Controller
{
    public function   list()
    {
    return   Bugalter::limit(10)->with('products')->get();  
    }

    public function show(Request $request)
    {
       return  Bugalter::where('id',$request->id)->with('products')->first(); 
    }
}
