<?php
require('./config.php');
    session_start(); // to check if get requests were used with session blocks

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

if(isset($_GET['step'])){
  $steps = htmlentities($_GET['step']);
  }else{
    $steps = null;
  }

if(!file_exists('config.php')){
  $staticContent = null;
}else{
  
  if(isset($_COOKIE["user"])) {

    $intro = "";
    $intro2 = "<div id='introtwo'>";
  }else{

    // no cookie
    $intro = "<div id='intro'>
    <h5>Welcome to your Avatar Network installation!</h5>
    <p>Hover to get started.</p>
    <img src='/storage/images/block.png' height='250' width='250'>
    </div>";
    $intro2 = "<div id='introtwo' style='display: none;'>";
  }

  if($steps == "1" || !isset($steps)){
  $level1 = $intro . $intro2 ."
  <h4>Step One</h4>
  <form action='#' method='POST'>
  <div class='form-group'>
<input type='text' class='form-control' name='siteName' placeholder='Website name'>
<input type='text' class='form-control' name='siteURL' placeholder='Website URL (https://example.com)'>
</div>

<div class='form-group'>

<label for='plans'>Choose your plan:</label><br>
<select id='plans' class='form-control'>
  <option value='standard'>Standard ($4.99/mo)</option>
  <option value='deluxe'>Deluxe ($9.95/mo)</option>
  <option value='enterprise'>Enterprise ($24.99/mo)</option>
</select>
<label>You can upgrade at any time</label>

</div>

<div class='form-check'>
<input type='checkbox' class='form-check-input' name='agree' id='exampleCheck1' value='checked'>
<label class='form-check-label' for='exampleCheck1'>I agree to the licenses and Terms of Service</label>
</div>

<input type='submit' class='btn btn-primary' name='step2' value='Next step'>
  </form>

</div>";
  }

  if($steps == "2"){
  $level2 = "<h4>Step Two</h4>
  <form action='#' method='POST'>
  <div class='form-group'>
  <input type='text' class='form-control' name='dbHost' placeholder='Database host'>
<input type='text' class='form-control' name='dbName' placeholder='Database name'>
<input type='text' class='form-control' name='dbPass' placeholder='Database password'>
</div>

<input type='submit' class='btn btn-primary' name='step3' value='Next step'>
  </form>";
  }

  if($steps == "3"){
  $level3 = "<h4>Step Three</h4>
  <form action='#' method='POST'>
<input type='text' class='form-control' name='siteName' placeholder='Credit Card Number'>
<input type='text' class='form-control' name='siteURL' placeholder='CSV'>

<div class='form-group'>
<label for='plans'>Expires on:</label>
<select id='plans' class='form-control'>
  <option value='standard'>Standard ($4.99/mo)</option>
  <option value='deluxe'>Deluxe ($9.95/mo)</option>
  <option value='enterprise'>Enterprise ($24.99/mo)</option>
</select>
</div>

<input type='submit' class='btn btn-primary' name='step4' value='Next step'>
  </form>";
  }

  if($steps == "4"){
    $level4 = "<h4>Step Four</h4>
    <form action='#' method='POST'>
  <input type='text' class='form-control' name='siteName' placeholder='Admin username'>
  <input type='text' class='form-control' name='siteURL' placeholder='Admin password'>
  <input type='text' class='form-control' name='siteURL' placeholder='Confirm password'>
<div class='form-group'>
  <select id='gender' class='form-control'>
  <option value='male'>Male</option>
  <option value='female'>Female</option>
</select>
</div>
  <input type='submit' class='btn btn-success' name='finish' value='Finish'>
    </form>";
    }
   
    if($steps == "5"){
        $level5 = "<h5>Enter your email</h5>
            <form action='#' method='POST'>
  <input type='email' class='form-control' name='email' placeholder='Email Address'>
  </form>";
    }

if(isset($steps)){

 if($steps == "2"){
  $staticContent = $level2;
 }
 if($steps == "3"){
     if(isset($stepFinish2) || isset($_SESSION['stepFinish2']){
         echo"<meta http-equiv='refresh' content='0;url=avatar.php?step=1'>";
     $staticContent = $level1;
     }
  $staticContent = $level3;
 }
 if($steps == "4"){
  $staticContent = $level4;
 }
 if($steps == "5"){
     $staticContent = $level5;
 }
 if($steps >= "6"){
  echo"<meta http-equiv='refresh' content='0;url=avatar.php?step=1'>";
 }

}else{
  $steps == "1"; // predefined for stepsRelocate
  $staticContent = $level1;
  if($steps != "1"){
  //echo"<meta http-equiv='refresh' content='0;url=avatar.php?step=1'>";
  }
}

if(!isset($staticContent)){
  $steps == "1"; // predefined for stepsRelocate
  //$staticContent = "Error";
  $staticContent = $level1;
}

}

/*
if($steps){
  //echo"<h1>Current step - ".$steps."</h1><br>";
  //echo"<h5>Next step - ".$steps++."</h5>";

  for($i = 0){
    $i++
  $inc = $steps + $i;
$stepRelocate = "<meta http-equiv='refresh' content='2;url=avatar.php?step=".$inc."'>";
  }

}
*/

if($steps || $steps <= 6 && $steps > 1){

  $nextStep = $steps + 1;
$refresh = "<meta http-equiv='refresh' content='1'>";
$refresh10 = "<meta http-equiv='refresh' content='10'>";

$stepRelocate = "<meta http-equiv='refresh' content='2;url=avatar.php?step=".$nextStep."'>";
  }else{
    $nextStep = $steps + 2;
    $refresh = "<meta http-equiv='refresh' content='1'>";
    $refresh10 = "<meta http-equiv='refresh' content='10'>";
    
    $stepRelocate = "<meta http-equiv='refresh' content='2;url=avatar.php?step=".$nextStep."'>";

    /*
    $stepRelocate = "<meta http-equiv='refresh' content='0;url=avatar.php?step=1'>";
echo $stepRelocate;
*/
  }

// website guts
?>
<!doctype html>
<html>
<head>
<title>Installation - AvatarNetworkScript</title>

<meta charset="UTF-8">
  <meta name="description" content="AvatarNetworkScript Installation">
  <meta name="keywords" content="Avatar, AvatarNetworkScript, ANS">
  <meta name="author" content="SoulAffinity">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
<style>
body{
    font-family: 'Roboto', sans-serif !important;
    background-color: #e4e3e8 !important;
}
footer{
    width: 100%;
    line-height: 20px;
    background: #444A62;
    color: #d8ddf7;
  position: fixed;
  bottom: 0;
}

footer .footer-em{
  color: #eceef4;
}
.text-avatar{
  color: #d8ddf7 !important;
}
  .text-em{
    color: #eceef4 !important;
  }
.bg-avatar{
  background-color: #444A62 !important;
}
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container">
  <a class="navbar-brand" href="/"><?=$serverName?></a>
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

<div class="alert bg-avatar text-center">
<div class="text-avatar">Welcome to <span class="text-em">AvatarNetworkScript</span> Installation!</div>
</div>

<div style="margin-bottom: 75px;"></div>

<div class="app">

    <div class="container">
    
    <?php
    if($steps <= 3){
      $stepActive = null;
      $stepPage = "Finish";
      //$stepActive = 'aria-current="page"';
    }else{
      $stepActive = null;
      $stepPage = "<a href='#'>Finish</a>";
      //$stepActive = 'aria-current="page"';
    }
    ?>
    <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Installation</a></li>
    <li class="breadcrumb-item" <?=$stepActive?><?=$stepPage?></li>
  </ol>
</nav>

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
                  <div id="installationContent"><?=$staticContent?></div>

<!--
                  <div id="ajax">
  <button class="btn btn-primary" id="action-button">Click me to load info!</button>
  <div id="info"></div>
</div>
-->

                  <?php
                  $spinner = '<br><div class="spinner-border" role="status">
                  <span class="sr-only">Loading...</span>
                  </div>';
                  $spinnerPrimary = '<br><div class="spinner-border text-primary" role="status">
                  <span class="sr-only">Loading...</span>
                  </div>';
                  $spinnerSuccess = '<br><div class="spinner-border text-success" role="status">
                  <span class="sr-only">Loading...</span>
                  </div>';

    if(isset($_POST['step2'])){
      // store a cookie
      $cookie_name = "user";
$cookie_value = $_SERVER['REMOTE_ADDR'];

setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

      $siteNamePost = htmlentities($_POST['siteName']);
      $siteURLPost = htmlentities($_POST['siteURL']);
      if(isset($_POST['agree'])){
      $agree = htmlentities($_POST['agree']);
      }else{
        $agree = "unchecked";
      }
      if(empty($siteNamePost)){
        $error = "Site name cannot be empty!";
      }
      if(empty($siteURLPost)){
        $error = "Site URL cannot be empty!";
      }

      if($agree != "checked"){
        $error = "Make sure to agree to the conditions provided.";
      }


      if(isset($error) || !empty($error)){
        echo "<div class='alert alert-danger text-center'>".$error . $spinner . $refresh."</div>";
      }else{
          
          $_SESSION['stepFinish2'] = true;

echo $spinner . $stepRelocate;

      }

    }
                }

