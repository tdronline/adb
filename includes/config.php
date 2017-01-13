<?php
//MySQL Details
$host = "localhost";
$user = "root";
$password = "1234";
$database = "music-db";

$db = new mysqli($host,$user,$password,$database);

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

//Disk Containing Movies
define("SONG_PATH",'E:'.DIRECTORY_SEPARATOR.'TDr'.DIRECTORY_SEPARATOR.'Music');
//define("MV_PATH",'E:'.DIRECTORY_SEPARATOR.'Movies');
define("WEB_URL",'http://www.songdb.lk');
define("LASTFM_API", 'ba4a6e1040f17e4171ae5c213eb669d6');
?>