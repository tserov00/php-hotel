<?php

namespace App\Http\Controllers;

use App\Services\SearchService;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request): View
    {
        return view('search.index', [
            'checkIn' => $request->query('check_in', now()->toDateString()),
            'checkOut' => $request->query('check_out', now()->addDay()->toDateString()),
            'guests' => $request->query('guests', 1),
        ]);
    }

    public function results(Request $request, SearchService $searchService): View
    {
        $validated = $request->validate([
            'check_in' => ['required', 'date_format:Y-m-d', 'after_or_equal:today'],
            'check_out' => ['required', 'date_format:Y-m-d', 'after:check_in'],
            'guests' => ['required', 'integer', 'min:1'],
        ]);

        $checkIn = Carbon::createFromFormat('Y-m-d', $validated['check_in']);
        $checkOut = Carbon::createFromFormat('Y-m-d', $validated['check_out']);
        $guests = (int) $validated['guests'];

        $roomTypes = $searchService->findRooms($checkIn, $checkOut, $guests);

        return view('search.results', [
            'roomTypes' => $roomTypes,
            'checkIn' => $checkIn,
            'checkOut' => $checkOut,
            'guests' => $guests,
            'nights' => $checkIn->diffInDays($checkOut),
        ]);
    }
}
