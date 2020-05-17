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
  $level1 = "<form action='#' method='POST'>
<input type='text' class='form-control' name='siteName' placeholder='Website name'>
<input type='text' class='form-control' name='siteURL' placeholder='Website URL'>

<input type='submit' class='btn btn-primary' name='step2' value='Next step'>
  </form>

";
  $level2 = "World ";
  $level3 = "ANS";

  $staticContent = $level1;
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

<div class="alert alert-primary text-center">
Welcome to AvatarNetworkScript Installation!
</div>

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
    if(isset($_POST['step2'])){
      $siteNamePost = htmlentities($_POST['siteName']);
      $siteURLPost = htmlentities($_POST['siteURL']);

      if(empty($siteNamePost)){
        $error = "Site name cannot be empty!";
      }
      if(empty($siteURLPost)){
        $error = "Site URL cannot be empty!";
      }

      if(isset($error) || !empty($error)){
        echo "<div class='alert alert-danger text-center'>".$error."</div>";
      }else{

  ?>
<div class="spinner-border" role="status">
  <span class="sr-only">Loading...</span>
</div>
  <?php
}
    }

                }
            ?>
            </div>
        </div>
    </div>

</div>

<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js">
</body>
