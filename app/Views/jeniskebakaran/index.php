<?php 
       $session = session();
       $pesan = $session->getFlashdata('pesan');
    ?>


<?= $this->extend('pages/layoutadmin'); ?>
<?= $this->section('connect'); ?>

<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Jenis Kebakaran</h1>
          </div>

          <div class="section-body">
            <div class="card">
              <div class="card-body">
          <?php if($pesan){ ?>
          <?php echo $pesan ?></p>
          <?php } ?>
          <div class="input-group mb-3 col-md-13 ">
            <div class="col px-md-1">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Tambah Data
              </button>
              <form action="" method="post">
            </div>
                    <input type="text" name="keyword" class="form-control " placeholder="silahkan masukan pencarian anda!" aria-label="Recipient's username" aria-describedby="button-addon2" autofocus>
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
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Data Dibuat</th>
                            <th scope="col">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php $i= 1 + (5 * ($currentpage - 1)); ?>
                            <?php foreach ($kebakaran as $row):
                            
                             ?>
                          <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $row['nm_kebakaran']; ?></td>
                            <td><?= $row['deskripsi']; ?></td>
                            <td><?= $row['data_create']; ?></td>
                            
                            <td>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $row['id_kebakaran']; ?>">
                            <i class="far fa-edit"></i>
                            </button>
                                <a class="btn btn-danger"    onclick="return confirm('Apakah Anda Yakin?')" href="jenisKebakaran/delete/<?= $row['id_kebakaran']; ?>"><i class="far fa-trash-alt"></i></a>
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
      </div>
      <div class="modal-body">
      <form method="POST" action="/jenisKebakaran/save" enctype="multipart/form-data">
      <input class="form-control mb-3" name="nm_kebakaran" type="text" placeholder="nama kebakaran">
      <!-- <input class="form-control mb-3"  name ="deskripsi" type="text" placeholder="deskripsi"> -->

      <textarea name="deskripsi" id="" placeholder="Deskripsi" cols="58" rows="5"></textarea>
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


<!-- modal edit -->
<?php $no=0; ?>
<?php foreach($kebakaran as $row): ?>
<div class="modal fade" id="edit<?= $row['id_kebakaran']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="/jenisKebakaran/edit/<?= $row['id_kebakaran']; ?>" enctype="multipart/form-data">
      <?= csrf_field(); ?>
        <input class="form-control mb-3" name="nm_kebakaran" type="text"  value="<?= $row['nm_kebakaran']; ?>" placeholder="nama kebakaran">
        <input class="form-control mb-3" name="deskripsi" type="text"  value="<?= $row['deskripsi']; ?>" placeholder="nama kebakaran">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update changes</button>
        </form>
      
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
<!-- akhir edit -->


<?= $this->endSection(); ?>