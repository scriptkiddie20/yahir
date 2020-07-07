<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">Percobaan</div>
            <div class="card-body">
                <form action="<?= base_url('test/inputUsers') ?>" method="post">
                    <div class="form-group">
                        <label for="namaLengkap">Nama Lengkap :</label>
                        <input type="text" name="namaLengkap" class="form-control" id="namaLengkap">
                    </div>
                    <div class="form-group">
                        <label for="emails">Email :</label>
                        <input type="email" name="emails" class="form-control" id="emails">
                    </div>
                    <div class="form-group">
                        <label for="nohp">No Hp :</label>
                        <input type="number" name="nohp" class="form-control" id="nohp">
                    </div>
                    <div class="form-group">
                        <label for="typeKelamin">Jenis Kelamin :</label>
                        <select class="form-control" name="typeKelamin" id="typeKelamin">
                            <option>Laki-laki</option>
                            <option>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" id="kirim">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>