<?= $this->extend('pages/layoutadmin'); ?>
<?= $this->section('connect'); ?>


<?php 
 $session = session();
 $error = $session->getFlashdata('error');
   ?>

<section class="section">
      <div class="container mt-5">
        <div class="row">
        <div class="col-12 col-sm-10 offset-sm-2 col-md-8 offset-md-3 col-lg-6 offset-lg-3 ">
          <!-- <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="../assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div> -->

            <?php if($error){ ?>
                                   
                                   <div class="alert alert-danger" role="alert">

                                       <?php foreach($error as $e){ ?>
                                       <li><?php echo $e ?></li>
                                       <?php } ?>
                                       </div>
                                       <?php } ?>

            <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>

              <div class="card-body">
                <form method="POST" action="<?= base_url('auth/valid_register'); ?>">
                  <div class="form-group">
                    <label for="nik">NIK</label>
                    <input id="nik" type="text" class="form-control" name="nik">
                    <div class="invalid-feedback">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="nama">nama</label>
                    <input id="nama" type="text" class="form-control" name="nama">
                    <div class="invalid-feedback">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="nama">Nomor Hanphone</label>
                    <input id="nohp" type="text" class="form-control" name="nohp">
                    <div class="invalid-feedback">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Password</label>
                      <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="password2" class="d-block">Password Confirmation</label>
                      <input id="password2" type="password" class="form-control" name="confirm">
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>
              </div>
            </div>
           
          </div>
        </div>
      </div>
    </section>
  </div>








<?= $this->endSection(); ?>