<?php


function connect() {
  $conn = mysqli_connect("localhost","digitabl_public","#Vok2t2(@Wyr","digitabl_bitso");
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    return null;
  }
  return $conn;
}

 ?>
