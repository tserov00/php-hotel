<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    public function index()
    {
        return view('rooms.index', ['rooms' => Room::all()]);
    }

    public function create()
    {
        return view('rooms.create');
    }

    public function store(Request $request)
    {
        $room=Room::create($request->only(['room_type_id', 'number', 'floor']));
        return response()->json($room,201);
    }

    public function show(string $id)
    {
        return view('rooms.show', ['room' => Room::findOrFail($id)]);
    }

    public function edit(string $id)
    {
        return view('rooms.edit', ['room' => Room::findOrFail($id)]);
    }

    public function update(Request $request, string $id)
    {
        $room=Room::findOrFail($id);
        $room->update($request->only(['room_type_id', 'number', 'floor']));
        return response()->json($room, 200);
    }

    public function destroy(string $id)
    {
        $room=Room::findOrFail($id);
        $room->delete();
        return response()->json($room, 200);
    }
}
