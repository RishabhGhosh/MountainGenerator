<!doctype html>
<html lang="en">
  <head>
    <?php
        session_start();
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            
        } else {
            header("Location:toobar.php?err=Login Required");
        }

    ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Introducing Lollipop, a sweet new take on Android.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>gallery</title>

      <link rel="stylesheet" href="css/style.css"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.min.css">
    <link rel="stylesheet" href="styles.css">
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="slider.css">
    <style>
    #view-source {
      position: fixed;
      display: block;
      right: 0;
      bottom: 0;
      margin-right: 40px;
      margin-bottom: 40px;
      z-index: 900;
    }
    .boxInner img:hover {
        left:100;
        top:100;
  -webkit-transform: scale(1.4);
  -moz-transform: scale(1.4);
  -ms-transform: scale(1.4);
  -o-transform: scale(1.4);
    transform: scale(1.4);    
        }

    </style>
      
  </head>
  <body >
      <div id="loading" style="position: absolute; width: 100%; height: 100%; background: url('spinner.gif') no-repeat center center;"></div>
      <script>
          $(window).ready(function() {
    $('#loading').hide();
});
      </script>
    <div class="imp" style="width: 100%;
    margin: auto;
    float:left;
    position: fixed;
    top: 0;
    left: 0; z-index=100!important;">

      <div class="android-header mdl-layout__header mdl-layout__header--waterfall" style="top:0; left:0;z-index:7" >
        <div class="mdl-layout__header-row" style="background:#BDBDBD;">         
            <img  src="images/Untitledlogomain%20(2).png" style="padding-top:20px;">
          
          
          <div class="android-header-spacer mdl-layout-spacer"></div>
          
          <div class="android-navigation-container">
            <nav class="android-navigation mdl-navigation">
              <a class="mdl-navigation__link mdl-typography--text-uppercase" href="enterprise.php" style="color:#212121;">Home</a>
              <a class="mdl-navigation__link mdl-typography--text-uppercase" href="terrain.php" style="color:#212121;">Create</a>
              <a class="mdl-navigation__link mdl-typography--text-uppercase" href="wera.php" style="color:#212121;">Gallery</a>
              <a class="mdl-navigation__link mdl-typography--text-uppercase" href="personalgallery.php" style="color:#212121;">My Gallery</a>
              <a class="mdl-navigation__link mdl-typography--text-uppercase" href="logout.php" style="color:#D32F2F;">Logout</a>
            </nav>
          </div>
        </div>
      </div>
      </div>
          
    <div style="width:100%; height:64px; "></div>
    <div style="height:60px;width:100%;background:rgba(0,0,0,0.3)";>
        <br>
        <div style="padding-left:45%;"><p style="font-family:'Fredericka the Great', cursive;font-size:35px;color:#FFFFFF">GALLERY</p></div>
    </div>
    <div style="z-index:1;position:fixed;overflow:scroll;height:100%;width:100%;">
     <div class="second" style="margin:0 auto; width: 90%; height: 90%;float:left;position:relative;" >
        <?php
            $dirname = "images1/";
            //$dirname = "media/images/iconized/";
            $images = glob($dirname."*.jpeg");
            foreach($images as $image) {
                echo '<div class ="boxInner" style="float:left;z-index=4;padding:3.5%"><img src="'.$image.'" style="width: 200px; height: 200px;" /></div>';
            }
        ?>
    </div>
      </div>
      
      
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script  src="js/index.js"></script>
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  </body>
</html>
