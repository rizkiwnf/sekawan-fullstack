<div class="modal fade" id="addBooking" tabindex="-1" role="dialog" aria-labelledby="addBooking" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addBooking">Tambah Booking</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/booking/store" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Kendaraan</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="vehicle">
                            <option>-- Pilih Kendaraan --</option>
                            @foreach ($vehicles as $vehicle)
                                <option value="{{ $vehicle->id }}">{{ $vehicle->name }} - {{ $vehicle->plate }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Peminjam</label>
                        <input type="date" class="form-control" id="pickup_date" name="pickup_date"
                            aria-describedby="pickup_date" placeholder="Pilih Tanggal Peminjaman">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Pengembalian</label>
                        <input type="date" class="form-control" id="return_date" name="return_date"
                            aria-describedby="return_date" placeholder="Pilih Tanggal Peminjaman">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Approval 1</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="to_first">
                            <option>-- Pilih Approval 1 --</option>
                            @foreach ($first_approvals as $approval)
                                <option value="{{ $approval->id }}">{{ $approval->firstname }} {{ $approval->lastname }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Approval 2</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="to_second">
                            <option>-- Pilih Approval 2 --</option>
                            @foreach ($second_approvals as $approval)
                                <option value="{{ $approval->id }}">{{ $approval->firstname }} {{ $approval->lastname }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach($bookings as $booking)
<div class="modal fade" id="updateBooking-{{ $booking->id }}" tabindex="-1" role="dialog" aria-labelledby="updateBooking" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addBooking">Update Booking</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/booking/update" method="POST">
                @csrf
                <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Kendaraan</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="vehicle">
                            <option>-- Pilih Kendaraan --</option>
                            @foreach ($vehicles as $vehicle)
                                <option value="{{ $vehicle->id }}" {{ $booking->vehicle_id == $vehicle->id ? 'selected' : ''}}>{{ $vehicle->name }} - {{ $vehicle->plate }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Peminjam</label>
                        <input type="date" class="form-control" id="pickup_date" name="pickup_date"
                            aria-describedby="pickup_date" placeholder="Pilih Tanggal Peminjaman" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Pengembalian</label>
                        <input type="date" class="form-control" id="return_date" name="return_date"
                            aria-describedby="return_date" placeholder="Pilih Tanggal Peminjaman">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Approval 1</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="to_first">
                            <option>-- Pilih Approval 1 --</option>
                            @foreach ($first_approvals as $approval)
                                <option value="{{ $approval->id }}" {{ $booking->to_first == $approval->id ? 'selected' : ''}}>{{ $approval->firstname }} {{ $approval->lastname }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Approval 2</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="to_second">
                            <option>-- Pilih Approval 2 --</option>
                            @foreach ($second_approvals as $approval)
                                <option value="{{ $approval->id }}" {{ $booking->to_second == $approval->id ? 'selected' : ''}}>{{ $approval->firstname }} {{ $approval->lastname }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@foreach($bookings as $booking)
<div class="modal fade" id="deleteBooking-{{ $booking->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteBooking" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addBooking">Hapus Booking</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/booking/delete" method="POST">
                @csrf
                <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                <div class="container">
                    <p style="margin-top: 15px; text-align: center">Apakah Anda yakin akan menghapus booking ini? </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-primary">Yakin</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach