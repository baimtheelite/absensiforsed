<html>
  <head>

 <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Absensi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <script src="<?php echo base_url("resources/js/jquery-3.3.1.js"); ?>"></script>
    <link href="<?php echo base_url('resources/css/font-awesome.css') ;?>" rel="stylesheet">
    <link href="<?php echo base_url('resources/css/style.css') ;?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/css/w3-colors-win8.css')?>">   
  </head>

<body id="LoginForm">
<div class="container">
<h1 class="form-heading">login Form</h1>
<div class="login-form">
    <div class="main-div">
        <div class="panel">
       <h2>Admin Login</h2>
       <p>Masukkan Username dan Password</p>
       </div>
        <form action="<?= base_url('absensi/login'); ?>" method="post">
            <div class="form-group">
                <input name="user" type="text" class="form-control" placeholder="Username">
            </div>
            <div class="form-group">
                <input name="password" type="password" class="form-control" placeholder="Password">
            </div>
            <div class="forgot">
             <a href="#">Forgot password?</a>
            </div>
            <button name="login" type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
  <p class="botto-text"> Designed by Ibrahim Ahmad</p>
    </div>
  </div>
</body>
</html>