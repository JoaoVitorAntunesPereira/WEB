<?php 
echo "<head>  
      <link rel='stylesheet' href='style.css'>
      </head>";

$pessoas = array(0 => array("Nome" => "Manuel de Medeiros",
                            "Endereço" => "Rua das Acácias",
                            "Cidade" => "Foz do Iguaçu",
                            "UF" => "PR"),
                1 => array("Nome" => "Juliana de Amaral",
                           "Endereço" => "Rua das Pinheiros",
                           "Cidade" => "FLorianópolis",
                           "UF" => "SC"),
                2 => array("Nome" => "Rodrigo Baidek",
                           "Endereço" => "Rua Dom Pedro I",
                           "Cidade" => "Petrópolis",
                           "UF" => "RJ"),
                3 => array("Nome" => "Fabíola da Silva",
                           "Endereço" => "Rua Chile",
                           "Cidade" => "Guarulhos",
                           "UF" => "SP"));

echo "<table>";
    echo "<tr class = 'cabecalho'>";
        echo "<td>Nome</td>";
        echo "<td>Endereço</td>";
        echo "<td>Cidade</td>";
        echo "<td>UF</td>";
    echo "</tr>";
    foreach ($pessoas as $valor) {
        echo "<tr>";
            echo "<td>".$valor['Nome']."</td>";
            echo "<td>".$valor['Endereço']."</td>";
            echo "<td>".$valor['Cidade']."</td>";
            echo "<td>".$valor['UF']."</td>";
        echo "</tr>";
    }
echo "</table>";