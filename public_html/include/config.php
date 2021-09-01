<?php
session_start();
//set_time_limit(0);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//error_reporting(0);

date_default_timezone_set("America/Argentina/Buenos_Aires");

require_once('constants.php');

// Create connection
$conn = new mysqli($dirBD, $usuarioBD, $passBD, $nombreBD);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM textos ORDER BY tex_id";
$result = $conn->query($sql);

$sql = "SELECT * FROM videos ORDER BY vid_id";
$videos = $conn->query($sql);

$sql = "SELECT * FROM menu ORDER BY menu_id";
$menu = $conn->query($sql);
?>