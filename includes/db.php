<?php

session_start();


?>




<?php

$connection=mysqli_connect('localhost','root','','akurdiphpproject');
if($connection)
{
   //echo "connection successfully";
}
else
    echo "error";

?>