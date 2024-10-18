<?php
function asset($side = ""){
  return (basename($_SERVER["SCRIPT_FILENAME"]) != "layout.php")? ".." : $side;
}
?>