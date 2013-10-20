<?php



function deleteDir($dirPath) {
    if (! is_dir($dirPath)) {
        throw new InvalidArgumentException("$dirPath must be a directory");
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            self::deleteDir($file);
        } else {
            unlink($file);
        }
    }
    rmdir($dirPath);
}







function de_counter()
{

 $File = "counter.txt"; 
 //This is the text file we keep our count in, that we just made 
 
 $handle = fopen($File, 'r+') ; 
 //Here we set the file, and the permissions to read plus write 
 
 $data = fread($handle, 512) ; 
 //Actully get the count from the file 
 
 deleteDir("comics/" . $data);


 $count = $data - 1; 
 //Add the new visitor to the count 

 fseek($handle, 0) ; 
 //Puts the pointer back to the begining of the file 
 
 fwrite($handle, $count) ; 
 //saves the new count to the file 
 
 fclose($handle) ; 
 //closes the file 



}


 $File = "counter.txt";
 $handle = fopen($File, 'r+') ; 
 //Here we set the file, and the permissions to read plus write 
 
 $data = fread($handle, 512) ; 
 //Actully get the count from the file 
?>




<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" > <!--<![endif]-->

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title></title>

  
  <link rel="stylesheet" href="/comic_upload_v1.2//css/foundation.css">

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
                        <h3><?php 

                        if ($data>0) {
                            de_counter();
                            echo "file deleted";
                        } else{
                            echo "there are no files";
                        }

                        ?></h3>
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