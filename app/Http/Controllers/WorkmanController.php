<?php

namespace App\Http\Controllers;

use App\Models\Chief;
use App\Models\Product;
use App\Models\Workman;
use App\Models\AbortWorkman;
use Illuminate\Http\Request;

class WorkmanController extends Controller
{
    public function   list()
    {
    return   Workman::where('status',0)->with('products')->get();  
    }

    public function   abortList()
    {
    return   Workman::where('status',1)->with('products')->get();  
    }

    public function show(Request $request)
    {
       return  Workman::where('id',$request->id)->with('products')->first(); 
    }

    public function createDocument(Request $request)
    {
      
        Workman::create($request->all());
       return 'Document created successfully';

    }
    public function createProduct(Request $request)
    {
      
        Product::create($request->all());
       return 'Product created successfully';

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
        $chief->document_id=$request->id;
        $chief->address=$workman->address;
        $chief->company_name=$workman->company_name;
        $chief->save();
        $workman->delete();
        return 'Done send successfully';
    }
    

}
