<?php

namespace App\Http\Controllers\Api;

use Illuminate\Routing\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use http\Env\Response;
use Illuminate\Support\Facades\DB;



class ReportController extends Controller
{

    public function index(Request $request)
    {
    
    
      $price=$request->price;
   
  
     $data = DB::table('items as it')
              ->selectRaw('l.name as location, c.name as category, cp.name as parent,  count(*) as cant')
               ->join('locations as l', 'it.location_id','=', 'l.id')
               ->join('categories as c', 'it.category_id','=', 'c.id' )
               ->leftjoin('categories  as cp', 'c.parent_id', '=','cp.id' )
               ->where('it.price', '>=', $price)
               ->groupBy('l.name', 'c.name', 'cp.name');


       return response()->json($data->get());
    }
    

}