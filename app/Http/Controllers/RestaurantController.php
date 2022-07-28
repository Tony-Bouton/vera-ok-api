<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'string',
            'adresse' => 'string',
            'horaires' => 'string',
            'closed' => 'string'

        ]);

        $restaurant = [

            'name' => $request->name,
            'adresse' => $request->adresse,
            'horaires' => $request->horaires,
            'closed' => $request->closed

        ];

        Restaurant::create($restaurant);

        return response()->json(['message' => 'Restaurant créé']);
    }

    public function index()
    {
        $restaurant = Restaurant::all();

        return response()->json(['restaurant' => $restaurant]);
    }

    public function edit($id)
    {

        $restaurant = Restaurant::findorFail($id);


        return response()->json(['restaurant' => $restaurant]);
    }

    public function update(Request $request, $id)
    {

        $restaurant = Restaurant::findorFail($id);


        $restaurant->name = $request->name;
        $restaurant->adresse = $request->adresse;
        $restaurant->horaires = $request->horaires;
        $restaurant->closed = $request->closed;



        $restaurant->save();

        return response()->json(['message' => 'element modifié']);
    }

    public function show($id)
    {


        $restaurant = Restaurant::findorfail($id);

        return response()->json(['restaurant' => $restaurant]);
    }

    public function destroy($id)
    {
        $restaurant = Restaurant::findorFail($id);

        $restaurant->delete();



        return response()->json(['message' => 'element supprimé']);
    }
}
