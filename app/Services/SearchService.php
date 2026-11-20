<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\RoomType;

class SearchService
{
    public function findRooms(Carbon $checkIn, Carbon $checkOut, int $guests) {
        $sqlQuery = $this->sqlQuery();
        $bindings = ["check_in" => $checkIn->toDateString(),
                     "check_out" => $checkOut->toDateString(),
                     "guests_count" => $guests];
        $rows = DB::select($sqlQuery, $bindings);
        $availableRoomTypes = RoomType::hydrate($rows);
        return $availableRoomTypes;
    }

    public function sqlQuery() {
        return "SELECT rt.*
                FROM room_types AS rt
                WHERE rt.capacity >= :guests_count
                    AND EXISTS (
                        SELECT 1
                        FROM rooms AS r
                        WHERE r.room_type_id = rt.id
                            AND NOT EXISTS (
                                SELECT 1
                                FROM bookings AS old_booking
                                WHERE old_booking.room_id = r.id
                                AND old_booking.status = 'confirmed'
                                AND NOT (
                                    :check_out <= old_booking.check_in
                                    OR :check_in >= old_booking.check_out
                                )
                            )
                        );";
    }
}
