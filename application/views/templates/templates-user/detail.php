<div class="row">
    <?php foreach ($produk as $p) { ?>
        <div class="col-lg-7">
            <div class="single_product_pics">
                <div class="row">
                    <div class="col-lg-9 image_col order-lg-2 order-1">
                        <div class="single_product_image">
                            <div class="single_product_image_background" style="background-image:url(<?php echo base_url(); ?>images/produk/<?= $p['gambar']; ?>)"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="product_details">
                <div class="product_details_title">
                    <h2><?= $p['nama_produk']; ?></h2>
                    <p><?= $p['deskripsi_produk']; ?></p>
                </div>
                <div class="original_price">Rp. <?= number_format($p['harga_awal'], 0, ',', '.'); ?></div>
                <div class="product_price">Rp. <?= number_format($p['harga_diskon'], 0, ',', '.'); ?></div>
            <?php } ?>
            <div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
                <span>Quantity:</span>
                <div class="quantity_selector">
                    <span class="minus"><i class="fa fa-minus" aria-hidden="true"></i></span>
                    <span id="quantity_value">1</span>
                    <span class="plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
                </div>
                <div class="red_button add_to_cart_button justify-content-center" style="width:160px;"><a href="#">add to cart</a></div>
                <button class="btn btn-primary" type="submit">Lakukan Pembelian</button>
            </div>
            </div>
        </div>
</div>