<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;

class SearchController extends Controller
{

    public function show()
    {
        return view('search');
    }

    public function searchData(Request $request)
    {
        
        if($request->ajax()) {
          
            $data = City::where('name', 'LIKE', $request->city.'%')->get();
           
            $output = '';
           
            if (count($data)>0) {
              
                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1; color: black">';
              
                foreach ($data as $row){
                   
                    $output .= '<li class="list-group-item"><a href="/city/'. $row->name.'">'.$row->name.'</a></li>';
                }
              
                $output .= '</ul>';
            }
            else {
             
                $output .= '<li class="list-group-item">'.'No results'.'</li>';
            }
           
            return $output;
        }
    }
}
