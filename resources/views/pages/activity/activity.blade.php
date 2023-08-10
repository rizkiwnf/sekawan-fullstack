@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Tables'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Log Aktivitas</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            #</th>

                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Aktivitas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($activities as $key => $activity)
                                        <tr>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ ++$key }}</p>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        @if(Auth::user()->role == 1)
                                                        <p class="text-xs font-weight-bold mb-0">{{ $activity->user->firstname }} {{ $activity->user->lastname }} {{ $activity->activity }}</p>
                                                        @else
                                                        <p class="text-xs font-weight-bold mb-0">Anda {{ $activity->activity }}</p>
                                                        @endif
                                                    </div>
                                                </div>
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
        @include('layouts.footers.auth.footer')
    </div>
@endsection
