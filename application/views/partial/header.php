<!DOCTYPE html>
<html>
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Absensi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
    <script src="<?php echo base_url("resources/js/jquery-3.3.1.js"); ?>"></script>
    <script src="<?php echo base_url('resources/js/v_absensi.js') ?>"></script>
    <link href="<?php echo base_url('resources/css/font-awesome.css') ;?>" rel="stylesheet">
    <link href="<?php echo base_url('resources/css/style.css') ;?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/css/w3-colors-win8.css')?>">   

    <link rel="icon" href="<?php echo base_url('resources/favicon/forsed.jpg') ;?>">

</head>
<body>
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li class="<?php echo ($active == '' ? 'active': '') ?>"><a href="<?=site_url(); ?>"><i class="icon-list-ol"></i><span>Absensi</span> </a> </li>
        <li class="<?php echo ($active == 'daftar_anggota' ? 'active': '') ?>"><a href="<?php echo site_url('Absensi/daftar_anggota');?>"><i class="icon-user"></i><span>List Anggota</span> </a> </li>
        <li class="<?php echo ($active == 'rekor_presensi' ? 'active': '') ?>"><a href="<?php echo site_url('Absensi/rekor_presensi');?>"><i class="icon-book"></i><span>Rekor Absensi Anggota</span> </a> </li>
        <li><a href="#pendaftaran" data-toggle="modal" data-target="#myModal"><i class="fa fa-address-card"></i><span>Pendaftaran</span></a></li>
          <?php if($this->session->userdata('user')){ ?>
          <li class="danger"><a href="<?php echo site_url('Absensi/logout') ?>"><i class="fa fa-sign-out-alt"></i>
          <span>Logout</span></a></li>
        <?php } ?>
</a></li>

       <!-- <li> <a href="<?php /*echo site_url('Absensi/pendaftaran'); */?>"><i class="fa fa-address-card"></i><span>Pendaftaran</span></a> </li> -->
      </ul>
    </div>

</div>