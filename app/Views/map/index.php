<?= $this->extend('pages/layoutadmin'); ?>
<?= $this->section('connect'); ?>

<td align="left" valign="top"><input id="lat" type="hidden" name="latitude" /></td>

<td align="left" valign="top"><input id="lng" type="hidden" name="longitude" /></td>
 

<link rel="stylesheet" href="<?=base_url('assets/js/leaflet-search/dist/leaflet-search.min.css')?>" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
<!-- <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" /> -->


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
       
        <section class="section">
          <div class="section-header">
            <h1>Google Map</h1>
          </div>
              <div id='map' style='width: 100%; height: 370px; position: relative; '>
            
              <script>

// var map = L.map('map').setView([-1.3490088,100.5765809], 10);
let latLng=[-1.3490088,100.5765809];
var map = L.map('map').setView(latLng, 15);
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
.bindPopup('<div class="card text-center" style="width: 10rem; "><div class="card-body"> <?= $p['nama']; ?></p><?= $p['nohp']; ?><br><br><button class ="btn btn-primary" onclick="return keSini(<?= $p['latitude']; ?>,<?=$p['longitude']; ?>)" data-bs-toggle="modal" data-bs-target="#exampleModal" >Kesini</button></div> </div>' );

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
        </section>
      </div>
   

  <?= $this->endSection(); ?>
 
