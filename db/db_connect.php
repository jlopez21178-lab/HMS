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



$conn = mysqli_connect("localhost", "root", "", "hms", 3307);
// $conn = mysqli_connect("remotehost.es", "dwesuser1234", "DWES20261014ftp33!", "dweshoteldb");

if (!$conn)
  echo ("Algo ha salido mal");
