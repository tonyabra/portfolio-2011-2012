<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />

    <title>this is my portfolio</title>

    <style type="text/css">

<?php
      include './scripts/label.php';
      $caption = ".Yes... Hello there. Please click on the following ... Trial Graphics ... one a day ... throw your thoughts away ... WBEZ ... thank you";
      $caption = formatCaption($caption);
      $lastChar = '@';
      $firstPos = spin('g', $lastChar, $pos);
      $time = 20;
?>

    html, body{
      background: #000;
    }

    img.mbody{
      position: absolute; 
      z-index: 5;
      top: 200px;
      left: 0px;
    }

    img.mlip{
      position:absolute;
      z-index: 1;
      top: 333px;
      left: 657px;
    }

    img.mwheel{
      position:absolute;
      z-index: 4;
      top: 70px;
      left: 176px;
      -webkit-transform: rotate(<?php echo $firstPos; ?>deg);
      -transform: rotate(<?php echo $firstPos; ?>deg);
    }

    img.mdot{
      position:absolute;
      z-index: 5;
      top: 248px;
      left: 353px;
    }

    .tape{
      position:absolute;
      z-index: 3;
      top: 395px;
      left: 525px;
      margin-right: 100px;
      height: 146px;
      width: <?php echo measCap($caption, $wid); ?>px;
      background-image: url('./label/tape.png'); 
      background-repeat: repeat-x;
    }   

    .tapeWrapper{
      height: 55px;
      width: 100%;
      overflow: hidden;
     }

    a img{
     border: none;
    }

    img.letter{
     float: right;
     margin: 8px 3px 0 0;
    }

    .window{
      position:absolute;
      z-index: 5;
      top: 394px;
      left: 550px;
      display: block;
      height: 100px;
      width: 50px;
      background: black;
      filter: alpha(opacity=65);                                                                           
      opacity: 0.65;  
    }

    img.mwheel{
     -webkit-animation-name: rotWK;            
     -webkit-animation-duration: <?php echo $time; ?>s;                                 
     -webkit-animation-timing-function: linear;   
     -webkit-animation-iteration-count: 1;

     animation-name: rot;            
     animation-duration: <?php echo $time; ?>s;                                 
     animation-timing-function: linear;   
     animation-iteration-count: 1;
    }

   @-webkit-keyframes rotWK{
     <?php processString(strrev($caption), $pos, $firstPos, "-webkit-"); ?>
   }

   @keyframes rot{
     <?php processString(strrev($caption), $pos, $firstPos, ""); ?>
   }

    .tape{
     -webkit-animation-name: stretchWK;
     -webkit-animation-duration: <?php echo $time; ?>s;
     -webkit-animation-timing-function: linear;
     -webkit-animation-iteration-count: 1;

     animation-name: stretch;
     animation-duration: <?php echo $time; ?>s;
     animation-timing-function: linear;
     animation-iteration-count: 1;
    }

   @-webkit-keyframes stretchWK{
          0% {width: 100px;}
          10% {width: 100px;}
          100% {width: <?php echo measCap($caption, $wid); ?>px;}
   }

   @keyframes stretch{
          0% {width: 100px;}
          10% {width: 100px;}
          100% {width: <?php echo measCap($caption, $wid); ?>px;}
   }
    </style>
  
    <script src="scripts/scripts.js" language="javascript"></script>

</head>

<body>

<div class="window"></div>
<div class="tape">
<div class="tapeWrapper">
  <?php printCaption($caption); ?>
</div>
</div>
</div>

<img class="mbody" src="./label/body.png"/>
<img class="mdot" src="./label/dot.png" />
<img class="mlip" src="./label/lip.jpg" />
<img class="mwheel" src="./label/wheel.png" />

</body>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript" src="./scripts/scripts.js"></script>

</html>
