<?php

echo "hello";
$url = 'http://localhost/Rest-API-PHP/public_html/api';
$class = '/user';
$param = '';

$response = file_get_contents($url.$class.$param);

//echo $response;


$response = json_decode($response, 1);

var_dump($response['data'][0]);