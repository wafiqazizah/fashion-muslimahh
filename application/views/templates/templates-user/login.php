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
                <h2 class="text-center" style="border-bottom: unset;">LOGIN</h2>
                <hr>
                <?= $this->session->flashdata('message'); ?>
                <form class=" user" method="post" action="<?= base_url('authuser'); ?>">
                    <div class="form-group col-md-12">
                        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Masukkan Email" value="<?= set_value('email'); ?>">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-12">
                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-12">
                        <p class="animate6 bounceIn"><button type="submit" class="btn btn-block" style="background-color:#9932CC; color: white;">LOGIN</button></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>