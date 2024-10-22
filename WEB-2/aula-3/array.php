<?php 

$vetor = array(4, 5, 7, 9, 10);

echo "$vetor[1]";
echo "<br>";
echo "$vetor[4]";
echo "<br>";
array_push($vetor , "duzentos");
echo "$vetor[5]";
echo "<br> <br>";

echo "percorrendo com FOR:";

for($i = 0; $i < count($vetor); $i++){
    echo '<br> '. $vetor[$i];
}

echo "<br> <br>";
echo "percorrendo com FOREACH:";

foreach ($vetor as $var){
    echo "<br> $var";
}