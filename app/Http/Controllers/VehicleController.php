<?php

namespace App\Http\Controllers;

use App\Models\LogActivity;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VehicleController extends Controller
{
    public function index()
    {
        return view('pages.vehicle.vehicle', [
            'vehicles' => Vehicle::all(),
        ]);
    }
    public function add(Request $request)
    {
       $data =  Vehicle::insertGetId([
            'name' => $request->name,
            'type' => $request->type,
            'status' => $request->status,
            'plate' => $request->plate,
            'fuel_consumption' => $request->fuel_consumption,
            'last_service' => $request->last_service,
        ]);

        $vehicle = Vehicle::where('id', $data)->first();

        LogActivity::create([
            'user_id' => Auth::user()->id,
            'activity' => " berhasil menambahkan data untuk Kendaraan "  . $vehicle->name. ' dengan plat ' . $vehicle->plate 
        ]);

        return back();
    }
}
