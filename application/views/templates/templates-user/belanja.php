<!-- Main Content -->
<!-- Products -->

<div class="products_iso">
    <div class="row">
        <div class="col">

            <!-- Product Grid -->

            <div class="product-grid">

                <!-- Product 1 -->
                <?php foreach ($produk as $p) { ?>
                    <div class="product-item" style="width:25%; height: 380px">
                        <div class="product discount product_filter">
                            <div class="product_image">
                                <source srcset="" type="image/svg+xml">
                                <img src="<?php echo base_url(); ?>images/produk/<?= $p['gambar']; ?>" alt="...">
                            </div>
                            <div class="product_info">
                                <h6 class="product_name"><a href="<?= base_url('home/detail/' . $p['id_produk']); ?>"><?= $p['nama_produk']; ?></a></h6>
                                <div class="product_price">Rp. <?= number_format($p['harga_diskon'], 0, ',', '.'); ?></div>
                            </div>
                        </div>
                        <?php echo anchor('belanja/tambahKeranjang/' . $p['id_produk'], '<div class="red_button add_to_cart_button font-weight-bold" style="background-color: #9932CC; width:100%; margin-left:unset; color:white;">ADD TO CART</div>') ?>
                    </div>
                <?php } ?>
            </div>

        </div>

    </div>

</div>

</div>
</div>
</div>
</div>