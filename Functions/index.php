<?php

function checkIfStringOfIds(string $IdsStringToCheck) :bool
{
    $regex = '/^[0-9;]+$/';
    if (!preg_match($regex, $IdsStringToCheck)) {
        echo "Vous n'avez pas saisit correctement les Ids.";
        return false;
    }
    return true;
}

function splitIdsInStringIntoArray(string $idsStringToSplit) :array
{
    $idsArray = explode(';', $idsStringToSplit);
    return $idsArray;
}