<?php 
       $session = session();
       $pesan = $session->getFlashdata('pesan');   
    ?>

<?= 
$this->extend('layout/template1'); ?>
<?= $this->section('connect'); ?>
<form action="/location/proses_lapor" method="post" enctype="multipart/form-data">
<td align="left" valign="top"><input id="lat" type="hidden" name="latitude" /></td>
<td align="left" valign="top"><input id="lng" type="hidden" name="longitude" /></td>
 

<link rel="stylesheet" href="<?=base_url('assets/js/leaflet-search/dist/leaflet-search.min.css')?>" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />


<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
<script src="<?=base_url('assets/js/Control.Geocoder.js')?>"></script>
<script src="<?=base_url('assets/js/leaflet-search/dist/leaflet-search.src.js')?>"></script>
<script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

      <!-- Main Content -->
      <div class="main-content">
       
        <!-- <section class="section"> -->
        <?php if($pesan){ ?>
          <?php echo $pesan ?></p>
          <?php } ?>
              <div id='map' style='width: 100%; height: 70vh; position: relative; '>
            
              <script>

// var map = L.map('map').setView([-1.3490088,100.5765809], 10);
let latLng=[-1.3490088,100.5765809];
var map = L.map('map').setView(latLng, 11);
let centerMap=false;
var Layer =L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
});
map.addLayer(Layer);




getLocation();
setInterval(() => {
  getLocation();
}, 5000);
	function getLocation() {
	  if (navigator.geolocation) {
	    navigator.geolocation.getCurrentPosition(showPosition);
	  } else {
	    x.innerHTML = "Geolocation is not supported by this browser.";
	  }
	}

	function showPosition(position) {
    console.log('Router sekarang',position.coords.latitude,position.coords.longitude)
	$("[name=latitude]").val(position.coords.latitude);
	$("[name=longitude]").val(position.coords.longitude);
  let latLng=[position.coords.latitude,position.coords.longitude];
  control.spliceWaypoints(0, 1, latLng);
  if(centerMap==false){
  map.panTo(latLng);
    centerMap =true;
  }
	}

  var toko = L.icon({
    iconUrl: '<?=base_url('/assets/img/maker.png')?>',

    iconSize:     [25, 60], // size of the icon
});

<?php foreach($pemadam as $p): ?> 
L.marker([<?= $p['latitude']; ?>,<?=$p['longitude']; ?>],{icon: toko}).addTo(map)
.bindPopup('<div class="card text-center" style="width: 10rem; "><img src="/assets/img/pemadam/<?= $p['gambar']; ?>" class="card-img-top" alt="..."><div class="card-body"> <?= $p['nama']; ?></p><?= $p['nohp']; ?><br><br><input type="hidden" name="pemadam_id" value="<?= $p['id']; ?>"><button class ="btn btn-primary" onclick="return keSini(<?= $p['latitude']; ?>,<?=$p['longitude']; ?>)" data-toggle="modal" data-target="#exampleModal" >Hubungi</button></div> </div>' );

<?php endforeach; ?>


var control= L.Routing.control({
    waypoints: [
      latLng

    ],
    
    routeWhileDragging: true
})
control.addTo(map);

function keSini(lat,Lng) {
    var latLng=L.latLng(lat,Lng)
    control.spliceWaypoints(control.getWaypoints().length - 1, 1,latLng);
    
}
L.Control.geocoder().addTo(map);



        </script>
             </div>
        <!-- </section>s -->
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
      <div class="modal-body mb-3">
      <form method="POST" action="/location/proses_lapor" enctype="multipart/form-data">
      <input class="form-control mb-3" name="nama_pel" type="text" placeholder="Masukan Nama Anda" required autofocus>
      <input class="form-control mb-3" name="nohp_pel" type="text" placeholder="Nomor Handphone" required>
      <input type="hidden" name="status_lap" value="0">


                <div class="form-group">
            <!-- <label for="exampleFormControlSelect1">Silahkan Pilih Jenis Kebakaran</label> -->
            <select class="form-control"name="id_jenis" id="exampleFormControlSelect1">
              <option selected>Silahkan Pilih Jenis Kebakaran</option>
            <?php foreach($kebakaran as $row):?>
                        <option value="<?= $row['id_kebakaran'];?>"><?= $row['nm_kebakaran'];?></option>
                        <?php endforeach;?>
            </select>
          </div>

          <label for="exampleFormControlFile1">Silahkan pilih Gambar</label>
        <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
      <!-- <textarea name="deskripsi" id="" placeholder="Deskripsi" cols="58" rows="5"></textarea> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

  <?= $this->endSection(); ?>
 
