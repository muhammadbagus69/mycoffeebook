<?php

$id = $_GET['id'];

$getID = $db->getRow("SELECT * FROM resep WHERE id_kategori='$id'");

api_ok($getID);