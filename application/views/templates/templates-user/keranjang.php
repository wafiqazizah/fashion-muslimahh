<div class="row">
    <div class="col-lg-12 contact_col">
        <div class="contact_contents">
            <h2 class="text-left"><?= $heading;  ?></h2>
            <hr>
            <table class="table table-bordered table-striped table-hover">
                <tr align="center">
                    <th>NO</th>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Sub Total</th>
                </tr>
                <?php $no = 1;
                foreach ($this->cart->contents() as $items) : ?>
                    <tr>
                        <td align="center"><?php echo $no++ ?></td>
                        <td><?php echo $items['name'] ?></td>
                        <td align="center"><?php echo $items['qty'] ?></td>
                        <td align="right"> Rp. <?php echo number_format($items['price'], 0, ',', '.') ?></td>
                        <td align="right">Rp. <?php echo number_format($items['subtotal'], 0, ',', '.') ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="4"></td>
                    <td align="right"> Rp. <?php echo number_format($this->cart->total(), 0, ',', '.') ?></td>
                </tr>
            </table>
            <div align="right">
                <a href="<?php echo base_url('belanja/hapus_keranjang') ?>" class="btn btn-sm btn-danger">Hapus Keranjang</a>
                <a href="<?php echo base_url('belanja') ?>" class="btn btn-sm btn-primary">Lanjut Belanja</a>
                <a href="<?php echo base_url('belanja/pembayaran') ?>" class="btn btn-sm btn-success">Pembayaran</a>
            </div>
        </div>
    </div>
</div>