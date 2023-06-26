<?php
// questi due header sono per il CORS
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");
// //questo header mi serve per json_encode (giusto?)
header('Content-Type: application/json');

//file da cui prendiamo e in cui poi inseriamo i dati
$file = "data.json";

//prendo l'indice del task che mi interessa
$index = $_POST["indice"];

//mi prendo i dati da data.json
$dataStr = file_get_contents($file);
//li decodifico (trasformo da stringa a oggetto php)
$data = json_decode($dataStr);

//eseguo l'operazione che mi interessa sui dati, in questo caso invertire proprietà completed del task con l'index che mi sono passato
if ($data[$index]->completed==="true") {
   $data[$index]->completed="false";
} else {
    $data[$index]->completed="true";
};

//encodo i miei dati per passarli nel file data.json
$encData = json_encode($data);

// rimetto i dati nel file data.json
file_put_contents($file, $encData);


//? ? ? QUESTO A CHE SERVE??
//! ! !questa è la risposta che do alla chiamata axios, la chiamata post è vero che inserisce un dato da qualche parte (vedere il $_post sopra), ma dà anche una risposta e la risposta deve essere displayata con l'echo 
//in App.vue la risposta viene usata per sostituire i dati nell array tasks con i quali facciamo il vfor
echo $encData;;
?>