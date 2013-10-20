<?php 
$dir    = "comics";
$files = scandir($dir, 1);
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


  <div class="row">
    <div class="large-4 large-centered columns">
    <div class="text-center">


		<table>
		  <thead>
		    <tr>
		      <th  class="text-center" width="50">#</th>
		      <th  class="text-center" width="250">Comic Title</th>
		    </tr>
		  </thead>
		  <tbody>
		    <?php

				foreach ($files as $value) {

					echo "<tr>";

					if (is_numeric($value)) {
						$title = (scandir("comics/".$value)[2]);
						$link = "<a href='/?num=" . $value . "'>" . $title . "</a>";

						echo "<td>" . $value . "</td>";
						echo "<td>" . $link  .  "</td>";
					}

					echo "</tr>";
				}
			?>
		  </tbody>
		</table>
    </div>
  </div>
  </div>


      

</body>
</html>