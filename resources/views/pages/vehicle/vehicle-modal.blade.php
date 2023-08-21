<div class="modal fade" id="addVehicle" tabindex="-1" role="dialog" aria-labelledby="addVehicle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addVehicle">Tambah Booking</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/vehicle/add" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Nama Kendaraan</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="name"
                            placeholder="Tuliskan Nama">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Type</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="type">
                            <option>-- Pilih Tipe Kendaraan --</option>
                            <option value="Akuntan Orang">Akuntan Orang </option>
                            <option value="Akuntan Barang">Akuntan Barang </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Type</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="status">
                            <option>-- Pilih Status Kendaraan --</option>
                            <option value="Sewa">Sewa </option>
                            <option value="Milik Pribadi">Milik Pribadi </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Plat Kendaraan</label>
                        <input type="text" class="form-control" id="plate" name="plate"
                            aria-describedby="plate" placeholder="Tuliskan Plat Kendaraan">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Konsumsi Bahan Bakar</label>
                        <input type="text" class="form-control" id="fuel_consumption" name="fuel_consumption"
                            aria-describedby="fuel_consumption" placeholder="Tuliskan Konsumsi Bahan Bakar">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Terakhir Service</label>
                        <input type="date" class="form-control" id="last_service" name="last_service"
                            aria-describedby="last_service" placeholder="Pilih Tanggal Terakhir Service">
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
