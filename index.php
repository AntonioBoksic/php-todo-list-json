<?php
// questi due header sono per il CORS
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");
//questo header mi serve per json_encode (giusto?)
header('Content-Type: application/json');

$tasks = [
    [ 'description' => 'fare la spesa'],
    [ 'description' => 'fare il bucato'],
];

echo json_encode($tasks)
?>
