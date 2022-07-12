<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-primary" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            <?php foreach ($produk as $p) { ?>
                <form action="<?= base_url('produk/ubahProduk'); ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="id_produk" class="form-label">ID Produk</label>
                        <input type="text" class="form-control" name="id_produk" id="id_produk" value="<?= $p['id_produk']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="nama_produk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" name="nama_produk" id="nama_produk" value="<?= $p['nama_produk']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="id_kategori" class="form-label">Kategori</label>
                        <select name="id_kategori" class="form-control form-control-user">
                            <option value="<?= $id; ?>" selected="selected"><?= $k; ?></option>
                            <?php
                            foreach ($kategori as $k) { ?>
                                <option value="<?= $k['id_kategori']; ?>"><?= $k['kategori']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="harga_awal" class="form-label">Harga Awal</label>
                        <input type="text" class="form-control form-control-user" id="harga_awal" name="harga_awal" value="<?= $p['harga_awal']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="harga_diskon" class="form-label">Harga Diskon</label>
                        <input type="text" class="form-control form-control-user" id="harga_diskon" name="harga_diskon" value="<?= $p['harga_diskon']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="text" class="form-control form-control-user" id="stok" name="stok" value="<?= $p['stok']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="size" class="form-label">Size</label>
                        <select value="<?= $p['size']; ?>" name="size" class="form-control form-control-user">
                            <option>All Size</option>
                            <option>S</option>
                            <option>M</option>
                            <option>L</option>
                            <option>XL</option>
                            <option>XXL</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi_produk" class="form-label">Deskripsi Produk</label>
                        <input type="text" class="form-control form-control-user" id="deskripsi_produk" name="deskripsi_produk" value="<?= $p['deskripsi_produk']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Foto Produk</label>
                        <br>
                        <?php
                        if (isset($p['gambar'])) { ?>
                            <input type="hidden" name="old_pict" id="old_pict" value="<?= $p['gambar']; ?>">
                            <picture>
                                <source srcset="" type="image/svg+xml">
                                <img src="<?= base_url('./images/produk/') . $p['gambar']; ?>" class="rounded mx-auto mb-3 d-blok" alt="...">
                            </picture>
                        <?php } ?>
                        <input type="file" class="form-control form-control-user" id="gambar" name="gambar">
                    </div>
                    <div class="form-group">
                        <input type="button" class="form-control form-control-user btn btn-dark col-lg-3 mt-3" value="Kembali" onclick="window.history.go(-1)">
                        <input type="submit" name="ubah" class="form-control form-control-user btn btn-primary col-lg-3 mt-3" value="Ubah Data">
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
</div>