<?php

namespace App\Http\Controllers;

use App\Models\Ingatlan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class IngatlanController extends Controller
{
    public function index()
    {
        $ingatlan = Ingatlan::all();
        return response()->json($ingatlan);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                "kategoria"=> "required|integer|exists:kategorias,id",
                "leiras"=> "required|string",
                "hirdetesDatuma"=> "required|date",
                "tehermentes"=> "required|boolean",
                "ar"=> "required|integer|max:50",
                "kepUrl"=> "required|string",
            ]);

            $ingatlan = Ingatlan::create($request->all());
            return response()->json(["id" => $ingatlan->id], 201, options:JSON_UNESCAPED_UNICODE);

        } catch (ValidationException $e) {
            return response()->json(["message" => "Hiányos adatok!"], 400, options:JSON_UNESCAPED_UNICODE);
        }

    }

    public function destroy(Request $request, $id)
    {
        try {
            $ingatlan = Ingatlan::findOrFail($id);
            $ingatlan->delete();
            return response()->json(["message" => "Sikeres törlés!"], 204, options:JSON_UNESCAPED_UNICODE);
        } catch (Exception $th) {
            return response()->json(["message" => "Ingatlan nem létezik"], 404, options:JSON_UNESCAPED_UNICODE);
        }
    }
}
