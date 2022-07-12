<table border=1>
    <tr>
        <th style="text-align:center"><?= $judul; ?></th>
    </tr>
    <tr>
        <td>
            <div class="table-responsive">
                <table border=1 align="center">
                    <tr>
                        <th>No.</th>
                        <th>ID Produk</th>
                        <th>Nama Produk</th>
                        <th>Harga Awal</th>
                        <th>Harga Diskon</th>
                        <th>Stok</th>
                        <th>Size</th>
                        <th>Deskripsi Produk</th>
                    </tr>
                    <?php
                    $no = 1;
                    foreach ($produk as $p) {
                    ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $p['id_produk']; ?></td>
                            <td><?= $p['nama_produk']; ?></td>
                            <td><?= $p['harga_awal']; ?></td>
                            <td><?= $p['harga_diskon']; ?></td>
                            <td><?= $p['stok']; ?></td>
                            <td><?= $p['size']; ?></td>
                            <td><?= $p['deskripsi_produk']; ?></td>
                        </tr>
                    <?php $no++;
                    } ?>
                </table>
            </div>
        </td>
    </tr>
    <tr>
        <td align="center">
            <?= (date('d M Y H:i:s')); ?>
        </td>
    </tr>
</table>