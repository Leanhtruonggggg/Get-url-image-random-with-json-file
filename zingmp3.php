<?php
$ip = $_SERVER['REMOTE_ADDR'];
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
$ip = $_SERVER['HTTP_CLIENT_IP'];
} else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
}
if (isset($_GET['get'])) {
    $api_key = $_GET['get'];
    }
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}
if (isset($_GET['download'])) {
    $down = $_GET['download'];
}
if($api_key == "true"){
$t = [' '];
$c = ['%20'];
$s = str_replace($t, $c, $search);
$ch2 = curl_init();
curl_setopt($ch2, CURLOPT_URL, 'http://ac.mp3.zing.vn/complete?type=artist,song,key,code&num=6&query='.$s);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($ch2);
curl_close($ch2);
$cu = json_decode($result);
$avt = 'https://photo-zmp3.zadn.vn/';
// lấy thông tin sau khi search
// 0
$image = $cu->data[0]->song[0]->thumb;
$artist = $cu->data[0]->song[0]->artist;
$name = $cu->data[0]->song[0]->name;
$id = $cu->data[0]->song[0]->id;
$duration = $cu->data[0]->song[0]->duration;
// 1
$image1 = $cu->data[0]->song[1]->thumb;
$artist1 = $cu->data[0]->song[1]->artist;
$name1 = $cu->data[0]->song[1]->name;
$id1 = $cu->data[0]->song[1]->id;
$duration1 = $cu->data[0]->song[1]->duration;
// 2
$image2 = $cu->data[0]->song[2]->thumb;
$artist2 = $cu->data[0]->song[2]->artist;
$name2 = $cu->data[0]->song[2]->name;
$id2 = $cu->data[0]->song[2]->id;
$duration2 = $cu->data[0]->song[2]->duration;
// 3
$image3 = $cu->data[0]->song[3]->thumb;
$artist3 = $cu->data[0]->song[3]->artist;
$name3 = $cu->data[0]->song[3]->name;
$id3 = $cu->data[0]->song[3]->id;
$duration3 = $cu->data[0]->song[3]->duration;
// 4
$image4 = $cu->data[0]->song[4]->thumb;
$artist4 = $cu->data[0]->song[4]->artist;
$name4 = $cu->data[0]->song[4]->name;
$id4 = $cu->data[0]->song[4]->id;
$duration4 = $cu->data[0]->song[4]->duration;
// 5
$image5 = $cu->data[0]->song[5]->thumb;
$artist5 = $cu->data[0]->song[5]->artist;
$name5 = $cu->data[0]->song[5]->name;
$id5 = $cu->data[0]->song[5]->id;
$duration5 = $cu->data[0]->song[5]->duration;
//
$in = array (
"success" => "true",
"search" => $search,
"type" => "mp3.zing.vn",
'search_result' => 
  array (
    0 => 
    array (
"number" => "1",
"name" => $name,
"artist" => $artist,
      'id' => 
      array (
"id" => $id,
"image" => "$avt$image",
      ),
"time" => "$duration giây",
    ),
    1 => 
    array (
"number" => "2",
"name" => $name1,
"artist" => $artist1,
      'id' => 
      array (
"id" => $id1,
"image" => "$avt$image1",
      ),
"time" => "$duration1 giây",
    ),
        2 => 
    array (
"number" => "3",
"name" => $name2,
"artist" => $artist2,
      'id' => 
      array (
"id" => $id2,
"image" => "$avt$image2",
      ),
"time" => "$duration2 giây",
    ),
        3 => 
    array (
"number" => "4",
"name" => $name3,
"artist" => $artist3,
      'id' => 
      array (
"id" => $id3,
"image" => "$avt$image3",
      ),
"time" => "$duration3 giây",
    ),
        4 => 
    array (
"number" => "5",
"name" => $name4,
"artist" => $artist4,
      'id' => 
      array (
"id" => $id4,
"image" => "$avt$image4",
      ),
"time" => "$duration4 giây",
    ),
        5 => 
    array (
"number" => "6",
"name" => $name5,
"artist" => $artist5,
      'id' => 
      array (
"id" => $id5,
"image" => "$avt$image5",
      ),
"time" => "$duration5 giây",
    ),
  ),
  "author" => "Lê Anh Trường",
  "facebook" => "https://www.facebook.com/real.leanhtruong",
  "ip" => $ip,
);
header('Content-Type: application/json');
header('Content-type: text/javascript');
$truong = json_encode($in, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES );
echo $truong;}

// down music
if($down == "true"){
if (isset($_GET['id'])) {
    $idmp3 = $_GET['id'];
}
$ch = curl_init();
$url="http://api.mp3.zing.vn/api/streaming/audio/$idmp3/128";
$filename = "music/$idmp3-leanhtruong-25102005.m4a"; 
$file = fopen($filename,'w');
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_BUFFERSIZE,64000);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_FRESH_CONNECT, TRUE); //not cache
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FAILONERROR, true);
curl_setopt($ch, CURLOPT_FILE, $file);
curl_setopt($ch, CURLOPT_PROGRESSFUNCTION, 'progress1');
curl_setopt($ch, CURLOPT_NOPROGRESS, false);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
$html = curl_exec($ch);
curl_close($ch);
$js = array(
"success" => "true",
"url_media" => "https://simsimi.info/v2/music/$idmp3-leanhtruong-25102005.m4a",
"author" => "Lê Anh Trường",
"ip" => $ip,
);
header('Content-Type: application/json');
header('Content-type: text/javascript');
$truong = json_encode($js, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES );
echo $truong;
}