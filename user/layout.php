<?php
  function asset($side = ""){
    return (basename($_SERVER["SCRIPT_FILENAME"]) != "index.php")? ".." : $side;
  }
?>

<!DOCTYPE html>
<html lang="en">

  <?php include asset("user") . "/partials/head.php" ?>

  <body class="goto-here">

    <?php include asset("user") . "/partials/navbar.php" ?>





    <main>
      <?php if (isset($content)) echo $content; ?>
    </main>






    <?php include asset("user") . "/partials/footer.php" ?>
    
    <?php include asset("user") . "/partials/loader.php" ?>

    <?php include asset("user") . "/partials/scripts.php" ?>
  </body>
</html>