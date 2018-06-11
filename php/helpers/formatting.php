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

function completeMsg($msg) {
    
    switch ($msg) {
        case '':
            break;
        case 'updated':
            $msg = 'Job Listing Updated Successfully';
            break;
        case 'deleted':
            $msg = 'Job Listing Deleted';
            break;
        case 'added':
            $msg = 'Job Listing Added Successfully';
            break;
        default:
            $msg = 'No action taken. Please try again.';
            break;
    }
    return $msg;
}

function deleteJobListing($id) {  
    $query = "DELETE FROM joblistings WHERE id = ".$id;
    $delete_row = $db->delete($query);

}
