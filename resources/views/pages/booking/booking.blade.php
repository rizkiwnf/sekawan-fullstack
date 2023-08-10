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
                    <div class="text-left mx-4">
                        <a href="/booking/export" target="_blank" class="btn bg-gradient-dark w-12 my-4 mb-2">Export</a>
                        <button type="button" class="btn bg-gradient-success w-12 my-4 mb-2" data-toggle="modal" data-target="#addBooking">+ Tambah Data</button>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        #</th>

                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Kendaraan</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Daerah</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status Pertama</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status Kedua</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $key=>$booking)
                                        <tr>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ ++$key }}</p>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $booking->vehicle->name }} - {{ $booking->vehicle->plate }}</h6>
                                                        <p class="text-xs text-secondary mb-0">{{ $booking->pickup_date }} - {{ $booking->return_date }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $booking->user->region }}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                @if ($booking->status_first == 0)
                                                <span class="badge badge-sm bg-gradient-warning">Diproses</span>
                                                @elseif($booking->status_first == 1)
                                                <span class="badge badge-sm bg-gradient-success">Diterima</span>
                                                @else
                                                <span class="badge badge-sm bg-gradient-danger">Ditolak</span>
                                                @endif
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                @if ($booking->status_final == 0)
                                                <span class="badge badge-sm bg-gradient-warning">Diproses</span>
                                                @elseif($booking->status_final == 1)
                                                <span class="badge badge-sm bg-gradient-success">Diterima</span>
                                                @else
                                                <span class="badge badge-sm bg-gradient-danger">Ditolak</span>
                                                @endif
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <button  class="badge badge-sm bg-gradient-warning" data-toggle="modal" data-target="#updateBooking-{{ $booking->id }}">Edit</button>
                                                <button class="badge badge-sm bg-gradient-danger" data-toggle="modal" data-target="#deleteBooking-{{ $booking->id }}">Delete</span>
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
        @include('pages.booking.booking-modal')
        @include('layouts.footers.auth.footer')
    </div>
@endsection
