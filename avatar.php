<?php
require('./config.php');

if($enabled != true){
    die("An error has occured!");
}

// obfuscation/evaluation
$eval = eval(base64_decode('JGVuY3J5cHRpb24gPSAic2VjcmV0IGVuY3J5cHRpb24iOw=='));
if(!empty($eval) || strlen($eval) >= 15){
    echo $eval;
}else if($eval != "secret encryption"){
  //echo $eval;
      //echo"Pseudo weird. A problem maybe?";
    }else{
    die("Failure to evaluate.");
}

$serverIP = null;

if(!$serverIP || $serverIP == null || empty($serverIP)){
    $serverIP = $_SERVER['REMOTE_ADDR'];
}

$serverName = null;

if(!$serverName || $serverName == null || empty($serverName)){
    $serverName = "AvatarNetworkScript";
}

$serverURL = null;

$serverRoot = $_SERVER['DOCUMENT_ROOT'];

$maintenance = null;

if($maintenance == null || $maintenance == "enabled"){
  //die("Maintenance");
    //die(header("Location: ".$serverURL.""));
}

if(!file_exists('config.php')){
  $staticContent = null;
}else{
  $staticContent = "Hello World!";
}

// website guts
?>
<head>
<title>AvatarNetworkScript</title>

<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
<style>
body{
    font-family: 'Roboto', sans-serif !important;
    background-color: #e4e3e8 !important;
}
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container">
  <a class="navbar-brand" href="#"><?=$serverName?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor03">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>

    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</div>
</nav>

<div style="margin-bottom: 75px;"></div>

<div class="app">

    <div class="container">
        <div class="card">
            <div class="card-body">
            <h2><?=$serverName?> Installation</h2>
            <?php
                if(!$staticContent || $staticContent == null || empty($staticContent)){
            ?>
            <p>This page is currently unavailable.</p>
            <?php
                }else{
                  ?>
                  <p><?=$staticContent?></p>
                  <?php
                }
            ?>
            </div>
        </div>
    </div>

</div>

    <div class="card">
        <div class="card-body">
<div class="footer-text">Copyright &copy; 2020</div>
        </div>
    </div>

<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js">
</body>
