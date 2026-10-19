<?php

//  server: remotehost.es 
//  hostname: remotehost.es
//  database: dweshoteldb
//  user: student004 
//  password: DWES20261014jordi2044!
// ftp -> DWES20261014jordi129!


$local = true;
// $local = false;

if ($local) {
  $conn = mysqli_connect("localhost", "root", "", "hms", 3307);
} else {
  $conn = mysqli_connect("remotehost.es", "student004", "DWES20261014jordi2044!", "dweshoteldb");
}

if (!$conn)
  echo ("Algo ha salido mal");
