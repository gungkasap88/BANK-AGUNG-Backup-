<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            
            <div class="card">
                <div class="card-header">
                    Detail Data Nasabah
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $nasabah['ktp']; ?></h5>
                    <h6 class="card-title">Nama : <?= $nasabah['nama']; ?></h6>
                    <p class="card-text">Alamat : <?= $nasabah['alamat']; ?></p>
                    <p class="card-text">Tempat Lahir : <?= $nasabah['tempatlahir']; ?></p>
                    <p class="card-text">Tanggal Lahir : <?= $nasabah['tanggal']; ?></p>
                    <p class="card-text">Nomor Telp : <?= $nasabah['telp']; ?></p>
                    <a href="<?= base_url(); ?>nasabah" class="btn btn-primary">Kembali</a>
                </div>
            </div>

        </div>
    </div>
</div>