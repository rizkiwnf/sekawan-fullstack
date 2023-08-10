@foreach ($bookings as $booking)
    <div class="modal fade" id="updateBooking-{{ $booking->id }}" tabindex="-1" role="dialog"
        aria-labelledby="deleteBooking" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBooking">Proses Booking</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="container">
                    <p style="margin-top: 15px; text-align: center">Silahkan pilih untuk memproses booking ini </p>
                </div>
                <div class="modal-footer">
                    <form action={{ Auth::user()->role == 3 ? "/bookings/cancel" : "/bookings/cancel-pusat" }} method="POST">
                        @csrf
                        <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                        <button type="submit" class="btn btn-danger">Tolak</button>
                    </form>
                    <form action="{{ Auth::user()->role == 3 ? '/bookings/approve' : '/bookings/approve-pusat' }}" method="POST">
                        @csrf
                        <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                        <button type="submit" class="btn btn-success">Approve</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
