<?php

if( isset($_POST['password']) ) {
                          
    $xml=simplexml_load_file("data.xml");

      if (hash('ripemd160' , $_POST['password']) == $xml->password) {

?>
        
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

<div class="text-center">
<h2>Comic Upload</h2>
<div class="row">
  <div class="large-8 large-centered columns">  
    <div class="panel">
      <form action="file_upload.php" method="post"
      enctype="multipart/form-data" onSubmit="return validate()" >

        <div class="row">
          <div class="large-4 large-centered columns">
            <label for="file"><h3>File:</h3></label>
            <input type="file" name="file" id="file" />
          </div>
        </div>

        <div class="row">
          <div class="large-4 large-centered columns">
            <label><h3>Title:</h3></label>
            <input type="text" name="title" id="title" />
          </div>
        </div>

        <div class="row">
          <div class="small-2 small-centered columns">
            <input class="button prefix" type="submit" name="submit" value="Submit" />
          </div>
        </div>

      </form>
    
        <div class="row">
          <div class="large-8 large-centered columns">
            <div class="small-6 columns">
              <a href="file_delete.php" class="button">Delete Latest Comic</a>
            </div>

            <div class="small-6 columns">
              <a href="index.php" class="button">Return to Front Page</a>
            </div>
          </div>
        </div>

        <br>
        <br>
        <br>

        <div class="row">
          <div class="large-4 large-centered columns">
            <h4>Password Reset</h4>
            <form action="password_reset.php" method="post">
            <label>Old Password</label>
            <input type="password" name="old_password" id="old_password" />
            <label>New Password</label>
            <input type="text" name="new_password" id="new_password" />

            <div class="row">
              <div class="small-6 small-centered columns">
                <input class="button prefix" type="submit" name="change" value="change" />
              </div>
            </div>

            </form>
          </div>
        </div>

      
    </div>
  </div>
</div>
</div>
</body>
</html>


<?php
  }else{
?>
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
<div class="text-center">
<h2>Faulty Login</h2>
</div>

        <div class="row">
          <div class="large-3 large-centered columns text-center">
              <a href="admin.php" class="button">Try Again?</a>

            </div>
          </div>        

          <div class="row">
          <div class="large-3 large-centered columns text-center">
              <a href="index.php" class="button">Return to Front Page</a>
            </div>
          </div>


</body>
</html>


<?php
}   
}else{
  header("Location: admin.php");
}

?>
