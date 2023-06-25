<?php
// questi due header sono per il CORS
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");
// //questo header mi serve per json_encode (giusto?)
header('Content-Type: application/json');

//file da cui prendiamo e in cui poi inseriamo i dati
$file = "data.json";

//mi prendo i dati che mi arrivano con axios
$newTask = $_POST;
//mi prendo i dati da data.json
$dataStr = file_get_contents($file);
//li decodifico (trasformo da stringa a oggetto php)
$data = json_decode($dataStr);

//nel data ci pushi il task che mi prendo col post
// ! ! ! QUA NON CAPISCO COME FACCIO A PUSHARE DATI IN UN OGGETTO COME SE FOSSE UN ARRAY
$data[] = $newTask;


//encodo i miei dati per passarli nel file data.json
$encData = json_encode($data);

// rimetto i dati nel file data.json
file_put_contents($file, $encData);

//? ? ? QUESTO A CHE SERVE??
//! ! !questa è la risposta che do alla chiamata axios, la chiamata post è vero che inserisce un dato da qualche parte (vedere il $_post sopra), ma dà anche una risposta e la risposta deve essere displayata con l'echo 
//in App.vue la risposta viene usata per sostituire i dati nell array tasks con i quali facciamo il vfor
echo $encData;

?>