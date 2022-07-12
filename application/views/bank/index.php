     <!-- Begin Page Content -->
     <div class="container-fluid">

         <!-- Page Heading -->
         <?php if ($this->session->flashdata('flash')) : ?>
             <div class="alert alert-success alert-dismissible fade show" role="alert">
                 <strong>Metode pembayaran</strong> <?= $this->session->flashdata('flash'); ?>
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
         <?php endif; ?>

         <?php if (empty($bank)) : ?>
             <div class="alert alert-danger" role="alert">
                 Metode Pembayaran Tidak ditemukan...
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
                     <a class="btn btn-sm btn-outline-danger" href="<?= base_url(); ?>bank/exportToPdf"><span class="far fa-lg fa-fw fa-file-pdf"></span>Cetak Metode Pembayaran</a>
                     <a href="" class="d-none d-sm-inline-block btn shadow-sm" data-toggle="modal" data-target="#bankBaruModal" style="background-color:#9932CC; color:white;"><i class="fas fa-file-alt fa-fw"></i> Tambah Metode Pembayaran</a>
                 </div>
             </div>

             <div class="card-body">
                 <div class="table-responsive">
                     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                         <thead>
                             <tr style="text-align:center">
                                 <th scope="col">#</th>
                                 <th scope="col">ID Bank</th>
                                 <th scope="col">Nama Bank</th>
                                 <th scope="col">No. Rekening</th>
                                 <th scope="col">Atas Nama</th>
                                 <th scope="col">Pilihan</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr>
                                 <?php
                                    $a = 1;
                                    foreach ($bank as $b) : ?>
                                     <td><?= $a++; ?></td>
                                     <td><?= $b['id_bank']; ?></td>
                                     <td><?= $b['nama_bank']; ?></td>
                                     <td><?= $b['no_rek']; ?></td>
                                     <td><?= $b['atas_nama_pemilik']; ?></td>
                                     <td>
                                         <a href="<?= base_url('bank/ubahBank/') . $b['id_bank']; ?>" class="badge badge-success"><i class="fas fa-edit"></i> Ubah</a>
                                         <a href="<?= base_url('bank/hapusBank/') . $b['id_bank']; ?>" class="badge badge-danger" onclick="return confirm('Kamu yakin akan menghapus <?= $judul . ' ' . $b['nama_bank']; ?> ?');"><i class="fas fa-trash"></i> Hapus</a>
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

     <!-- Modal Tambah Bank baru-->
     <div class="modal fade" id="bankBaruModal" tabindex="-1" role="dialog" aria-labelledby="bankBaruModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="bankBaruModalLabel">Tambah Metode Pembayaran</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <form action="<?= base_url('bank/tambah/'); ?>" method="post" enctype="multipart/form-data">
                     <div class="modal-body">
                         <div class="form-group">
                             <input type="text" class="form-control form-control-user" id="id_bank" name="id_bank" placeholder="Masukkan ID Bank">
                         </div>
                         <div class="form-group">
                             <input type="text" class="form-control form-control-user" id="nama_bank" name="nama_bank" placeholder="Masukkan Nama Bank">
                         </div>
                         <div class="form-group">
                             <input type="text" class="form-control form-control-user" id="no_rek" name="no_rek" placeholder="Masukkan Nomor Rekening Bank">
                         </div>
                         <div class="form-group">
                             <input type="text" class="form-control form-control-user" id="atas_nama_pemilik" name="atas_nama_pemilik" placeholder="Masukkan Atas Nama Bank">
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