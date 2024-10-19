<?php
  function asset(){
    $path = explode("/", $_SERVER["SCRIPT_FILENAME"]);
    $one = count($path) -1;
    $two = count($path) -2;
    return ("$path[$two]/$path[$one]" != "admin/index.php")? "../.." : ".";
  }
?>




<!DOCTYPE html>
<html lang="en">

  <?php require asset() . "/partials/head.php" ?>
  
  <body>

      <?php require asset() . "/partials/navbar.php" ?>
      
      <?php require asset() . "/partials/sidebar.php" ?>
      



      
      <main id="main" class="main">
        <?php if (isset($content)) echo $content; ?>
      </main>
      
      




      
      <?php require asset() . "/partials/footer.php" ?>
      
      <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
      
      <?php require asset() . "/partials/scripts.php" ?>
  </body>

</html>