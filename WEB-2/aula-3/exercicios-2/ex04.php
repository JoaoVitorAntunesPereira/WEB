<?php

$carros = array(0 => array("modelo" => "Polo",
                          "marca" => "Volkswagen",
                          "linkImagen" => "https://cdn.motor1.com/images/mgl/Ak29KP/s3/volkswagen-polo-track-2023-teste.jpg"),
               1 => array("modelo" => "Onix",
                          "marca" => "Chevrolet",
                          "linkImagen" => "https://cdn.motor1.com/images/mgl/0e477z/s3/chevrolet-onix-joy.jpg"),
               2 => array("modelo" => "Han",
                          "marca" => "BYD",
                          "linkImagen" => "https://cdn.motor1.com/images/mgl/9m4Bbv/s1/byd-han-dm-i-2025.jpg"),
               3 => array("modelo" => "Song Pro",
                          "marca" => "BYD",
                          "linkImagen" => "https://cdn.motor1.com/images/mgl/9mNMP1/s1/byd-song-pro-dm-i---dianteira.jpg"),
               3 => array("modelo" => "Yuan Plus",
                          "marca" => "BYD",
                          "linkImagen" => "https://cdn.motor1.com/images/mgl/40mjrK/s3/avaliacao---byd-yuan-plus-br-4.jpg")
);

foreach ($carros as $item) {
    echo "<div style = 'border: solid 1px; width: 300px; margin-top: 20px'>";
    echo $item["modelo"] . "<br>";
    echo $item["marca"] . "<br>";
    echo "<img style = 'width: 100%; height: auto;' src = '" . $item["linkImagen"] . "' />";
    echo "</div>";
}
