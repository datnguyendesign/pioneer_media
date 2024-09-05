<?php

header("Location:index.php");
setcookie("user_id","",time()-(86400*30),"/");

?>