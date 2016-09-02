<!doctype html>
<? $type = $_GET['type']; ?>
<html>
  <head>
      <meta charset='UTF-8' />
      <meta name="viewport" content="user-scalable=0, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta http-equiv='content-type' content='text/html; charset=utf-8' />

      <title>Mantel 360 Viewer</title>
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

      <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>

      <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script>
      <script src='src/threesixty.js'></script>

      <script type="text/javascript" src="panzoom.js"></script>

      <style>

        html, body {height:100%;}

        body {
          font-family: "Montserrat", Helvetica, Arial, sans-serif;
        }

       /* VERTICAL ALIGN MIDDLE 360 VIEWER*/
        .container {
          position: relative;
          display: table;
          table-layout: fixed;
          height: 100%;
          min-width: 100%;
          padding-bottom: 75px; /*MINUS THE BUTTON BAR*/
        }
        #container {
          display: table-cell;
          height: 100%;
          vertical-align: middle;
          text-align: center;
          width: 100%;
          position: relative;
        }
        /* END - VERTICAL ALIGN MIDDLE 360 VIEWER*/


        #container .threesixty {
          position: relative;
          margin: 0 auto;
        }
        #container .threesixty .threesixty_images {
          display: none;
          list-style: none;
          margin: 0;
          padding: 0;
        }
        #container .threesixty .threesixty_images img {
          position: absolute;
          top: 0;
          width: 100%;
          height: auto;
          left: 0;
        }
        #container .threesixty .threesixty_images img.previous-image {
          visibility: hidden;
          width: 0;
        }
        #container .threesixty .threesixty_images img.current-image {
          visibility: visible;
          width: 100%;
        }
        #container .threesixty .spinner {
          width: 60px;
          display: block;
          margin: 0 auto;
          height: 30px;
          background: #333;
          background: rgba(0, 0, 0, 0.7);
          -webkit-border-radius: 5px;
          -moz-border-radius: 5px;
          border-radius: 5px;
        }
        #container .threesixty .spinner span {
          font-family: Arial, "MS Trebuchet", sans-serif;
          font-size: 12px;
          font-weight: bolder;
          color: #FFF;
          text-align: center;
          line-height: 30px;
          display: block;
        }
        #container .threesixty .nav_bar {
          position: absolute;
          top: 10px;
          right: 10px;
          z-index: 11;
        }
        #container .threesixty .nav_bar a {
          display: block;
          width: 32px;
          height: 32px;
          float: left;
          background: url(/demo/img/sprites.png) no-repeat;
          text-indent: -99999px;
        }
        #container .threesixty .nav_bar a.nav_bar_play {
          background-position: 0 0;
        }
        #container .threesixty .nav_bar a.nav_bar_previous {
          background-position: 0 -73px;
        }
        #container .threesixty .nav_bar a.nav_bar_stop {
          background-position: 0 -37px;
        }
        #container .threesixty .nav_bar a.nav_bar_next {
          background-position: 0 -104px;
        }
        /* html */
        #container:-webkit-full-screen {
          background: #ffffff;
          width: 100%;
          height: 100%;
          margin-top: 0;
          padding-top: 200px;
        } 
      </style>
      
      <!-- 360 PHOTO: http://360slider.com/default_control.html -->


      <script>
        window.onload = init;

        var product;
        function init(){

          $('#radio-rotate').click(function() {
            if($('#radio-rotate').is(':checked')) { 
              $("#panzoom").panzoom("disable");
              var rotate = true;

              $(".threesixty").css("pointer-events", "auto");
          }
            
          }); 

            product1 = $('.product1').ThreeSixty({
                totalFrames: 20, // Total no. of image you have for 360 slider
                endFrame: 20, // end frame for the auto spin animation
                currentFrame: 1, // This the start frame for auto spin
                imgList: '.threesixty_images', // selector for image list
                progress: '.spinner', // selector to show the loading progress
                imagePath:'assets/', // path of the image assets
                filePrefix: '<? echo $type; ?>', // file prefix if any
                ext: '.jpg', // extention for the assets
                height: 1600,
                width: 1080,
                disableSpin: true, // Default false
                navigation: false,
                responsive: true,
                framerate: 10,
                drag: true // Set to false to disble rotating
            }); 

        }
      </script>

      <!-- PINCH ZOOM: https://github.com/timmywil/jquery.panzoom -->
      <script>
        $(window).load(function(){
          $('#radio-zoom').click(function() {
            if($('#radio-zoom').is(':checked')) { 
              $("#panzoom").panzoom();
            }
          });

          $('#radio-zoom').click(function(event) {
            if($('#radio-zoom').is(':checked')) { 
              $("#panzoom").panzoom("enable");
              $(".threesixty").css("pointer-events", "none");
              
            }
          });
        });
      </script>

  </head>
  <body>
    <div class="container">
      <div id='container'>
        <div id="panzoom">
          <div  class="threesixty product1">
              <div class="spinner">
                  <span>0%</span>
              </div>
              <ol class="threesixty_images"></ol>
          </div>
        </div>
      </div>  
    </div>  

    <style>
    .checkbox input[type=checkbox], .checkbox-inline input[type=checkbox], .radio input[type=radio], .radio-inline input[type=radio] {opacity: 0;}
    .radio label {
      width: 50%;
      padding: 25px;
      background: #243F55;
      color:#fff;
      display: inline-block;
      float: left;
      text-align: center;
      font-size: 18px;
    }
    label i {margin-right: 5px;}
    </style>

    <div style="position:fixed;bottom:0;width:100%;">
      <div class="radio">
        <label style="border-right: 1px solid rgba(255, 255, 255, 0.2);"><input type="radio" name="optionsRadios" id="radio-rotate" value="option1" checked><i class="fa fa-undo"></i> Rotate</label>
      </div>
      <div class="radio">
        <label><input type="radio" name="optionsRadios" id="radio-zoom" value="option2"><i class="fa fa-arrows-alt"></i> Zoom / Move</label>
      </div>
     </div> 

  </body>
</html>