<?php 

$numIni;
$numFim;

if(isset($_GET['numIni']) && $_GET['numIni'] >= 1){
    $numIni = $_GET['numIni'];
}else{
    $numIni = 1;
}

if(isset($_GET['numFim']) && $_GET['numFim'] <= 100){
    $numFim = $_GET['numFim'];
}else{
    $numFim = 100;
}

for($i = $numIni; $i <= $numFim; $i++){
    echo $i."<br>";
}
