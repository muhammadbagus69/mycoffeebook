<?php

$getID = $db->getRow("SELECT FROM kriteria WHERE id='$id'");

api_ok($getID);