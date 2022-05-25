<div class="container">
    
    <div class="mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                Form Ubah Nasabah BANK-AGUNG
                </div>
                    <div class="card-body">
                        
                        <!-- Untuk validasi data yang muncul keseluruhan diatas, ada di controller nasabah
                        <?php if( validation_errors() ) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?= validation_errors(); ?>
                            </div>
                        <?php endif ?>
                        Untuk validasi data yang muncul keseluruhan diatas, ada di controller nasabah -->

                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?= $nasabah['id']; ?>">
                            <div class="mb-3">
                                <label for="ktp">Nomor KTP</label>
                                <input type="text" name="ktp" class="form-control" id="ktp" value="<?= $nasabah['ktp']; ?>">
                                <div class="form-text text-danger"><?= form_error('ktp'); ?></div>
                            </div>
                            <div class="mb-3">
                                <label for="nama">Nama Nasabah</label>
                                <input type="text" name="nama" class="form-control" id="nama" value="<?= $nasabah['nama']; ?>">
                                <div class="form-text text-danger"><?= form_error('nama'); ?></div>
                            </div>
                            <div class="mb-3">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat" class="form-control" id="alamat" value="<?= $nasabah['alamat']; ?>">
                                <div class="form-text text-danger"><?= form_error('alamat'); ?></div>
                            </div>
                            <div class="mb-3">
                                <label for="tempatlahir">Tempat Lahir</label>
                                <input type="text" name="tempatlahir" class="form-control" id="tempatlahir" value="<?= $nasabah['tempatlahir']; ?>">
                                <div class="form-text text-danger"><?= form_error('tempatlahir'); ?></div>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal">Tanggal Lahir</label>
                                <input type="text" name="tanggal" class="form-control" id="tanggal" value="<?= $nasabah['tanggal']; ?>">
                                <div class="form-text text-danger"><?= form_error('tanggal'); ?></div>
                            </div>
                            <div class="mb-3">
                                <label for="telp">Nomor Telp</label>
                                <input type="text" name="telp" class="form-control" id="telp" value="<?= $nasabah['telp']; ?>">
                                <div class="form-text text-danger"><?= form_error('telp'); ?></div>
                            </div>
                            <button type="submit" name="tambah" class="btn btn-primary float-right">
                                Ubah Data
                            </button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>