<!-- Main Content -->



<!-- Products -->

<div class="products_iso">
    <div class="row">
        <div class="col">

            <!-- Product Sorting -->

            <div class="product_sorting_container product_sorting_container_top">
                <ul class="product_sorting">
                    <li>
                        <span class="type_sorting_text">Default Sorting</span>
                        <i class="fa fa-angle-down"></i>
                        <ul class="sorting_type">
                            <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Default Sorting</span></li>
                            <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Price</span></li>
                            <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "name" }'><span>Product Name</span></li>
                        </ul>
                    </li>
                    <li>
                        <span>Show</span>
                        <span class="num_sorting_text">6</span>
                        <i class="fa fa-angle-down"></i>
                        <ul class="sorting_num">
                            <li class="num_sorting_btn"><span>6</span></li>
                            <li class="num_sorting_btn"><span>12</span></li>
                            <li class="num_sorting_btn"><span>24</span></li>
                        </ul>
                    </li>
                </ul>
                <div class="pages d-flex flex-row align-items-center">
                    <div class="page_current">
                        <span>1</span>
                        <ul class="page_selection">
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                        </ul>
                    </div>
                    <div class="page_total"><span>of</span> 3</div>
                    <div id="next_page" class="page_next"><a href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
                </div>

            </div>

            <!-- Product Grid -->

            <div class="product-grid">

                <!-- Product 1 -->
                <?php foreach ($muslimah as $m) { ?>
                    <div class="product-item">
                        <div class="product discount product_filter">
                            <div class="product_image">
                                <source srcset="" type="image/svg+xml">
                                <img src="<?php echo base_url(); ?>images/produk/<?= $m->gambar; ?>" alt="...">
                            </div>
                            <div class="favorite favorite_left"></div>
                            <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-$20</span></div>
                            <div class="product_info">
                                <h6 class="product_name"><a href="single.html"><?= $m->nama_produk ?></a></h6>
                                <div class="product_price">Rp.<?= number_format($m->harga_diskon, 0, ',', '.') ?></div>
                            </div>
                        </div>
                        <div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
                    </div>
                <?php } ?>
            </div>




            <!-- Product Sorting -->

            <div class="product_sorting_container product_sorting_container_bottom clearfix">
                <ul class="product_sorting">
                    <li>
                        <span>Show:</span>
                        <span class="num_sorting_text">04</span>
                        <i class="fa fa-angle-down"></i>
                        <ul class="sorting_num">
                            <li class="num_sorting_btn"><span>01</span></li>
                            <li class="num_sorting_btn"><span>02</span></li>
                            <li class="num_sorting_btn"><span>03</span></li>
                            <li class="num_sorting_btn"><span>04</span></li>
                        </ul>
                    </li>
                </ul>
                <span class="showing_results">Showing 1–3 of 12 results</span>
                <div class="pages d-flex flex-row align-items-center">
                    <div class="page_current">
                        <span>1</span>
                        <ul class="page_selection">
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                        </ul>
                    </div>
                    <div class="page_total"><span>of</span> 3</div>
                    <div id="next_page_1" class="page_next"><a href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>

                </div>

            </div>

        </div>

    </div>

</div>

</div>
</div>
</div>
</div>