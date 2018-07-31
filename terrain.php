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
    <script>
        function highli(){
            var but=document.getElementById("rel");
            but.style.background="#000000";
            var imag=document.getElementById("imag");
            imag.src="mount.png";
        }
        function lowli(){
            var but=document.getElementById("rel");
            but.style.background="#FFFFFF";
            var imag=document.getElementById("imag");
            imag.src="mountb.png";
        }
    </script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Introducing Lollipop, a sweet new take on Android.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>terrain</title>

      <link rel="stylesheet" href="css/style.css"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
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
    </style>
  </head>
  <body>
    
  	   
    <div class="imp" style="width: 100%;
    margin: auto;
    float:left;
    position: fixed;
    top: 0;
    left: 0; z-index=100;">

      <div class="android-header mdl-layout__header mdl-layout__header--waterfall">
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
        
    
        <div style="width:100%; height:64px;"></div>
      
      <button onmouseout="lowli()" onmouseover="highli()" id="rel" onclick="window.location.reload()" style="z-index:100;background:#FFFFFF ;width:100px;height:100px;border-radius:50%;position:fixed;bottom:20px;right:50px;"><img src="mountb.png" id="imag"></button>
    
    <canvas id='display' width='1' height='1' style="width:100%; height:90%; margin:0 auto; position:fixed;left:10;overflow:hidden; "/>
    
    <script>
      function Terrain(detail) {
        this.size = Math.pow(2, detail) + 1;
        this.max = this.size - 1;
        this.map = new Float32Array(this.size * this.size);
      }
      Terrain.prototype.get = function(x, y) {
        if (x < 0 || x > this.max || y < 0 || y > this.max) return -1;
        return this.map[x + this.size * y];
      };
      Terrain.prototype.set = function(x, y, val) {
        this.map[x + this.size * y] = val;
      };
      Terrain.prototype.generate = function(roughness) {
        var self = this;
        this.set(0, 0, self.max);
        this.set(this.max, 0, self.max / 2);
        this.set(this.max, this.max, 0);
        this.set(0, this.max, self.max / 2);
        divide(this.max);
        function divide(size) {
          var x, y, half = size / 2;
          var scale = roughness * size;
          if (half < 1) return;
          for (y = half; y < self.max; y += size) {
            for (x = half; x < self.max; x += size) {
              square(x, y, half, Math.random() * scale * 2 - scale);
            }
          }
          for (y = 0; y <= self.max; y += half) {
            for (x = (y + half) % size; x <= self.max; x += size) {
              diamond(x, y, half, Math.random() * scale * 2 - scale);
            }
          }
          divide(size / 2);
        }
        function average(values) {
          var valid = values.filter(function(val) { return val !== -1; });
          var total = valid.reduce(function(sum, val) { return sum + val; }, 0);
          return total / valid.length;
        }
        function square(x, y, size, offset) {
          var ave = average([
            self.get(x - size, y - size),   // upper left
            self.get(x + size, y - size),   // upper right
            self.get(x + size, y + size),   // lower right
            self.get(x - size, y + size)    // lower left
          ]);
          self.set(x, y, ave + offset);
        }
        function diamond(x, y, size, offset) {
          var ave = average([
            self.get(x, y - size),      // top
            self.get(x + size, y),      // right
            self.get(x, y + size),      // bottom
            self.get(x - size, y)       // left
          ]);
          self.set(x, y, ave + offset);
        }
      };
      Terrain.prototype.draw = function(ctx, width, height) {
        var self = this;
        for (var y = 0; y < this.size; y++) {
          for (var x = 0; x < this.size; x++) {
            var val = this.get(x, y);
            var top = project(x, y, val);
            var bottom = project(x + 1, y, 0);
            var style = brightness(x, y, this.get(x + 1, y) - val);
            rect(top, bottom, style);
          }
        }
        function rect(a, b, style) {
          if (b.y < a.y) return;
          ctx.fillStyle = style;
          ctx.fillRect(a.x, a.y, b.x - a.x, b.y - a.y);
        }
        function brightness(x, y, slope) {
          if (y === self.max || x === self.max) return '#000';
            var b = ~~(slope * 50) + 128;
            //var b=249;
          return ['rgba(', b, ',', b, ',', b, ',1)'].join('');
        }
        function iso(x, y) {
          return {
            x: 0.5 * (self.size + x - y),
            y: 0.5 * (x + y)
          };
        }
        function project(flatX, flatY, flatZ) {
          var point = iso(flatX, flatY);
          var x0 = width * 0.5;
          var y0 = height * 0.2;
          var z = self.size * 0.5 - flatZ + point.y * 0.75;
          var x = (point.x - self.size * 0.5) * 6;
          var y = (self.size - point.y) * 0.005 + 1;
          return {
            x: x0 + x / y,
            y: y0 + z / y
          };
        }
      };
      var display = document.getElementById('display');
      var ctx = display.getContext('2d');
      var width = display.width = window.innerWidth;
      var height = display.height = window.innerHeight;
      var terrain = new Terrain(9);
      terrain.generate(0.7);
      terrain.draw(ctx, width, height);
    </script>
    
       <form method="post" accept-charset="utf-8" name="form1">
            <input name="hidden_data" id='hidden_data' type="hidden"/>
        </form>
    <script>
        /*function saveimage(){
            var canvas=document.getElementById("display");
            var d=canvas.toDataURL('image/jpeg');
            var x= {"image":d};
            var url = "saveCanvasDataUrl.php"; 
            $.ajax({
                type: 'POST',
                url: url,
                data: x,
                error : function(){ alert("Something went wrong");}
            });//.done(function(o){ var data={"image:"d};console.log('saved');});
        }
        saveimage();*/
        function uploadEx() {
                var canvas = document.getElementById("display");
                var dataURL = canvas.toDataURL("image/jpeg");
                document.getElementById('hidden_data').value = dataURL;
                var fd = new FormData(document.forms["form1"]);
 
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'upload_data.php', true);
 
                xhr.upload.onprogress = function(e) {
                    if (e.lengthComputable) {
                        var percentComplete = (e.loaded / e.total) * 100;
                        console.log(percentComplete + '% uploaded');
                    }
                };
 
                xhr.onload = function() {
 
                };
                xhr.send(fd);
            };
        uploadEx();
    </script>
  </body>
</html>