<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomType;

class RoomTypeController extends Controller
{
    public function index()
    {
        return view('roomTypes.index', ['roomTypes' => RoomType::all()]);
    }

    public function create()
    {
        return view('roomTypes.create');
    }

    public function store(Request $request)
    {
        $roomType=RoomType::create($request->only(['name', 'description', 'capacity', 'price_per_night']));
        return response()->json($roomType, 201);
    }

    public function show(string $id)
    {
        return view('roomTypes.show', ['roomType' => RoomType::findOrFail($id)]);
    }

    public function edit(string $id)
    {
        return view('roomTypes.edit', ['roomType' => RoomType::findOrFail($id)]);
    }

    public function update(Request $request, string $id)
    {
        $roomType=RoomType::findOrFail($id);
        $roomType->update($request->only(['name', 'description', 'capacity', 'price_per_night']));
        return response()->json($roomType,200);
    }


    public function destroy(string $id)
    {
        $roomType=RoomType::findOrFail($id);
        $roomType->delete();
        return response()->json($roomType,200);
    }
}
