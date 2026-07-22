<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    public function index()
    {
        $roomTypes = RoomType::all();

        return view('room_types.index', compact('roomTypes'));
    }

    public function create()
    {
        return view('room_types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'max_occupancy' => 'required|integer',
        ]);

        RoomType::create($request->all());

        return redirect()->route('room_types.index')
            ->with('success', 'Room type added successfully.');
    }

    public function show(RoomType $roomType)
    {
        return view('room_types.show', compact('roomType'));
    }

    public function edit(RoomType $roomType)
    {
        return view('room_types.edit', compact('roomType'));
    }

    public function update(Request $request, RoomType $roomType)
    {
        $request->validate([
            'room_name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'max_occupancy' => 'required|integer',
        ]);

        $roomType->update($request->all());

        return redirect()->route('room_types.index')
            ->with('success', 'Room type updated successfully.');
    }

    public function destroy(Request $request, RoomType $roomType)
    {
        $roomType->delete();

        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Room type deleted successfully.',
            ]);
        }

        return redirect()->route('room_types.index')
            ->with('success', 'Room type deleted successfully.');
    }
}
