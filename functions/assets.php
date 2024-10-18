<?php
function asset($side = "user"){
  return (basename($_SERVER["SCRIPT_FILENAME"]) != "index.php")? ".." : $side;
}
?>