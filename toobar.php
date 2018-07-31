<!doctype html>
<html >
  <head>
 
    <title>main</title>

      <link rel="stylesheet" href="css/style.css"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="css/styles.css">
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
    </style>
  </head>
  <body>
    
      <div class="android-header mdl-layout__header mdl-layout__header--waterfall">
        <div class="mdl-layout__header-row" style="background:#BDBDBD;">
           <img  src="images/Untitledlogomain%20(2).png" style="padding-top:20px;">
          
          <div class="android-header-spacer mdl-layout-spacer"></div>
          
          <!--<div class="android-navigation-container">
            <nav class="android-navigation mdl-navigation">
              <a class="mdl-navigation__link mdl-typography--text-uppercase" href="enterprise.php">Enterprise</a>
              <a class="mdl-navigation__link mdl-typography--text-uppercase" href="terrain.php">Demo</a>
              <a class="mdl-navigation__link mdl-typography--text-uppercase" href="wera.html">Database</a>
            </nav>
          </div>
          -->
        </div>
      </div>
    <div id="particles-js" style="width:100%;height:100%;position:fixed;"></div>

    <script src="particles.js"></script>
    <script src="app.js"></script>

      //  
  <div class="login-page" >
  <div class="form" style="background:rgba(0,0,0,0.3);">
    <form class="register-form" action="signupdatabase.php" method="post">
      <input type="text" placeholder="email address" name="email"/>
      <input type="password" placeholder="password" name="password"/>
      <button style="background:#212121;" >create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>
      <?php
	   if(isset($_REQUEST["err"]))
        echo '<span style="color:red;">'.$_REQUEST["err"].'</span>';
        ?>
      <form class="login-form" action="logindatabase.php" method="post">
      <input type="text" placeholder="email" name="email"/>
      <input type="password" placeholder="password"name="password"/>
      <button style="background:#212121; ">login</button>
      <p class="message">Not registered? <a href="#">Create an account</a></p>
    </form>
  </div>
</div>
      
      
      
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script  src="js/index.js"></script>
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  </body>
</html>
