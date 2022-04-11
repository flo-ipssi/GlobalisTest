<?php

function foo($arr)
{
    $tab = [];

    // Récupère le tableau contenant le petit x
    $indexMin = 0;
    for ($i = 0; $i < count($arr); $i++) {
        $index = $i;
        if (isset($arr[$i + 1])) {
            if ($indexMin !== 0) {
                $index = $indexMin;
            }
            if ($arr[$i + 1][0] < $arr[$index][0]) {
                $indexMin = $i + 1;
            }
        }
    }


    // Récupère le tableau contenant le grand y
    $indexMax = 0;
    for ($i = 0; $i < count($arr); $i++) {
        $index = $i;
        if (isset($arr[$i + 1])) {
            if ($indexMax !== 0) {
                $index = $indexMax;
            }
            if ($arr[$i + 1][1] > $arr[$index][1]) {
                $indexMax = $i + 1;
            }
        }
    }

    // Filtrage Cas n°2 & n°3
    $newMin = $arr[$indexMin];

    // Verifie si le tableau et entouré par d'autre tableau
    if (isset($arr[$indexMin + 1])) {
        $next = $arr[$indexMin + 1];
    } elseif (isset($arr[$indexMin - 1])) {
        $next = $arr[$indexMin - 1];
    }

    // Si oui on reorganise
    if ($next) {
        if ($next[0] < $arr[$indexMin][1]) {
            $newMin = [$arr[$indexMin][0], $next[1]];
        }

        if ($newMin[1] === $arr[$indexMax][1]) {
            array_push($tab, $newMin);
        } else {
            array_push($tab, $newMin, $arr[$indexMax]);
        }
    }

    return $tab;
}
