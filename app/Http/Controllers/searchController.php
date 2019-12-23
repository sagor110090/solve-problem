<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class searchController extends Controller
{
    public function autoSearch($search){
        $data = User::where('name', 'LIKE', $search.'%')->get();
        return response()->json($data);
        
    }
}
