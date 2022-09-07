<?= $this->extend('pages/layoutadmin'); ?>
<?= $this->section('connect'); ?>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"

 integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="

 crossorigin="" />

<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"

 integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="

 crossorigin=""></script>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
<script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>




      <!-- Main Content -->
      <div class="main-content">
       
      <form action="/pemadam/save" method="post" enctype="multipart/form-data">
    <input id="lat" type="hidden" name="latitude" />
    <input id="lng" type="hidden" name="longitude" />


        <section class="section">
          <div class="section-header">
            <h1>Google Map</h1>
          </div>
              <div id='map' style='width: 100%; height: 370px; position: relative; '>
            
                <script>
                var map = L.map('map').setView([-1.3490088,100.5765809], 15);

                    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
                    }).addTo(map);
                    

                    function putDraggable() {
   
                    draggableMarker = L.marker([ map.getCenter().lat, map.getCenter().lng], {draggable:true, zIndexOffset:900}) .bindPopup(' <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">Tambah Data </button>').addTo(map);


                    draggableMarker.on('dragend', function(e) {

                    $("#lat").val(this.getLatLng().lat);

                    $("#lng").val(this.getLatLng().lng);

                    });

                        }

                        $( document ).ready(function() {

                        putDraggable();

                        });
                                        

                </script>
             </div>
        </section>
      </div>



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
      <form method="POST" action="/pemadam/save" enctype="multipart/form-data">
      <input class="form-control mb-3" name="nama" type="text" placeholder="Nama Kantor" autofocus required>
      <input class="form-control mb-3" name="alamat" type="text" placeholder="Alamat" required>
      <input class="form-control mb-3" name="nohp" type="text" placeholder="Nomor Handphone" required>

      <label for="exampleFormControlFile1">Silahkan pilih Gambar</label>
    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
     

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
 
