<div class="container contact_container">
    <div class="row">
        <div class="col">

            <!-- Breadcrumbs -->

            <div class="breadcrumbs d-flex flex-row align-items-center" style="border-bottom: unset; margin-bottom: unset;">
            </div>
        </div>
    </div>

    <!-- Contact Us -->

    <div class="row">

        <div class="col-lg-12 contact_col">
            <div class="contact_contents">
                <h2 class="text-center" style="border-bottom: unset;">REGISTRASI</h2>
                <hr>
                <?= $this->session->flashdata('message'); ?>
                <form class="user" method="post" action="<?= base_url('authuser/registration'); ?>">
                    <div class="form-group col-md-12">
                        <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Masukkan username" value="<?= set_value('username'); ?>">
                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-12">
                        <input type="text" class="form-control form-control-user" id="nm_user" name="nm_user" placeholder="Masukkan nama lengkap" value="<?= set_value('nm_user'); ?>">
                        <?= form_error('nm_user', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-12">
                        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Masukkan email" value="<?= set_value('email'); ?>">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="col-sm-6">
                            <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulang Password">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <p class="animate6 bounceIn"><button type="submit" class="btn btn-block" style="background-color:#9932CC; color: white;">LOGIN</button></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>