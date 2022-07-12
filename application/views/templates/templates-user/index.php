        <!-- Slider -->

        <div class="main_slider" style="background-image:url(<?= base_url(); ?>assets1/img/slider.png)">
            <div class="container fill_height">
                <div class="row align-items-center fill_height">
                    <div class="col">
                        <div class="main_slider_content">
                            <h6>Toko Orchidku</h6>
                            <h1>Selamat Berbelanja</h1>
                            <div class="red_button shop_now_button" style="background-color: #9932CC"><a href="<?= base_url('home/belanja'); ?>">shop now</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Banner -->

        <div class="banner">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="banner_item align-items-center" style="background-image:url(<?= base_url(); ?>assets1/img/banner_4.png)">
                            <div class="banner_category">
                                <a href="<?= base_url('kategori/accesories'); ?>">ACCESORIES</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="banner_item align-items-center" style="background-image:url(<?= base_url(); ?>assets1/img/banner_2.png)">
                            <div class="banner_category">
                                <a href="<?= base_url('kategori/hijab'); ?>">HIJAB</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="banner_item align-items-center" style="background-image:url(<?= base_url(); ?>assets1/img/banner_1.png)">
                            <div class="banner_category">
                                <a href="<?= base_url('kategori/muslimah'); ?>">MUSLIMAH</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="banner_item align-items-center" style="background-image:url(<?= base_url(); ?>assets1/img/banner_3.png)">
                            <div class="banner_category">
                                <a href="<?= base_url('kategori/kids'); ?>">KIDS</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- New Arrivals -->

        <div class="new_arrivals">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <div class="section_title new_arrivals_title">
                            <h2>Produk Pilihan</h2>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col text-center">
                        <div class="new_arrivals_sorting">
                            <ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
                                <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">all</li>
                                <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".accesories">accesories</li>
                                <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".hijab">hijab</li>
                                <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".muslimah">muslimah</li>
                                <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".kids">kids</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

                            <!-- Product 1 -->
                            <?php foreach ($accesories as $a) { ?>
                                <div class="product-item accesories" style="width:20%; height: 380px">
                                    <div class="product discount product_filter">
                                        <div class="product_image">
                                            <img src="<?php echo base_url(); ?>images/produk/<?= $a['gambar']; ?>" alt="">
                                        </div>
                                        <div class="product_info">
                                            <h6 class="product_name"><a href="<?php echo base_url(); ?>home/detail/<?= $a['id_produk']; ?>"><?= $a['nama_produk']; ?></a></h6>
                                            <div class="product_price">Rp. <?= number_format($a['harga_diskon'], 0, ',', '.'); ?><span>Rp. <?= number_format($a['harga_awal'], 0, ',', '.'); ?></span></div>
                                        </div>
                                    </div>
                                    <?php echo anchor('belanja/tambahKeranjang/' . $a['id_produk'], '<div class="red_button add_to_cart_button font-weight-bold" style="background-color: #9932CC; width:100%; margin-left:unset; color:white;">ADD TO CART</div>') ?>
                                </div>
                            <?php } ?>

                            <!-- Product 2 -->
                            <?php foreach ($hijab as $h) { ?>
                                <div class="product-item hijab" style="width:20%; height: 380px">
                                    <div class="product discount product_filter">
                                        <div class="product_image">
                                            <img src="<?php echo base_url(); ?>images/produk/<?= $h['gambar']; ?>" alt="">
                                        </div>
                                        <div class="product_info">
                                            <h6 class="product_name"><a href="<?php echo base_url(); ?>home/detail/<?= $h['id_produk']; ?>"><?= $h['nama_produk']; ?></a></h6>
                                            <div class="product_price">Rp. <?= number_format($h['harga_diskon'], 0, ',', '.'); ?><span>Rp. <?= number_format($h['harga_awal'], 0, ',', '.'); ?></span></div>
                                        </div>
                                    </div>
                                    <?php echo anchor('belanja/tambahKeranjang/' . $h['id_produk'], '<div class="red_button add_to_cart_button font-weight-bold" style="background-color: #9932CC; width:100%; margin-left:unset; color:white; ">ADD TO CART</div>') ?>
                                </div>
                            <?php } ?>

                            <!-- Product 3 -->
                            <?php foreach ($muslimah as $m) { ?>
                                <div class="product-item muslimah" style="width:20%; height: 380px">
                                    <div class="product discount product_filter">
                                        <div class="product_image">
                                            <img src="<?php echo base_url(); ?>images/produk/<?= $m['gambar']; ?>" alt="">
                                        </div>
                                        <div class="product_info">
                                            <h6 class="product_name"><a href="<?php echo base_url(); ?>home/detail/<?= $m['id_produk']; ?>"><?= $m['nama_produk']; ?></a></h6>
                                            <div class="product_price">Rp. <?= number_format($m['harga_diskon'], 0, ',', '.'); ?><span>Rp. <?= number_format($m['harga_awal'], 0, ',', '.'); ?></span></div>
                                        </div>
                                    </div>
                                    <?php echo anchor('belanja/tambahKeranjang/' . $m['id_produk'], '<div class="red_button add_to_cart_button font-weight-bold" style="background-color: #9932CC; width:100%; margin-left:unset; color:white;">ADD TO CART</div>') ?>
                                </div>
                            <?php } ?>

                            <!-- Product 4 -->
                            <?php foreach ($kids as $k) { ?>
                                <div class="product-item kids" style="width:20%; height: 380px">
                                    <div class="product discount product_filter">
                                        <div class="product_image">
                                            <img src="<?php echo base_url(); ?>images/produk/<?= $k['gambar']; ?>" alt="">
                                        </div>
                                        <div class="product_info">
                                            <h6 class="product_name"><a href="<?php echo base_url(); ?>home/detail/<?= $k['id_produk']; ?>"><?= $k['nama_produk']; ?></a></h6>
                                            <div class="product_price">Rp. <?= number_format($k['harga_diskon'], 0, ',', '.'); ?><span>Rp. <?= number_format($k['harga_awal'], 0, ',', '.'); ?></span></div>
                                        </div>
                                    </div>
                                    <?php echo anchor('belanja/tambahKeranjang/' . $k['id_produk'], '<div class="red_button add_to_cart_button font-weight-bold" style="background-color: #9932CC; width:100%; margin-left:unset; color:white;">ADD TO CART</div>') ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>