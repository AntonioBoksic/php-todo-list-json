<?php
// questi due header sono per il CORS
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");
// //questo header mi serve per json_encode (giusto?)
header('Content-Type: application/json');


// i dati li sposto nel file data.json e li trasformo in un json in quel file(io l'ho trasformati a mano ma Giovanni ha usato una roba che si chiama tipo "beautify") 

// $tasks = [
//     [ 'description' => 'trovare guybrush'],
//     [ 'description' => 'fare il bucato'],
// ]; 

//ora devo richiamare questi dati in questa pagina, lo faccio con get file_get_contents()
// !!!!!!! mi ritorna una stringa

$tasksStr = file_get_contents('data.json');

$tasks = json_decode($tasksStr);

//con json_encode trasformo i dati in un json in modo che può leggerli Vue quando li chiama con Axios
//quello che non passa per l encode l'utente frontend non può vederlo (da quello che ho capito)
echo json_encode($tasks)
?>
