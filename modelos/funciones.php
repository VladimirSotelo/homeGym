<?php
class Funciones
{

    static public function cambiaFormatoFecha($fechaOriginal)
    {
        $partesStamp = explode(" ", $fechaOriginal);
        $partesFecha = explode("-", $partesStamp[0]);
        return $partesFecha[2] . "/" . $partesFecha[1] . "/" . $partesFecha[0];
    }

}