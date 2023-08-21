<?php

namespace App\Exports;

use App\Models\Booking;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class BookingExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $bookings = Booking::with('user')->with('vehicle')->get();

        $statuses = ["diproses", "diterima", "ditolak"];

        foreach ($bookings as $booking) {
            $booking->user_id = $booking->user->username;
            $booking->vehicle_id = $booking->vehicle->name;

            $booking->status_first = $statuses[$booking->status_first];
            $booking->status_final = $statuses[$booking->status_final];

            $booking->to_first = User::where('id', $booking->to_first)->first()->username;
            $booking->to_second = User::where('id', $booking->to_second)->first()->username;
            // $booking->to_second = $booking->user->username;
        }

        return $bookings;
    }
}
