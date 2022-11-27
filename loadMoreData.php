<?php

require('db_config.php');

$sql = "SELECT * FROM post 
   WHERE id_post < {$_POST['last_id']} ORDER BY id_post DESC LIMIT 8";

$result = $mysqli->query($sql);

$json = include('data.php');

?>