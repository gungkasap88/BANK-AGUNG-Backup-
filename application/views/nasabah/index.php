<!-- <?php var_dump($nasabah); ?> -->

<div class="container">

    <!-- Kondisi untuk flashdata agar muncul hanya ketika berhasil -->
    <?php if( $this->session->flashdata('flash') ) : ?>

    <!-- Flash Data -->
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert"> Data nasabah
                <strong>berhasil</strong> 
                    <?= $this->session->flashdata('flash'); ?>.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>

    <?php endif ?>


    <!-- Button Tambah Data  -->
    <div class="row mb-3 mt-3">
        <div class="col-lg-6">
            <a href="<?= base_url(); ?>nasabah/tambah" class="btn btn-primary">Tambah Data Nasabah</a>
        </div>
    </div>

    <!-- Button pencarian data -->
    <div class="row">
        <div class="col-lg-6">
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari nasabah berdasarkan No KTP .." name="keyword" id="keyword" autocomplete="off">
                    <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
                </div>
            </form>    
        </div>
    </div>

    <!-- Daftar nasabah -->
    <div class="row mb-3">
        <div class="col-lg-6">
            <h3 >Daftar Nasabah</h3>    
                <?php if( empty($nasabah) ) : ?>
                    <div class="alert alert-danger" role="alert">
                    Data NASABAH tidak ditemukan !
                    </div>           
                <?php endif; ?>
                <ul class="list-group">
                    <?php foreach( $nasabah as $nsbh ) : ?>
                        <li class="list-group-item ">
                            <?= $nsbh['nama']; ?>
                            <a href="<?= base_url(); ?>nasabah/detail/<?= $nsbh['id']; ?>" class="badge text-bg-primary float-right">detail</a>
                            <a href="<?= base_url(); ?>nasabah/ubah/<?= $nsbh['id']; ?>" class="badge text-bg-success float-right">ubah</a>
                            <a href="<?= base_url(); ?>nasabah/hapus/<?= $nsbh['id']; ?>" class="badge text-bg-danger float-right" onclick="return confirm('yakin menghapus data ?');">hapus</a>
                        </li>
                    <?php endforeach; ?>
                </ul> 
        </div>
    </div>
</div>