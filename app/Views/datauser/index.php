    <?php 
       $session = session();
       $pesan = $session->getFlashdata('pesan');
        
    ?>


<?= $this->extend('pages/layoutadmin'); ?>
<?= $this->section('connect'); ?>

<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Users</h1>
          </div>

          <div class="section-body">
            <div class="card">
              <div class="card-body">
          <?php if($pesan){ ?>
          <?php echo $pesan ?></p>
          <?php } ?>
          <div class="input-group mb-3">
          <div class="col px-md-1">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Tambah Data
              </button>
              <form action="" method="post">
            </div>
            <input type="text" class="form-control" name="keyword" placeholder="silahkan masukan pencarian anda!" aria-label="Recipient's username" aria-describedby="button-addon2" autofocus>
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
              </div>
            </form>
            </div>
           
            <table class="table table-bordered table-responsive">
                        <thead>
                          <tr>
                            <th scope="col">Nomor</th>
                            <th scope="col">Nik</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Nomor Handphone</th>
                            <th scope="col">Data create</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php $i= 1 + (5 * ($currentpage - 1)); ?>
                            <?php foreach ($user as $row):
                            
                             ?>
                          <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $row['nik']; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['nohp']; ?></td>
                            <td><?= $row['data_create']; ?></td>
                            <td><img src="/assets/img/avatar/<?= $row['image']; ?>" class="img" ></td>
                            <td> 
                                <a class="btn btn-warning" href=""><i class="fas fa-user-minus"></i></a>
                                <a class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?')" href="datauser/delete/<?= $row['id']; ?>"><i class="fas fa-user-minus"></i></a>
                            </td>
                          </tr>
                          <?php $i++; ?>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                      <?= $pager->links(); ?>
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

<!-- modal save -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambahkan Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        
<?php 
 $session = session();
 $error = $session->getFlashdata('error');
   ?>
      </div>
      <?php if($error){ ?>
                                   
                                   <div class="alert alert-danger" role="alert">

                                       <?php foreach($error as $e){ ?>
                                       <li><?php echo $e ?></li>
                                       <?php } ?>
                                       </div>
                                       <?php } ?>
      <div class="modal-body">
      <form method="POST" action="<?= base_url('datauser/valid_register'); ?>">
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
                  <div class="form-group">
            <select class="form-control"name="posisi" id="exampleFormControlSelect1">
              <option selected>Silahkan Pilih Jenis Kebakaran</option>
            <?php foreach($pemadam as $row):?>
                        <option value="<?= $row['latitude'];?>,<?= $row['longitude']; ?>"><?= $row['nama'];?></option>
                        <?php endforeach;?>
            </select>
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
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- akhir save -->



<?= $this->endSection(); ?>