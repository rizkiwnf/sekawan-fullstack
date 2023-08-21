@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Tables'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Daftar Booking</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            #</th>

                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama Admin</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Daerah</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Kendaraan</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Lama Peminjaman</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $key => $booking)
                                        <tr>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ ++$key }}</p>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{ $booking->user->firstname }} {{ $booking->user->lastname }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $booking->user->region }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $booking->vehicle->name }} -
                                                    {{ $booking->vehicle->plate }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $booking->pickup_date }} -
                                                    {{ $booking->return_date }}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                @if (Auth::user()->role == 3)
                                                    @if ($booking->status_first == 0)
                                                        <span class="badge badge-sm bg-gradient-warning">Pending</span>
                                                    @elseif($booking->status_first == 1)
                                                        <span class="badge badge-sm bg-gradient-success">Diterima</span>
                                                    @else
                                                        <span class="badge badge-sm bg-gradient-danger">Ditolak</span>
                                                    @endif
                                                @else
                                                    @if ($booking->status_final == 0)
                                                        <span class="badge badge-sm bg-gradient-warning">Pending</span>
                                                    @elseif($booking->status_final == 1)
                                                        <span class="badge badge-sm bg-gradient-success">Diterima</span>
                                                    @else
                                                        <span class="badge badge-sm bg-gradient-danger">Ditolak</span>
                                                    @endif
                                                @endif

                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                @if (Auth::user()->role == 3)
                                                    @if ($booking->status_first == 0)
                                                        <button class="badge badge-sm bg-gradient-warning"
                                                            data-toggle="modal"
                                                            data-target="#updateBooking-{{ $booking->id }}">Proses</button>
                                                    @else
                                                        -
                                                    @endif
                                                @else
                                                    @if ($booking->status_final == 0)
                                                        <button class="badge badge-sm bg-gradient-warning"
                                                            data-toggle="modal"
                                                            data-target="#updateBooking-{{ $booking->id }}">Proses</button>
                                                    @else
                                                        -
                                                    @endif
                                                @endif
{{-- 
                                                @if ($booking->status_final == 0 && $booking->status_first == 0)
                                                    <button class="badge badge-sm bg-gradient-warning" data-toggle="modal"
                                                        data-target="#updateBooking-{{ $booking->id }}">Proses</button>
                                                    @elseid()
                                                    -
                                                @endif --}}
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('pages.kepala.booking.booking-modal')
        @include('layouts.footers.auth.footer')
    </div>
@endsection
