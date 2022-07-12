<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-primary" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="id_bank" class="form-label">ID Bank</label>
                    <input type="text" class="form-control" name="id_bank" id="id_bank" value="<?= $bank['id_bank']; ?>">
                </div>
                <div class="mb-3">
                    <label for="nama_bank" class="form-label">Nama Bank</label>
                    <input type="text" class="form-control" name="nama_bank" id="nama_bank" value="<?= $bank['nama_bank']; ?>">
                </div>
                <div class="mb-3">
                    <label for="no_rek" class="form-label">Nomor Rekening</label>
                    <input type="text" class="form-control" name="no_rek" id="no_rek" value="<?= $bank['no_rek']; ?>">
                </div>
                <div class="mb-3">
                    <label for="atas_nama_pemilik" class="form-label">Atas Nama</label>
                    <input type="text" class="form-control" name="atas_nama_pemilik" id="atas_nama_pemilik" value="<?= $bank['atas_nama_pemilik']; ?>">
                </div>
                <div class="form-group">
                    <input type="button" class="form-control form-control-user btn btn-dark col-lg-3 mt-3" value="Kembali" onclick="window.history.go(-1)">
                    <input type="submit" name="ubah" class="form-control form-control-user btn btn-primary col-lg-3 mt-3" value="Ubah Data">
                </div>
            </form>
        </div>
    </div>
</div>