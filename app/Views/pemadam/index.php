<?php 
       $session = session();
       $pesan = $session->getFlashdata('pesan');   
    ?>


<?= $this->extend('pages/layoutadmin'); ?>
<?= $this->section('connect'); ?>

<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Pemadam</h1>
          </div>

          <div class="section-body">
            <div class="card">
              <div class="card-body">
          <?php if($pesan){ ?>
          <?php echo $pesan ?></p>
          <?php } ?>
          <div class="input-group mb-3">
          <div class="col px-md-1">
            <a class="btn btn-primary" href="<?= base_url('pemadam/add'); ?>">Tambah data</a>
            <form action="" method="post">  
          </div>
            <input type="text" class="form-control " name="keyword" placeholder="silahkan masukan pencarian anda!" aria-label="Recipient's username" aria-describedby="button-addon2" autofocus>
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
            </div>
            </form>
            </div>
            
          <table class="table table-bordered table-responsive-sm">
                        <thead>
                          <tr>
                            <th scope="col">Nomor</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Nomor HP</th>
                            <th scope="col">Data Create</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php $i= 1 + (1 * ($currentpage - 1)); ?>
                            <?php foreach ($pemadam as $row):
                            
                             ?>
                          <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['alamat']; ?></td>
                            <td><?= $row['nohp']; ?></td>
                            <td><?= $row['data_create']; ?></td>
                            <td><img src="/assets/img/pemadam/<?= $row['gambar']; ?>" class="img" ></td>
                            <td>
                                <a class="btn btn-warning"   href=""><i class="far fa-edit"></i></a>
                                <a class="btn btn-danger"    onclick="return confirm('Apakah Anda Yakin?')" href="pemadam/delete/<?= $row['id']; ?>"><i class="far fa-trash-alt"></i></a>
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





<?= $this->endSection(); ?>