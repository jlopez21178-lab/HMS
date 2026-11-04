<?php

//  server:     remotehost.es 
//  hostname:   remotehost.es
//  database:   dweshoteldb
//  user:       student004 
//  password:   DWES20261014jordi129!
// ftp:        


/*

DROP TABLE IF EXISTS `004_reservation`;
DROP TABLE IF EXISTS `004_category_characteristic`;
DROP TABLE IF EXISTS `004_characteristic`;
DROP TABLE IF EXISTS `004_room`;
DROP TABLE IF EXISTS `004_category`;
DROP TABLE IF EXISTS `004_address`;
DROP TABLE IF EXISTS `004_worker`;
DROP TABLE IF EXISTS `004_customer`;
DROP TABLE IF EXISTS `004_hotel`;

*/
// $localhost = false;
$localhost = true;

$conn = mysqli_init();

// flags necesarias para el buen funcionamiento de la conexion
$flags = MYSQLI_CLIENT_FOUND_ROWS; //  devuelve el numero de filas que coinciden en vez de las filas afectadas en el UPDATE 

if ($localhost) {
  $conn->real_connect(
    "localhost",
    "root",
    "",
    "hms",
    3307,
    null,
    $flags
  );
} else {
  $conn->real_connect(
    "remotehost.es",
    "dwesuser1234",
    "DWES20261014ftp33!",
    "dweshoteldb",
    null,
    null,
    $flags
  );
}

// $conn->set_charset("utf8");

if (!$conn)
  echo ("Algo ha salido mal");
