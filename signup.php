<?php
session_start();

include_once 'connection-config.php';
include_once 'models/User.php';

$database = new Database();
$db = $database->connect();

$user = new User($db);
$data = json_decode(file_get_contents("php://input"));