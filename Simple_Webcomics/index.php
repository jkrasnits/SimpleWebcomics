<?php 

$number_of_comics = count(scandir("comics")) - 2;



if (isset($_GET["num"])){

	if ($_GET["num"]>0 && $_GET["num"]<=$number_of_comics) {
		$current_comic = $_GET["num"];
    $previous_comic = $current_comic - 1;
		$next_comic = $current_comic + 1;
	} else{
		$current_comic = $number_of_comics;
		$previous_comic = $current_comic - 1;
		$next_comic = $current_comic + 1;
	}
        
    } else{
		$current_comic = $number_of_comics;
        $previous_comic = $current_comic - 1;
		$next_comic = $current_comic + 1;
    }


	$file1 = scandir("comics/".$current_comic, 1);

	$current_file = "comics/".$current_comic . "/" . $file1[0];


?>


<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title></title>

  
  <link rel="stylesheet" href="css/foundation.css">

  <script src="js/vendor/custom.modernizr.js"></script>

</head>
<body>


<!-- Nav -->

<div class="row" >
  <div class="navigation">
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="archive.php">Archive</a></li>
    </ul>
  </div>
</div>

  
<!-- End Header and Nav -->

<!-- Image Title -->
    <div class="row">
    <div class="text-center">
    <h1><?php echo $file1[0]; ?></h1>

  </div>


<!-- Comic Image, If no comics are uploaded 
you will get errors here, but if you do, the 
code will find out what comic the page is supposed 
to be on and insert the link into the html -->

    <div class="row">
    <div class="large-12 columns">
    <div class="text-center">
 		<img class="comic_img" src="<?php 

      if ($number_of_comics==0) {
        echo "http://placehold.it/1000x450&text=You need to upload comics first!";
      } else {
        echo $current_file;
      }
    ?>" alt="Image path Invalid">
    <hr/>
    </div>
    </div>
  </div>
      
<!-- Call to Action Panel -->

<div class="row">
    <div class="large-12 columns">
    
      <div class="panel">            
        <div class="row">
          <div class="text-center">
          <div class="large-9 large-centered columns">

            <a href="index.php"><img id="comic_nav" src="img/last.png"></a>

          <!-- These are the forward and backwards comics, they work by dynamically generating a link for the next and previous comics -->
            <a href="<?php echo '?num=' . $next_comic; ?>"><img id="comic_nav" src="img/Comic_Arrow_Left.png"></a>


            <a href="<?php echo '?num=' . $previous_comic; ?>"><img id='comic_nav' src='img/Comic_Arrow_Right.png'></a>
            
            <a href="?num=1"><img id="comic_nav" src="img/first.png"></a>

            </div>
          </div>
        </div>
      </div> 
    </div>
  </div>



</body>
</html>
