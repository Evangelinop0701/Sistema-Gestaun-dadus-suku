<?php


function convert_loron($data_inisio, $data_segundo)
{
    $pri = new DateTime($data_inisio);
    $seg = new DateTime($data_segundo);

    if ($pri > $seg) {
        return("0");
    } else {
        $d = $seg->diff($pri)->d;
        return $d;

    }

}
function convert_fulan($data_inisio, $data_segundo)
{
    $pri = new DateTime($data_inisio);
    $seg = new DateTime($data_segundo);

    if ($pri > $seg) {
        return("0");
    } else {
        $m = $seg->diff($pri)->m;
        return $m;


    }

}
function convert_tinan($data_inisio, $data_segundo)
{
    $pri = new DateTime($data_inisio);
    $seg = new DateTime($data_segundo);

    if ($pri > $seg) {
        return("0");
    } else {
        $y = $seg->diff($pri)->y;
        return $y;
    }

}
