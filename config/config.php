<?php
    // Query Database
    require_once('connect.php');
    $sql0 = "DELETE FROM visitor_data WHERE date_visit <= DATE_SUB(CURRENT_DATE, INTERVAL 13 MONTH) ";
    mysqli_query($conn, $sql0);

    // count visitor
    function getVisit($thesisYear) {
        $sql2 = "SELECT COUNT(*) as in_year, COUNT(IF(date_visit = CURRENT_DATE, 1, NULL)) as in_today 
            FROM visitor_data WHERE page_visit = '$thesisYear' AND YEAR(date_visit) = YEAR(CURRENT_DATE)";

        return $sql2;
    }

    date_default_timezone_set("Asia/Bangkok");
    $nowYear = date("Y") + 543;


    // HeadTag
    function setTagInHead() {
        echo '<meta charset="utf-8">';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
        echo '<meta name="format-detection" content="telephone=no">';
        // icon
        echo '<link rel="icon" type="image/x-icon" href="favicon.ico">';
        // CSS
        echo '<link rel="stylesheet" href="resources/css/mainCSS_2021-2023.css">';
        echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';
        // Bootstrap 4
        echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">';
        echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>';
        echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>';
        echo '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>';
    }
?>