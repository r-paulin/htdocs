<?php
    $ip = $_SERVER['REMOTE__ADDR'];
    $data = file_get_contents("http://ip-api.com/json/80.233.218.18");
    $json = json_decode($data, true);
    var_dump($json)
?>