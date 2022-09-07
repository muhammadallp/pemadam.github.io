
<?= $this->extend('pages/layoutadmin'); ?>
<?= $this->section('connect'); ?>

<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Pelapor</h1>
          </div>

          <div class="section-body">
            <div class="card">
              <div class="card-body">
                
          <div class="input-group mb-3">
          <div class="col px-md-1">
          <input type="button" class="btn btn-primary mb-3" value="Print PDF" onclick="window.open('<?= site_url('laporan/printpdf')?>','blank')">
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
                            <th scope="col">Nama</th>
                            <th scope="col">Handphone</th>
                            <th scope="col">Jenis Kebakaran</th>
                            <th scope="col">Nama Kantor</th>
                            <th scope="col">Gambar Kebakaran</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Status </th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php $i= 1; ?>
                            <?php foreach ($pelapor as $row):
                            
                             ?>
                          <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $row->nama_pel; ?></td>
                            <td><?= $row->nohp_pel; ?></td>
                            <td><?= $row->nm_kebakaran; ?></td>
                            <td><?= $row->nama; ?></td>
                            <td><img src="/assets/img/pelapor/<?= $row->image; ?>" class="img" ></td>
                        
                            <td><?= $row->data_created; ?></td>
                            <td><?php if ($row->status_lap=='0') { ?>
                              <span style="color:blue;">Proses</span>
                          <?php  }else{ ?>
                            <span style="color:green;">Selesai</span>
                            <?php } ?></td>
                          </tr>
                          <?php $i++; ?>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                      
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