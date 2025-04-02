<?php

namespace App\Http\Controllers;

use App\Models\Ingatlan;
use Illuminate\Http\Request;

class IngatlanController extends Controller
{
    public function index()
    {
        $ingatlan = Ingatlan::all();
        return response()->json($ingatlan);
    }

    public function store(Request $request)
    {
        
    }
}
