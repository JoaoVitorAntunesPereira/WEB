<?php 

$cidades = array("Foz do Iguaçu" => array("Habitantes" => 250000,
                                            "Área" => 500,
                                            "Altitude" => 145,
                                            "Estado" => "Paraná-PR"),
                 "Cascavel" => array("Habitantes" => 300000,
                                        "Área" => 420,
                                        "Altitude" => 320,
                                        "Estado" => "Paraná-PR"),
                 "Chapecó" => array("Habitantes" => 240000,
                                        "Área" => 120,
                                        "Altitude" => 620,
                                        "Estado" => "Santa Catarina-SC"),
                 "Blumenau" => array("Habitantes" => 330000,
                                        "Área" => 200,
                                        "Altitude" => 85,
                                        "Estado" => "Santa Catarina-SC"),
                 "Curitiba" => array("Habitantes" => 1500000,
                                        "Área" => 300,
                                        "Altitude" => 850,
                                        "Estado" => "Paraná-PR")
);

echo "<table border = 1>";
    echo "<tr>";
         echo "<td>Nome</td>";
         echo "<td>Habitantes</td>";
         echo "<td>Área</td>";
         echo "<td>Altitude</td>";
         echo "<td>Estado</td>";
    echo "</tr>";          
montarTabela($cidades);
echo "</table>";

function montarTabela($array){
        foreach ($array as $cidade => $dadosCidade){
                echo "<tr>";
                       echo "<td>".$cidade."</td>";
                       echo "<td>".$dadosCidade["Habitantes"]."</td>";
                       echo "<td>".$dadosCidade["Área"]."</td>";
                       echo "<td>".$dadosCidade["Altitude"]."</td>";
                       echo "<td>".$dadosCidade["Estado"]."</td>";
            echo "</tr>";
        }
}

