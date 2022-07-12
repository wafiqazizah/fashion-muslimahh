     <!-- Begin Page Content -->
     <div class="container-fluid">

         <!-- Page Heading -->
         <?php if ($this->session->flashdata('flash')) : ?>
             <div class="alert alert-success alert-dismissible fade show" role="alert">
                 <strong>Kecamatan</strong> <?= $this->session->flashdata('flash'); ?>
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
         <?php endif; ?>

         <?php if (empty($kecamatan)) : ?>
             <div class="alert alert-danger" role="alert">
                 Data kecamatan kosong...
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
                     <a class="btn btn-sm btn-outline-danger" href="<?= base_url(); ?>kecamatan/exportToPdf"><span class="far fa-lg fa-fw fa-file-pdf"></span>Cetak Data Kecamatan</a>
                     <a href="" class="d-none d-sm-inline-block btn shadow-sm" data-toggle="modal" data-target="#kecamatanBaruModal" style="background-color:#9932CC; color:white;"><i class="fas fa-file-alt fa-fw"></i> Tambah Kecamatan</a>
                 </div>
             </div>

             <div class="card-body">
                 <div class="table-responsive">
                     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                         <thead>
                             <tr style="text-align:center">
                                 <th scope="col">#</th>
                                 <th scope="col">Nama Kecamatan</th>
                                 <th scope="col">Ongkos Kirim</th>
                                 <th scope="col">Pilihan</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr>
                                 <?php
                                    $a = 1;
                                    foreach ($kecamatan as $kc) : ?>
                                     <td><?= $a++; ?></td>
                                     <td><?= $kc['nama_kecamatan']; ?></td>
                                     <td><?= $kc['ongkos_kirim']; ?></td>
                                     <td>
                                         <a href="<?= base_url('kecamatan/ubahKecamatan/') . $kc['id_kecamatan']; ?>" class="badge badge-success"><i class="fas fa-edit"></i> Ubah</a>
                                         <a href="<?= base_url('kecamatan/hapusKecamatan/') . $kc['id_kecamatan']; ?>" class="badge badge-danger" onclick="return confirm('Kamu yakin akan menghapus <?= $judul . ' ' . $kc['nama_kecamatan']; ?> ?');"><i class="fas fa-trash"></i> Hapus</a>
                                     </td>
                             </tr>
                         <?php endforeach ?>
                         </tr>

                         </tbody>
                     </table>
                 </div>
             </div>
         </div>

     </div>
     <!-- /.container-fluid -->

     </div>
     <!-- End of Main Content -->

     <!-- Modal Tambah Kategori baru-->
     <div class="modal fade" id="kecamatanBaruModal" tabindex="-1" role="dialog" aria-labelledby="kecamatanBaruModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="kecamatanBaruModalLabel">Tambah Kecamatan</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <form action="<?= base_url('kecamatan/tambah/'); ?>" method="post" enctype="multipart/form-data">
                     <div class="modal-body">
                         <div class="form-group">
                             <input type="text" class="form-control form-control-user" id="nama_kecamatan" name="nama_kecamatan" placeholder="Masukkan nama kecamatan">
                         </div>
                         <div class="form-group">
                             <input type="text" class="form-control form-control-user" id="ongkos_kirim" name="ongkos_kirim" placeholder="Masukkan ongkos kirim">
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