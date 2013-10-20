<?php
function change_password(){ 
if( isset($_POST) ) {
                          
    $xml=simplexml_load_file("data.xml");

        if (hash('ripemd160' , $_POST['old_password']) == $xml->password) {


		$xml->password = hash('ripemd160' , $_POST['new_password']);
		$xml->asXML("data.xml");

		return true;

        }else{
        	return false;
        }
	} 
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
                      <div class="large-8 large-centered columns">
                          <h3><?php 

                          if (change_password()){
                          	echo "password changed";
                          }else{
                          	echo "Something went wrong";
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