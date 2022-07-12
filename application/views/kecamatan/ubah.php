<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-md-6">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-primary" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_kecamatan" id="id_kecamatan" value="<?= $kecamatan['id_kecamatan']; ?>">
                <div class="mb-3">
                    <label for="nama_kecamatan" class="form-label">Nama Kecamatan</label>
                    <input type="text" class="form-control" name="nama_kecamatan" id="nama_kecamatan" value="<?= $kecamatan['nama_kecamatan']; ?>">
                </div>
                <div class="mb-3">
                    <label for="ongkos_kirim" class="form-label">Ongkos Kirim</label>
                    <input type="text" class="form-control" name="ongkos_kirim" id="ongkos_kirim" value="<?= $kecamatan['ongkos_kirim']; ?>">
                </div>
                <div class="form-group">
                    <input type="button" class="form-control form-control-user btn btn-dark col-lg-3 mt-3" value="Kembali" onclick="window.history.go(-1)">
                    <input type="submit" name="ubah" class="form-control form-control-user btn btn-primary col-lg-3 mt-3" value="Ubah Data">
                </div>
            </form>
        </div>
    </div>
</div>