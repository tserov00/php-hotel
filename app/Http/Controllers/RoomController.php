<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Room::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $room=Room::create($request->only(['room_type_id', 'number', 'floor']));
        return response()->json($room,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Room::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $room=Room::findOrFail($id);
        return view('rooms.edit', ['room'=>$room]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $room=Room::findOrFail($id);
        $room->update($request->only(['room_type_id', 'number', 'floor']));
        return $room;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $room=Room::findOrFail($id);
        $room->delete();
        return response()->json($room, 200);
    }
}
