<?php
  function asset($side = ""){
    return (basename($_SERVER["SCRIPT_FILENAME"]) != "index.php")? ".." : $side;
  }
?>