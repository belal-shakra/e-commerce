<?php
  function asset(){
    $path = explode("/", $_SERVER["SCRIPT_FILENAME"]);
    $one = count($path) -1;
    $two = count($path) -2;
    return ("$path[$two]/$path[$one]" != "admin/index.php")? "../.." : ".";
  }
?>




<!DOCTYPE html>
<html lang="en" style="overflow-x: hidden;">

  <?php require asset() . "/partials/head.php" ?>
  
  <body>

      <?php
        if(basename($_SERVER["SCRIPT_FILENAME"]) != "login.php"){
          require asset() . "/partials/navbar.php";
          require asset() . "/partials/sidebar.php";
        }
      ?>
      



      <?php if(basename($_SERVER["SCRIPT_FILENAME"]) != "login.php"): ?>
        <main id="main" class="main">
          <?php if (isset($content)) echo $content; ?>
        </main>
        
        <?php else :?>
          <main style="margin: 30px 0px;">
            <?php if (isset($content)) echo $content; ?>
          </main>
      <?php endif; ?>
      
      



      <?php if(basename($_SERVER["SCRIPT_FILENAME"]) != "login.php"): ?>

        <?php require asset() . "/partials/footer.php" ?>
        
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
        
        <?php require asset() . "/partials/scripts.php" ?>
        
      <?php endif; ?>
  </body>

</html>