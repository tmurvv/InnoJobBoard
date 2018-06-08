<?php 

/*
*Format the date
*/

function formatDate($date) {
    return date('F j, Y, g:i a',strtotime($date));
}

function concatText($text) {
    return substr($text, 0, 350);
}
