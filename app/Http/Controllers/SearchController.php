<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Perform your search logic here using the $query parameter
        $results = User::where('name', 'LIKE', '%' . $query . '%')->get();

        return response()->json($results);
    }
}
