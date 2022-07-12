     <!-- Begin Page Content -->
     <div class="container-fluid">

       <!-- Page Heading -->
       <?php if ($this->session->flashdata('flash')) : ?>
         <div class="alert alert-success alert-dismissible fade show" role="alert">
           <strong>Data produk</strong> <?= $this->session->flashdata('flash'); ?>
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
       <?php endif; ?>

       <?php if (empty($produk)) : ?>
         <div class="alert alert-danger" role="alert">
           Data produk kosong...
         </div>
       <?php endif; ?>

       <div class="row mt-3">
         <div class="col-6 mb-2">
           <form action="" method="post">
             <div class="input-group">
               <input type="text" class="form-control" placeholder="Masukkan Pencarian ..." name="keyword">
               <button class="btn" type="submit" style="background-color:#9932CC;"><i class="fas fa-search fa-fw text-white"></i></button>
             </div>
           </form>
         </div>
       </div>

       <?php if (validation_errors()) { ?>
         <div class="alert alert-danger" role="alert">
           <?= validation_errors(); ?>
         </div>
       <?php } ?>

       <!-- DataTales Example -->
       <div class="card shadow mb-4">
         <div class="card-header py-3">
           <!-- Page Heading -->
           <div class="d-sm-flex align-items-center justify-content-between mb-0">
             <a class="btn btn-sm btn-outline-danger" href="<?= base_url(); ?>produk/exportToPdf"><span class="far fa-lg fa-fw fa-file-pdf"></span>Cetak Data Produk</a>
             <a href="" class="d-none d-sm-inline-block btn shadow-sm" data-toggle="modal" data-target="#produkBaruModal" style="background-color:#9932CC; color:white;"><i class="fas fa-file-alt fa-fw"></i> Tambah Produk Baru</a>
           </div>
         </div>

         <div class="card-body">
           <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <thead>
                 <tr style="text-align:center">
                   <th scope="col">#</th>
                   <th scope="col">ID Produk</th>
                   <th scope="col">Nama Produk</th>
                   <th scope="col">Harga Awal</th>
                   <th scope="col">Harga Diskon</th>
                   <th scope="col">Stok</th>
                   <th scope="col">Size</th>
                   <th scope="col">Deskripsi Produk</th>
                   <th scope="col">Gambar</th>
                   <th scope="col">Tanggal Dibuat</th>
                   <th scope="col">Pilihan</th>
                 </tr>
               </thead>
               <tbody>
                 <?php if (!empty($produk)) {
                    $a = 1;
                    foreach ($produk as $p) : ?>
                     <tr>
                       <td><?= $a++; ?></td>
                       <td><?= $p['id_produk']; ?></td>
                       <td><?= $p['nama_produk']; ?></td>
                       <td><?= $p['harga_awal']; ?></td>
                       <td><?= $p['harga_diskon']; ?></td>
                       <td><?= $p['stok']; ?></td>
                       <td><?= $p['size']; ?></td>
                       <td><?= $p['deskripsi_produk']; ?></td>
                       <td>
                         <picture>
                           <source srcset="" type="image/svg+xml">
                           <img src="<?= base_url('./images/produk/') . $p['gambar']; ?>" class="img-fluid img-thumbnail" alt="...">
                         </picture>
                       </td>
                       <td><?= $p['tanggal_dibuat']; ?></td>
                       <td>
                         <a href="<?= base_url('produk/ubahProduk/') . $p['id_produk']; ?>" class="badge badge-success"><i class="fas fa-edit"></i> Ubah</a>
                         <a href="<?= base_url('produk/hapusProduk/') . $p['id_produk']; ?>" class="badge badge-danger" onclick="return confirm('Kamu yakin akan menghapus <?= $judul . ' ' . $p['nama_produk']; ?> ?');"><i class="fas fa-trash"></i> Hapus</a>
                       </td>
                     </tr>
                 <?php
                    endforeach;
                  } ?>
               </tbody>
             </table>
             <?= $this->pagination->create_links(); ?>
           </div>
         </div>
       </div>

     </div>
     <!-- /.container-fluid -->

     </div>
     <!-- End of Main Content -->

     <!-- Modal Tambah buku baru-->
     <div class="modal fade" id="produkBaruModal" tabindex="-1" role="dialog" aria-labelledby="produkBaruModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" id="produkBaruModalLabel">Tambah Produk</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <form action="<?= base_url('produk/tambah/'); ?>" method="post" enctype="multipart/form-data">
             <div class="modal-body">
               <div class="form-group">
                 <input type="text" class="form-control form-control-user" id="id_produk" name="id_produk" placeholder="Masukkan ID Produk">
               </div>
               <div class="form-group">
                 <input type="text" class="form-control form-control-user" id="nama_produk" name="nama_produk" placeholder="Masukkan Nama Produk">
               </div>
               <div class="form-group">
                 <select name="id_kategori" class="form-control form-control-user">
                   <option value="">Pilih Kategori</option>
                   <?php
                    foreach ($kategori as $k) { ?>
                     <option value="<?= $k['id_kategori']; ?>"><?= $k['kategori']; ?></option>
                   <?php } ?>
                 </select>
               </div>
               <div class="form-group">
                 <input type="text" class="form-control form-control-user" id="harga_awal" name="harga_awal" placeholder="Masukkan harga awal">
               </div>
               <div class="form-group">
                 <input type="text" class="form-control form-control-user" id="harga_diskon" name="harga_diskon" placeholder="Masukkan harga diskon">
               </div>
               <div class="form-group">
                 <input type="text" class="form-control form-control-user" id="stok" name="stok" placeholder="Masukkan stok produk">
               </div>
               <div class="form-group">
                 <select name="size" class="form-control form-control-user">
                   <option value="">Pilih Size</option>
                   <option>All Size</option>
                   <option>S</option>
                   <option>M</option>
                   <option>L</option>
                   <option>XL</option>
                   <option>XXL</option>
                 </select>
               </div>
               <div class="form-group">
                 <input type="text" class="form-control form-control-user" id="deskripsi_produk" name="deskripsi_produk" placeholder="Masukkan deskripsi produk">
               </div>
               <div class="form-group">
                 <input type="file" class="form-control form-control-user" id="gambar" name="gambar">
               </div>
             </div>
             <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
               <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
             </div>
           </form>
         </div>
       </div>
     </div>
     <!-- End of Modal Tambah Mneu -->