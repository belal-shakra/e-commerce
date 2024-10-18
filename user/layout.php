<?php include "functions/assets.php" ?>

<!DOCTYPE html>
<html lang="en">

<?php include "./user/partials/head.php" ?>

  <body class="goto-here">

    <?php include "./user/partials/navbar.php" ?>





    <main>
      <?php if (isset($content)) echo $content; ?>
    </main>






    <?php include asset("user") . "/partials/footer.php" ?>
    
    <?php include asset("user") . "/partials/loader.php" ?>

    <?php include asset("user") . "/partials/scripts.php" ?>
  </body>
</html>