<? 
if(isset($_GET["dwn"])) { 

// Entête pour Ouvrir avec MSExcel 
header("content-type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; portfolio=".$_GET ["dwn"]); 

flush(); // Envoie le buffer 
readfile($_GET["dwn"]); // Envoie le fichier 

}?> 
