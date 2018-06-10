<?php 

/*
*Format the date
*/

function formatDate($date) {
    $date = date_create($date);
    return date('F j, Y');
}

function concatText($text) {
    return substr($text, 0, 350);
}
