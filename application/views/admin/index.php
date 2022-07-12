      <!-- Begin Page Content -->
      <div class="container-fluid">

          <!-- Content Row -->
          <div class="row">

              <!-- Jumlah Member Card -->
              <div class="col-xl-4 col-md-6 mb-4">
                  <div class="card bg-success shadow h-100 py-2">
                      <div class="card-body">
                          <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                  <div class="text-lg font-weight-bold text-white text-uppercase mb-3">
                                      Jumlah<br>Member</div>
                                  <div class="h5 mb-0 font-weight-bold text-white"><?= $this->User_model->getUserWhere(['role_id' => 2])->num_rows(); ?></div>
                              </div>
                              <div class="col-auto">
                                  <a href="<?= base_url('user/anggota'); ?>"><i class="fas fa-users fa-4x" style="color:#000;"></i></a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

              <!-- Konfirmasi Pembayaran Card -->
              <div class="col-xl-4 col-md-6 mb-4">
                  <div class="card bg-warning shadow h-100 py-2">
                      <div class="card-body">
                          <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                  <div class="text-lg font-weight-bold text-white text-uppercase mb-3">
                                      Konfirmasi<br>Pembayaran
                                  </div>
                                  <div class="h5 mb-0 font-weight-bold text-white">3</div>
                              </div>
                              <div class="col-auto">
                                  <i class="fas fa-solid fa-receipt fa-4x" style="color:#000;"></i>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

              <!-- Pending Requests Card Example -->
              <div class="col-xl-4 col-md-6 mb-4">
                  <div class="card bg-danger shadow h-100 py-2">
                      <div class="card-body">
                          <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                  <div class="text-lg font-weight-bold text-white text-uppercase mb-3">
                                      Pesanan yang<br>Perlu Dikirim</div>
                                  <div class="h5 mb-0 font-weight-bold text-white">5</div>
                              </div>
                              <div class="col-auto">
                                  <i class="fas fa-truck fa-4x" style="color:#000;"></i>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

          </div>
      </div>
      </div>
      <!-- End of Main Content -->