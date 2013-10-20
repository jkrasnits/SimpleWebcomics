<?php
function counter()
{

 $File = "counter.txt"; 
 //This is the text file we keep our count in, that we just made 
 
 $handle = fopen($File, 'r+') ; 
 //Here we set the file, and the permissions to read plus write 
 
 $data = fread($handle, 512) ; 
 //Actully get the count from the file 
 
 $count = $data + 1; 
 //Add the new visitor to the count 

 
 fseek($handle, 0) ; 
 //Puts the pointer back to the begining of the file 
 
 fwrite($handle, $count) ; 
 //saves the new count to the file 
 
 fclose($handle) ; 
 //closes the file 

 return $count;

}
?>





<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" > <!--<![endif]-->

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title></title>

  
  <link rel="stylesheet" href="css/foundation.css">

  <script src="js/vendor/custom.modernizr.js"></script>

</head>
<body>

<br>
<br>
<br>
<br>


<div class="text-center">
    <div class="row">
          <div class="large-8 large-centered columns">  
                <div class="panel">

                    <div class="row">
                      <div class="large-6 large-centered columns">
                 		
                 		<?php  


							if ((($_FILES["file"]["type"] == "image/gif")
							|| ($_FILES["file"]["type"] == "image/jpeg")
							|| ($_FILES["file"]["type"] == "image/png")
							|| ($_FILES["file"]["type"] == "image/pjpeg"))
							&& ($_FILES["file"]["size"] < 10000000))
							{
							if ($_FILES["file"]["error"] > 0)
							{
							echo "File Error : " . $_FILES["file"]["error"] . "<br />";
							}else {
							echo "Upload File Name: " . $_FILES["file"]["name"] . "<br />";
							echo "File Type: " . $_FILES["file"]["type"] . "<br />";
							echo "File Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />"; 
							echo "File Description:: ".$_POST['title']."<br />";


							$file_count = counter();
							mkdir("comics/" . $file_count);

							move_uploaded_file($_FILES["file"]["tmp_name"],"comics/". $file_count . "/". $_POST['title']);
							echo "Stored in: " . "comics/" . $file_count ."<br />";}
							}else
							{
							echo "Invalid file detail ::<br> file type ::".$_FILES["file"]["type"]." , file size::: ".$_FILES["file"]["size"];
							}

                 		?>
						Uploaded File:<br>


						<img src="comics/<?php echo $file_count . "/" . $_POST['title']; ?>" alt="Image path Invalid" >



                      </div>
                    </div>


                    <div class="row">
                      <div class="large-8 large-centered columns">
                        <div class="small-6 columns">
                          <a href="admin_panel.php" class="button">Return to Admin Panel</a>
                        </div>

                        <div class="small-6 columns">
                          <a href="index.php" class="button">Return to Front Page</a>
                        </div>
                      </div>
                    </div>
                </div>
          </div>
    </div>
</div>
</body>
</html>