<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\LogActivity;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\BookingExport;
use Maatwebsite\Excel\Facades\Excel;

class BookingController extends Controller
{
    public function index()
    {
        return view('pages.booking.booking', [
            'bookings' => Booking::all(),
            'vehicles' => Vehicle::all(),
            'first_approvals' => User::where('role', 3)->get(),
            'second_approvals' => User::where('role', 2)->get(),
        ]);
    }

    public function export()
	{
		return Excel::download(new BookingExport, 'data-booking.xlsx');
	}

    public function store(Request $request)
    {
        Booking::create([
            'user_id' => Auth::user()->id,
            'vehicle_id' => $request->vehicle,
            'status' => 0,
            'pickup_date' => $request->pickup_date,
            'return_date' => $request->return_date,
            'status_first' => 0,
            'status_final' => 0,
            'to_first' => $request->to_first,
            'to_second' => $request->to_second,
        ]);

        $vehicle = Vehicle::where('id', $request->vehicle)->first();

        LogActivity::create([
            'user_id' => Auth::user()->id,
            'activity' => " berhasil menambahkan data untuk booking Kendaraan "  . $vehicle->name. ' dengan plat ' . $vehicle->plate 
        ]);

        return back();
    }

    public function update(Request $request)
    {
        Booking::where('id', $request->booking_id)->update([
            'vehicle_id' => $request->vehicle,
            'pickup_date' => $request->pickup_date,
            'return_date' => $request->return_date,
            'to_first' => $request->to_first,
            'to_second' => $request->to_second,
        ]);
        return back();
    }

    public function delete(Request $request)
    {
        Booking::where('id', $request->booking_id)->delete();
        return back();
    }

    public function bookingByUser()
    {
        if(Auth::user()->role == 3){
            $bookings = Booking::where('to_first', Auth::user()->id)->get();
        }else if(Auth::user()->role == 2){
            $bookings = Booking::where('to_second', Auth::user()->id)->get();
        }
        return view('pages.kepala.booking.booking', [
            'bookings' => $bookings,
            'vehicles' => Vehicle::all(),
        ]);
    }

    public function approveFirst(Request $request)
    {
        Booking::where('id', $request->booking_id)->update([
            'status_first' => 1
        ]);

        $booking = Booking::where('id', $request->booking_id)->first();
        $vehicle = Vehicle::where('id', $booking->vehicle_id)->first();

        LogActivity::create([
            'user_id' => Auth::user()->id,
            'activity' => " telah menyetujui peminjaman " . $vehicle->name . " dengan plat " . $vehicle->plate
        ]);
        return back();
    }

    public function cancelFirst(Request $request)
    {
        Booking::where('id', $request->booking_id)->update([
            'status_first' => 2, 
            'status_final' => 2,
        ]);

        $booking = Booking::where('id', $request->booking_id)->first();
        $vehicle = Vehicle::where('id', $booking->vehicle_id)->first();

        LogActivity::create([
            'user_id' => Auth::user()->id,
            'activity' => " telah menolak peminjaman " . $vehicle->name . " dengan plat " . $vehicle->plate
        ]);

        return back();
    }

    public function approveFinal(Request $request)
    {
        
        Booking::where('id', $request->booking_id)->update([
            'status_final' => 1
        ]);

        $booking = Booking::where('id', $request->booking_id)->first();
        $vehicle = Vehicle::where('id', $booking->vehicle_id)->first();

        LogActivity::create([
            'user_id' => Auth::user()->id,
            'activity' => " telah menyetujui peminjaman " . $vehicle->name . " dengan plat " . $vehicle->plate
        ]);

        return back();
    }

    public function cancelFinal(Request $request)
    {
        Booking::where('id', $request->booking_id)->update([
            'status_final' => 2
        ]);

        $booking = Booking::where('id', $request->booking_id)->first();
        $vehicle = Vehicle::where('id', $booking->vehicle_id)->first();

        LogActivity::create([
            'user_id' => Auth::user()->id,
            'activity' => " telah menolak peminjaman " . $vehicle->name . " dengan plat " . $vehicle->plate
        ]);

        return back();
    }

    public function activity()
    {
        if(Auth::user()->role == 1){
            $activities = LogActivity::all();
        }else{
            $activities = LogActivity::where('user_id', Auth::user()->id)->get();
        }   

        return view('pages.activity.activity', [
            'activities' => $activities
        ]);
    }
}
