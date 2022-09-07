<?php $session = session(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?= $title; ?> </title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->


  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url(''); ?>/assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url(''); ?>/assets/css/components.css">
  <link rel="stylesheet" href="<?= base_url(''); ?>/assets/css/css.css">
</head>

<body class="layout-3">
  <div id="app">
    <div class="main-wrapper container">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <a href="index.html" class="navbar-brand sidebar-gone-hide">PEMADAM</a>
        <div class="navbar-nav">
          <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
        </div>

        <form class="form-inline ml-auto">
          <ul class="navbar-nav">
            <!-- <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li> -->
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <!-- <li ><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg">Login</a> -->
          
          <li><a href="<?= base_url('auth/login'); ?>"  class="nav-link nav-link-lg">Login</a>
          </li>
        </ul>
      </nav>

      <nav class="navbar navbar-secondary navbar-expand-lg">
        <div class="container">
          <ul class="navbar-nav">
            <li class="nav-item ">
              <a href="<?= base_url('home'); ?>" class="nav-link "><i class="fas fa-home"></i><span>Home</span></a>
            </li>
            <li class="nav-item ">
              <a href="<?= base_url('location'); ?>" class="nav-link"><i class="fas fa-map-marker-alt"></i><span>Lokasi</span></a>
            </li>
            <li class="nav-item ">
              <a href="<?= base_url('contact'); ?>"  class="nav-link"><i class="far fa-clone"></i><span>Contact</span></a>
            </li>
          </ul>
        </div>
      </nav>

      
      

      <?= $this->renderSection('connect'); ?>

      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2022 <div class="bullet"></div> Design By <a href="#">Muhammad Alip</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
       <!-- General JS Scripts -->
       
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?= base_url('/assets/js/stisla.js'); ?>"></script>

  <!-- JS Libraies -->


  <!-- Template JS File -->
  <script src="<?= base_url('/assets/js/scripts.js'); ?>"></script>
  <script src="<?= base_url('/assets/js/custom.js'); ?>"></script>

 
</body>
</html>