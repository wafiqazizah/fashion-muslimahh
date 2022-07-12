<div class="container-fluid">
    <h4>Invoice Pemesanan Produk</h4>

    <table class="table table-borderd table-hover table-striped">
        <tr>
            <th>ID Transaksi</th>
            <th>Nama Pemesan</th>
            <th>Alamat Pengiriman</th>
            <th>Tanggal Transaksi</th>
            <th>Batas Pembayaran</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($transaksi as $tr) : ?>
            <tr>
                <td><?php echo $tr->id_transaksi ?></td>
                <td><?php echo $tr->nama ?></td>
                <td><?php echo $tr->alamat ?></td>
                <td><?php echo $tr->tgl_transaksi ?></td>
                <td><?php echo $tr->batas_bayar ?></td>
                <td>
                    <?php echo anchor('transaksi/detail/' . $tr->id_transaksi, '<div class="btn btn-sm btn-primary">Detail</div>') ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>