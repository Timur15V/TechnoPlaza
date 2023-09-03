<?php

   // mysqli_connect
   $connect = mysqli_connect('localhost', 'root', '', 'TechnoPlazaDB');

   if (!$connect){
      die('Error connect to DataBase');
   }