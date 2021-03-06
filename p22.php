<?php
//Realizado por Maximiliano Hitter, 2021
//https://github.com/MaximilianoHitter
/*Programa censo
int $cantEncuestas, $cantHabitantes, $cantMenores, $casasConMenores, $jefeConMasMenores, $acumuladorPersonas, $contadorEncuestas
float $promedioTotal
string $nombreCompletoJefe, $jefeConMasMenoresStr
*/
//break 1

echo "Ingrese cuantas encuestas desea realizar: \n";
$cantEncuestas = trim(fgets(STDIN));
while (!is_numeric($cantEncuestas) || !isset($cantEncuestas)) {
    echo "Ingrese un número válido.\n";
    $cantEncuestas = trim(fgets(STDIN));
}
if ($cantEncuestas > 0) {
    //Comenzar encuesta e inicializar variables
    $casasConMenores = 0;
    $jefeConMasMenores = 0;
    $jefeConMasMenoresStr = "Ninguno";
    $cantMenores = 0;
    $acumuladorPersonas = 0;
    $promedioTotal = 0;
    $contadorEncuestas = 0;
    $nombreCompletoJefe = "None";//Break 1
    for ($i = 1; $i <= $cantEncuestas; $i++) {
        //Número de encuesta
        echo "Encuesta n°: " . $i."\n";

        //Datos del jefe del hogar
        echo "Ingrese nombre del jefe del hogar: \n";
        $nombreCompletoJefe = trim(fgets(STDIN));
        while (!ctype_alpha($nombreCompletoJefe)) {
            echo "No ha ingresado un nombre válido, vuelva a ingresarlo por favor.\n";
            $nombreCompletoJefe = trim(fgets(STDIN));
        }

        //Datos de cantidad de habitantes
        echo "Ingrese la cantidad de habitantes que residen en la vivienda: \n";
        $cantHabitantes = trim(fgets(STDIN));
        while ($cantHabitantes < 1) {
            echo "Ha ingresado una cantidad de habitantes nula, por favor ingrese un valor mayor o igual a 1. Recuerde que para que viva un menor en la casa debe vivir mínimamente un adulto en la misma.\n";
            $cantHabitantes = trim(fgets(STDIN));
        }

        //Datos de niños menores
        echo "Ingrese la cantidad de niños menores de la vivienda: \n";
        $cantMenores = trim(fgets(STDIN));
        while ($cantMenores >= $cantHabitantes || $cantMenores < 0) {
            echo "Ha ingresado una cantidad de menores no válida, recuerde que la cantidad de menores debe ser inferior a la cantidad de habitantes y debe ser mayor o igual a 0.\n";
            echo "Vuelva a ingresar el valor de la cantidad de menores para corregirlo: \n";
            $cantMenores = trim(fgets(STDIN));
        }
        
        //Cantidad de viviendas con menores
        if ($cantMenores > 0) {
            $casasConMenores++;
        }

        //Jefe de hogar con mas menores a cargo
        if ($jefeConMasMenores < $cantMenores) {
            $jefeConMasMenoresStr = $nombreCompletoJefe;
            $jefeConMasMenores = $cantMenores;
        }

        //Acumulador de cantidad de personas
        $acumuladorPersonas += $cantHabitantes;

        $contadorEncuestas = $i;
    }//Break 2

    //Cantidad de encuestas realizadas
    echo "La cantidad de encuestas realizadas fue: " . $contadorEncuestas . "\n";

    //Cantidad de viviendas con menores
    echo "La cantidad de viviendas con menores es: " . $casasConMenores . "\n";

    //Jefe de hogar con mayor cantidad de menores
    echo "El jefe de hogar con mayor cantidad de menores es: " . $jefeConMasMenoresStr . "\n";

    //Promedio de cantidad de habitantes por vivienda
    $promedioTotal = $acumuladorPersonas / $contadorEncuestas;
    echo "El promedio de habitantes por vivienda ha dado: " . $promedioTotal . "\n";
} else {
    echo "No se realizará ninguna encuesta.\n";
}
