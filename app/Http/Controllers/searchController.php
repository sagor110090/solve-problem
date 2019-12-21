<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class searchController extends Controller
{
    public function autoSearch($search){
        // dd($search);

        $data = User::where('name', 'LIKE', $search.'%')
                ->get();
                // return response()->json($data);
        // dd($data);
        $output = '';
        $output = '<div class="absolute z-10 list-group bg-white w-full rounded-t-none shadow-lg" style="    position: absolute;
        z-index: 10;">';
            if (count($data)>0) {
                // $output = '<div class="absolute z-10 list-group bg-white w-full rounded-t-none shadow-lg" >';
                foreach ($data as $row){
                    $output .= '<a href="#" class="dropdown-item" >'.$row->name.'</a>';
                }
                $output .= '</div>';
            }
            else {
                $output .= '<span class="dropdown-item">'.'No results'.'</span>';
            }
            $output .= '</div>';
            return $output;
        
        
    }
}
