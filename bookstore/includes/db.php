<?php
  $connection=mysqli_connect('localhost','root','root','bookminar');
  if(!$connection)
  {
      die("connection failed".mysqli_error($connection));
      
  }
?>