<?php
error_reporting(-1);
ini_set('display_errors', 'On');

require_once "db_handler.php";

$db = new DbHandler();

$data = json_encode($db->data());

echo $data;
?>