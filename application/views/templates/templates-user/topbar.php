 <!-- Header -->

 <header class="header trans_300">

     <!-- Top Navigation -->

     <div class="top_nav" style="background-color: #9932CC">
         <div class="container">
             <div class="row">
                 <div class="col-md-6">
                     <div class="top_nav_left">
                         <a href="https://wa.me/+6288232986750" target="_blank" style="color:whitesmoke"><i class="fa-fw fa-brands fa-whatsapp"></i> 0882-3298-6750</a>
                         <a href="https://www.instagram.com/orchidkufashion/" target="_blank" style="text-transform:none; color:whitesmoke; padding-left: 10%;"><i class="fa-fw fa-brands fa-instagram"></i> @orchidkufashion</a>
                         <a href="https://www.facebook.com/profile.php?id=100076797482827" target="_blank" style="text-transform:none; color:whitesmoke; padding-left: 10%;"><i class="fa-fw fa-brands fa-facebook-square"></i> Orchid ku</a>
                     </div>
                 </div>
                 <div class="col-md-6 text-right">
                     <div class="top_nav_right">
                         <ul class="top_nav_menu">
                             <?php
                                if (!empty($this->session->userdata('email'))) { ?>
                                 <li class="account" style="background-color: #9932CC">
                                     <a href="#" style="color: whitesmoke">
                                         Selamat Datang <b><?= $user; ?></b>
                                         <i class="fa-solid fa-angle-down"></i>
                                     </a>
                                     <ul class="account_selection" style="text-align:justify">
                                         <li><a href="<?= base_url('user/ubahprofil') ?>"><i class="fa-fw fa-solid fa-user-pen" aria-hidden="true"></i>Ubah Profil</a></li>
                                         <li><a href="#"><i class="fas fa-fw fa-regular fa-receipt" aria-hidden="true"></i>Riwayat Pesanan</a></li>
                                         <li><a href="#"><i class="fa-fw fa-solid fa-money-bill-transfer" aria-hidden="true"></i>Konfirmasi Bayar</a></li>
                                         <li><a href="<?= base_url('home/logout'); ?>"><i class="fas fa-fw fa-regular fa-right-from-bracket" aria-hidden="true"></i>Logout</a></li>
                                     </ul>
                                 </li>

                                 <li style="padding-top: 10px" class="account-selection">
                                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                         <b><?php echo $this->session->userdata('username'); ?></b>
                                         <i style="padding: 0" class="icon-angle-down"></i>
                                     </a>
                                     <ul style="min-width: 200px" class="dropdown-menu">
                                         <li style="min-width: 200px"><a href="<?= base_url('user/ubahprofil') ?>"><i class="icon-user"></i>Update Profile</a></li>

                                         <li style="min-width: 200px"><a href="<?php echo base_url(); ?>home/riwayat"><i style="padding-right: 18px" class="icon-dollar"></i>Riwayat Pemesanan</a></li>
                                         <li style="min-width: 200px"><a href="<?php echo base_url(); ?>home/konfirmasi_halaman"><i style="padding-right: 14px" class="icon-check"></i>Konfirmasi Pembayaran</a></li>

                                         <li style="min-width: 200px"><a href="<?php echo base_url(); ?>home/logout"><i style="padding-right: 13px" class="icon-key"></i>Log Out</a></li>

                                     </ul>
                                 </li>
                                 </li>

                             <?php } else { ?>
                                 <li class="language" style="background-color: #9932CC; border-right: solid 1.5px whitesmoke;"><a href="<?= base_url('authuser/registration'); ?>"><b style="color:whitesmoke">Daftar</b></a></li>
                                 <li class="account" style="background-color: #9932CC"><a href="<?= base_url('authuser'); ?>"><b style="color:whitesmoke">Login</b></a></li>

                             <?php } ?>
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <!-- Main Navigation -->

     <div class="main_nav_container">
         <div class="container">
             <div class="row">
                 <div class="col-lg-12 text-right">
                     <div class="logo_container">
                         <a href="<?= base_url(); ?>"><img src="<?= base_url(); ?>assets1/img/logo.png" class="img-responsive logo"></a>
                     </div>
                     <nav class="navbar">
                         <ul class="navbar_menu">
                             <li><a href="<?= base_url(); ?>">home</a></li>
                             <li><a href="<?= base_url('belanja'); ?>">belanja</a></li>
                             <li><a href="<?= base_url('home/cara_belanja'); ?>">cara belanja</a></li>
                             <li><a href="<?= base_url('belanja/daftar_order'); ?>">daftar order</a></li>
                             <li><a href="<?= base_url('home/contact'); ?>">Kontak Kami</a></li>
                         </ul>
                         <ul class="navbar_user">
                             <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                             <li class="checkout">
                                 <a href="<?= base_url('belanja/detail_keranjang'); ?>">
                                     <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                     <?php $keranjang = $this->cart->total_items() ?>
                                     <span id="checkout_items" class="checkout_items"><?php echo $keranjang; ?></span>
                                 </a>
                             </li>
                         </ul>
                         <div class="hamburger_container">
                             <i class="fa fa-bars" aria-hidden="true"></i>
                         </div>
                     </nav>
                 </div>
             </div>
         </div>
     </div>

 </header>

 <div class="fs_menu_overlay"></div>
 <div class="hamburger_menu">
     <div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
     <div class="hamburger_menu_content text-right">
         <ul class="menu_top_nav">
             <li class="menu_item has-children">
                 <a href="#">
                     usd
                     <i class="fa fa-angle-down"></i>
                 </a>
                 <ul class="menu_selection">
                     <li><a href="#">cad</a></li>
                     <li><a href="#">aud</a></li>
                     <li><a href="#">eur</a></li>
                     <li><a href="#">gbp</a></li>
                 </ul>
             </li>
             <li class="menu_item has-children">
                 <a href="#">
                     English
                     <i class="fa fa-angle-down"></i>
                 </a>
                 <ul class="menu_selection">
                     <li><a href="#">French</a></li>
                     <li><a href="#">Italian</a></li>
                     <li><a href="#">German</a></li>
                     <li><a href="#">Spanish</a></li>
                 </ul>
             </li>
             <li class="menu_item has-children">
                 <a href="#">
                     My Account
                     <i class="fa fa-angle-down"></i>
                 </a>
                 <ul class="menu_selection">
                     <li><a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
                     <li><a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
                 </ul>
             </li>
             <li class="menu_item"><a href="#">home</a></li>
             <li class="menu_item"><a href="#">shop</a></li>
             <li class="menu_item"><a href="#">promotion</a></li>
             <li class="menu_item"><a href="#">pages</a></li>
             <li class="menu_item"><a href="#">blog</a></li>
             <li class="menu_item"><a href="#">contact</a></li>
         </ul>
     </div>
 </div>