<?php 

$pos = array( "a" => 1,
              "b" => 2,
              "c" => 3,
              "d" => 4,
              "e" => 5,
              "f" => 6,
              "g" => 7,
              "h" => 8,
              "i" => 9,
              "j" => 10,
              "k" => 11,
              "l" => 12,
              "m" => 13,
              "n" => 14,
              "o" => 15,
              "p" => 16,
              "q" => 17,
              "r" => 18,
              "s" => 19,
              "t" => 20,
              "u" => 21,
              "v" => 22,
              "w" => 23,
              "x" => 24,
              "y" => 25,
              "z" => 26, 
              " " => 27,
	      "slash" => 33,
              "@" => 34,
              "2" => 35,
              "3" => 36,
              "4" => 37,
              "5" => 38,
              "6" => 39,
              "7" => 40,
              "8" => 41,
              "9" => 42);

$wid = array( "a" => 26,
              "b" => 27,
              "c" => 26,
              "d" => 26,
              "e" => 25,
              "f" => 24,
              "g" => 27,
              "h" => 27,
              "i" => 13,
              "j" => 26,
              "k" => 29,
              "l" => 27,
              "m" => 27,
              "n" => 26,
              "o" => 27,
              "p" => 25,
              "q" => 26,
              "r" => 25,
              "s" => 23,
              "t" => 25,
              "u" => 26,
              "v" => 26,
              "w" => 30,
              "x" => 27,
              "y" => 28,
              "z" => 25,
              " " => 15,
              "slash" => 28,
              "@" => 15,
              "2" => 25,
              "3" => 25,
              "4" => 27,
              "5" => 25,
              "6" => 26,
              "7" => 26,
              "8" => 27,
              "9" => 28);

function spin($start, $end, $post){

  $startNum =  $post[$start];
  $endNum = $post[$end];
  $clockwise = 0;
  $counter = 0;
  $rotate = 0;

  if ($startNum >= $endNum){
     $counter = 42 - $startNum + $endNum;
     $clockwise = $startNum - $endNum;
  }
  else{
    $clockwise = 42 - $endNum + $startNum;
    $counter = $endNum - $startNum;
  }

  if ($clockwise <= $counter){
     $rotate = $clockwise * 8.58;
  }
  else{
     $rotate = $counter * -8.58;
  }

  return $rotate;
}

function processString($stringIn, $post, $firstAngle, $prefix){

	 $length = strlen($stringIn);
	 $caption = $stringIn[strlen($stringIn)-1] . $stringIn;
	 $steps = 90 / $length;
	 $currPer = 10;
	 $currRotate = $firstAngle;
	 $currDeg = 0;
	 $nextDeg = 0;

	 echo "0% {{$prefix}transform: rotate({$currRotate}deg);}\n";
	
         echo "{$currPer}% {{$prefix}transform: rotate({$currRotate}deg);}\n";

	for ($i = 0; $i < $length; $i++) {
	  $currPer += $steps;
	  $currDeg = $caption[$i];
	  $nextDeg = $caption[$i+1];
          $currRotate +=  spin($currDeg, $nextDeg, $post);

          printf ("%01.2f", $currPer); 
 	  echo "% {{$prefix}transform: rotate({$currRotate}deg);} \n";
	 }

}

function printCaption($stringIn){

  	$length = strlen($stringIn);
	$caption = $stringIn;
	
   	    for ($i = $length - 1; $i >= 0; $i--) {
				
   	        if (($i > 148) && ($i < 157)){
				echo "<a href=\";\" class=\"birdsLink\"><img class=\"letter\" src=\"./label/letters/" . $caption[$i] . ".jpg\" /></a>\n";
   	    	}
   	    	else{
   	    		echo "<img class=\"letter\" src=\"./label/letters/" . $caption[$i] . ".jpg\" />\n";
   	    	}
   	    
   	    }

}

function measCap($stringIn, $wid){

        $length = strlen($stringIn);
	$width = 0;
	$letter = 0;
	$caption = $stringIn;

        for ($i = 0; $i < $length; $i++) {
            $letter = $caption[$i];
	    $width += $wid[$letter];
        }

        return $width + 805;
}

function formatCaption($stringIn){
	 $caption = strtolower($stringIn);
	 $caption = $caption . "   ";
	 $caption = str_replace(" ", "_", $caption);
	 $caption = str_replace(".", "@", $caption);

	 return $caption;
}

?>