if(isset($_POST['finish'])){

  $finish = true;
  $error = null;
  //if(isset($error) || !empty($error)){
    if(!isset($error)){ //if no errors, proceed with finalizing installation
    echo "<div class='alert alert-success text-center'>Installing your new website! ". $spinnerSuccess . $refresh10."</div>";
    }
  //}

}
            ?>
            </div>
        </div>
    </div>

</div>

<div style="margin-bottom: 75px;"></div>

<!-- Footer -->
<footer>
<div class="card" style="background: inherit">
  <div class="card-body">
    <div class="container">
    <div class="footer-text">Copyright &copy; 2020, <span class="footer-em">AvatarNetworkScript</span>. All rights reserved. | <span class="footer-em">Legal</span> - <span class="footer-em">Terms of Service</span></div>
    </div>
  </div>
</div>
</footer>

<!--
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js">
-->

<!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>-->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<script>
$( "#intro" ).hover(function() {
  $( "#intro" ).fadeOut( "slow", function() {
    // Animation complete.
    document.cookie = "user=user";
      // set an additional cookie via js if the block is hovered on
  });
});

$( "#intro" ).hover(function() {
  $( "#introtwo" ).fadeIn( "slow", function() {
    // Animation complete.
  });
});
</script>
<script>
$('#action-button').click(function() {
   $.ajax({
      url: 'http://localhost/ajax.php',
      data: {
         format: 'json'
      },
      error: function() {
         $('#info').html('<p>An error has occurred</p>');
      },
      dataType: 'json',
      success: function(data) {
         var $title = $('<h1>').text('title ' + data.main.title);
         var $description = $('<p>').text('desc ' + data.main.desc);
         $('#info')
            .append($title)
            .append($description);
      },
      type: 'GET'
   });
});
</script>

</body>
</html>
