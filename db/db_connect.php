<?php

//  server:     remotehost.es 
//  hostname:   remotehost.es
//  database:   dweshoteldb
//  user:       student004 
//  password:   DWES20261014jordi2044!
// ftp:         DWES20261014jordi129!



$conn = mysqli_connect("localhost", "root", "", "hms", 3307);
// $conn = mysqli_connect("remotehost.es", "dwesuser1234", "DWES20261014ftp33!", "dweshoteldb");

if (!$conn)
  echo ("Algo ha salido mal");
