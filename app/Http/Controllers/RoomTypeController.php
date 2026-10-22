<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomType;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return RoomType::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roomTypes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $roomType=RoomType::create($request->only(['name', 'description', 'capacity', 'price_per_night']));
        return response()->json($roomType, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return RoomType::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roomType=RoomType::findOrFail($id);
        return view('roomTypes.edit', ['roomType'=>$roomType]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $roomType=RoomType::findOrFail($id);
        $roomType->update($request->only(['name', 'description', 'capacity', 'price_per_night']));
        return $roomType;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $roomType=RoomType::findOrFail($id);
        $roomType->delete();
        return response()->json($roomType,200);
    }
}
