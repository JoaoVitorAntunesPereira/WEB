<?php 

$numIni;
$numFim = $_GET['numFim'];

if(isset($_GET['numIni'])){
    $numIni = $_GET['numIni'];
}else{
    $numIni = 1;
}

if(isset($_GET['numFim'])){
    $numFim = $_GET['numFim'];
}else{
    $numFim = 1;
}

for($i = $numIni; $i <= $numFim; $i++){
    echo $i."<br>";
}
