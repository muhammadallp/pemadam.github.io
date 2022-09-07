<?= $this->extend('pages/template'); ?>
<?= $this->section('connect'); ?>
<?php $session = session(); ?>
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

<!-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
<script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script> -->

      <!-- Main Content -->
      <div class="main-content">
       
        <section class="section">

              <div id='map' style='width: 100%; height: 80vh; position: relative; '>
            
              <script>

          // var map = L.map('map').setView([-1.3490088,100.5765809], 10);
          let latLng=[<?= $session->get('posisi'); ?>];


          let latLng1=[<?= $session->get('posisi'); ?>];

          // let latLng1=[ $("[name=lattidute]"),$("[name=longitude]")];
          // let latLng2=[-1.3690088,100.5765809];

          
          // let wp1 = new L.Routing.Waypoint(latLng);
       

          let wp1 = new L.Routing.waypoint(latLng1);
          var map = L.map('map').setView(latLng, 11);
          let centerMap=false;
          var Layer =L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
          });
          map.addLayer(Layer);




          // getLocation();
          // setInterval(() => {
          //   getLocation();
          // }, 5000);
          //   function getLocation() {
          //     if (navigator.geolocation) {
          //       navigator.geolocation.getCurrentPosition(showPosition);
          //     } else {
          //       x.innerHTML = "Geolocation is not supported by this browser.";
          //     }
          //   }

          //   function showPosition(position) {
          //     console.log('Router sekarang',position.coords.latitude,position.coords.longitude)
          //   $("[name=latitude]").val(position.coords.latitude);
          //   $("[name=longitude]").val(position.coords.longitude);
          //   let latLng=[position.coords.latitude,position.coords.longitude];
          //   // let wp1 = new L.Routing.waypoint(latLng1);
            
          //   control.spliceWaypoints(0, 1, latLng);
          //   if(centerMap==false){
          //   map.panTo(latLng);
          //     centerMap =true;
              
          //   }
          //   }

            var toko = L.icon({
              iconUrl: '<?=base_url('/assets/img/maker.png')?>',

              iconSize:     [25, 60], // size of the icon
          });
            var pelapor = L.icon({
              iconUrl: '<?=base_url('/assets/img/icon-user.png')?>',

              iconSize:     [30, 60], // size of the icon
          });

          <?php foreach($pemadam as $p): ?> 
          L.marker([<?= $p['latitude']; ?>,<?=$p['longitude']; ?>],{icon: toko}).addTo(map)
          .bindPopup('<div class="card text-center" style="width: 10rem; "><div class="card-body"> <?= $p['nama']; ?></p><?= $p['nohp']; ?><br><br></div> </div>' );

          <?php endforeach; ?>

          
          <?php foreach($kordinat as $row): ?> 
          L.marker([<?= $row->lat_kor; ?>,<?=$row->long_kor; ?>],{icon: pelapor}).addTo(map)
          .bindPopup('<div class="card text-center" style="width: 10rem; "><div class="card-body"> <?= $row->nama_pel; ?></p><?= $row->nohp_pel; ?><br><br><button class ="btn btn-primary" onclick="return keSini(<?= $row->lat_kor; ?>,<?=$row->long_kor; ?>)" data-bs-toggle="modal" data-bs-target="#exampleModal" >Kesini</button></div> </div>' );

          <?php endforeach; ?>


          var control= L.Routing.control({
              waypoints: [
               wp1,
               
              
              ],
              geocoder: L.Control.Geocoder.nominatim(),
          routeWhileDragging: true,
          reverseWaypoints: true,
          // showAlternatives: true,
          altLineOptions: {
		styles: [
			{color: 'black', opacity: 0.15, weight: 9},
			{color: 'white', opacity: 0.8, weight: 6},
			// {color: 'blue', opacity: 0.5, weight: 2}
		]
    }
          })
          
          control.addTo(map);
          
          function keSini(lat,Lng) {
            let routeUs = L.Routing.osrmv1();

              var latLng=L.latLng(lat,Lng)
              let wp2 = new L.Routing.Waypoint(latLng);
              control.spliceWaypoints(control.getWaypoints().length - 1, 1, latLng);
              
              // let wp1 = new L.Routing.Waypoint(latLng1);
    routeUs.route([wp1,wp2],(err,routes)=>{
        if(!err)
        {
            let best = 100000000000000;
            let bestRoute = 0;
            for(i in routes)
            {
                if(routes[i].summary.totalDistance < best) {
                    bestRoute = i;
                    best = routes[i].summary.totalDistance;
                }
            }
            console.log('best route',routes[bestRoute]);
            L.Routing.line(routes[bestRoute],{
                styles : [
                    {
                        color : 'green',
                        weight : '6'
                    }
                ]
            }).addTo(map);
        
        }

    })




          }
          // L.Control.geocoder().addTo(map);

// rute terdekat







        </script>
             </div>
        </section>
      </div>
   

  <?= $this->endSection(); ?>
 
