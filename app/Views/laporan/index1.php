
<?= $this->extend('pages/layoutadmin'); ?>
<?= $this->section('connect'); ?>

<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Laporan</h1>
          </div>

          <div class="section-body">
            <div class="card">
              <div class="card-body">


<div class="col-md-4 col-sm-12 ">
<div class="card text-white bg-primary mb-3" style="max-width: 22rem;">
  <div class="card-header">Laporan Perminggu</div>
  <div class="card-body">
    
    <!-- from grup -->

    <!-- <div class="row"> -->
        <div class="form-group">
            <div class="col md-2">
        <form action="" method="post">
    <label for="exampleFormControlSelect1">Tanggal</label>
    <select class="form-control" id="exampleFormControlSelect1">
    <?php 
                        $mulai=1;
                        for($i=$mulai; $i < $mulai + 31; $i++){
                            echo'<option value="'.$i.'">'.$i.'</option>';
                        }     
                        
                        ?>
    </select>
  </div>
  </div>
  

  <div class="form-group">
    <div class="col md-2">
    <label for="exampleFormControlSelect1">Bulan</label>
    <select class="form-control" id="exampleFormControlSelect1">
    <?php 
                        $mulai=1;
                        for($i=$mulai; $i < $mulai + 12; $i++){
                            echo'<option value="'.$i.'">'.$i.'</option>';
                        }     
                        
                        ?>
    </select>
  </div>
  </div>


  <div class="form-group">
    <div class="col md-2">
    <label for="exampleFormControlSelect1">Tahun</label>
    <select class="form-control" id="exampleFormControlSelect1">
    <?php 
                        $mulai=date('Y')-1;
                        for($i=$mulai; $i < $mulai + 7; $i++){
                            echo'<option value="'.$i.'">'.$i.'</option>';
                        }     
                        
                        ?>
    </select>
  </div>
  </div>
  



        <div class="col-sm-8 mb-3 ml-2">
        <div class="form-grup">
            <button type="submit" class="btn btn-light btn-block">Cetak Laporan</button>
        </div>
        </div>



    </div>
</form>
  </div>
</div>

<div class="col-md-4 col-sm-6 mb-3">
    <div class="card">
        <h5 class="card-header">Featured</h5>

        <div class="card-body">
            <div class="card-title"><h4>Tutorial Bootstrap 4 bagian 2</h4></div>
            Selamat datang di tutorial bootstrap 4 lengkap dari paling dasar sampai mahir, untuk pemula sampai expert.
        </div>

        <div class="card-footer">
            
        </div>
    </div>
</div>

<div class="col-md-4 col-sm-6 mb-3">
    <div class="card">
        <h5 class="card-header">Featured</h5>

        <div class="card-body">
            <div class="card-title"><h4>Tutorial Bootstrap 4 bagian 3</h4></div>
            Selamat datang di tutorial bootstrap 4 lengkap dari paling dasar sampai mahir, untuk pemula sampai expert.
        </div>

        <div class="card-footer">
            
        </div>
    </div>
</div>

</div>




              



















              </div>              
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2022 <div class="bullet"></div> Design By <a href="#">Muhamad Alip</a>
        </div>
      </footer>
    </div>
  </div>

<?= $this->endSection(); ?>