<?php 
                 $session = session();
                 $login = $session->getFlashdata('login');
                  $logout = $session->getFlashdata('logout');
                 $nik = $session->getFlashdata('nik');
                $password = $session->getFlashdata('password');  
                     ?>

<?= $this->extend('layout/template'); ?>
<?= $this->section('connect'); ?>


<section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
          <?php if($nik){ ?>
                                   <?= $nik?></p>
                                    <?php } ?>
                                    
                                    <?php if($password){ ?>
                                       <?= $password?></p>
                                        <?php } ?>
                                        
                                        <?php if($login){ ?>
                                        <?= $login?></p>
                                    <?php } ?>
                                        <?php if($logout){ ?>
                                        <?= $logout?></p>
                                    <?php } ?>
            <div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>
              <div class="card-body">
                <form method="POST"  class="needs-validation" novalidate="" action="<?= base_url('/auth/valid_login'); ?>">
                  <div class="form-group">
                    <label for="nik">NIK</label>
                    <input id="email" type="text" class="form-control" name="nik" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your NIK
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
                <div class="row sm-gutters">
                </div>
              </div>
            </div>      
          </div>
        </div>
      </div>
    </section>
  </div>

  <?= $this->endSection(); ?>