<?
// code api ảnh lấy data từ file json
/* Json cần có dạng là
[
    {
        "url": "https://cdn.leanhtruong.net/boy/b5f31ba09895794723c429e7022d058d489c0aa7d3cc2fab398b184ef8cab778.png"
    },
    {
        "url": "https://cdn.leanhtruong.net/boy/10f4591f2d29af235bf4855733a04528a4e81d6f18de0a46d187d84b29a766d5.png"
    }
]
*/
$g = 'boy.json'; // nhập tên file json hoặc đừờng dẫn tới json
$q = 'url'; // dữ liệu có trong json file ở trên là (url)
$a = json_decode(file_get_contents($g), TRUE);
$c = array_rand($a);
$url = $a[$c]["$q"]; // url sau khi random ra
$json = array(
    'url' => $url,
);
echo json_encode($json, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);