<?php
// questi due header sono per il CORS
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");
// //questo header mi serve per json_encode (giusto?)
header('Content-Type: application/json');

$file = "data.json";

$newTask = $_POST;
$dataStr = file_get_contents($file);
$data = json_decode($dataStr) ;
//nel data ci pushi il task che mi prendo col post
$data[] = $newTask;

$encData = json_encode($data);

file_put_contents($file, $encData);

echo $encData;

?>