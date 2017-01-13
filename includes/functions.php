<?php
require_once("config.php");

function runQuery($Q)
{
    global $db;
    $data = $db->query($Q);
    return $data;
}

function addSong()
{
    $Q = "INSERT INTO `songs`(`title`, `artist`, `album`, `year`, `genre`, `track`, `lyricis`, `music`, `info`, `isrc`) 
    VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10])";
    $data = runQuery($Q);
    return $data;
}
function checkSong($string){
    $Q = "SELECT * FROM `songs` WHERE `title` = '$string' OR `artist`";
    $res = runQuery($Q);
    return $res->numrows;
}
function searchSong($string){
    $Q = "SELECT * FROM `songs` WHERE `title` = '$string' OR `artist`";
    $res = runQuery($Q);
    if($res->numrows > 0){
       /* foreach($data = $res->fetch_object()){

        }*/
    }
}
function apiResponse($artist,$track){
    $api = LASTFM_API;
    $request = file_get_contents ("http://ws.audioscrobbler.com/2.0/?method=track.getInfo&api_key=$api&artist=$artist&track=$track&format=json");
    return $request;
}