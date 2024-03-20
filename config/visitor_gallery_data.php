<?php

    require_once('connect_db.php');
    $response = array();
    $gallery = array();
    $response["success"] = false;
    $gallery["success"] = false;

    /* ========== เพิ่มข้อมูลผู้เข้าชมเว็บ ========== */
    function getUserIP() {  // Get real visitor IP behind CloudFlare network
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];
    
        if (filter_var($client, FILTER_VALIDATE_IP)) {
            $ip = $client;
        } else if (filter_var($forward, FILTER_VALIDATE_IP)) {
            $ip = $forward;
        } else {
            $ip = $remote;
        }
    
        return $ip;
    }

    if ( isset($_POST['userTimezone']) ) {
        $user_ip = getUserIP(); // Output IP address [Ex: 177.87.193.134]
        $user_agent = $_SERVER['HTTP_USER_AGENT'];  
        session_start();
        $session_id = session_id();
        $name_timezone_js = $_POST['userTimezone'];
        $name_page = $_POST['pageOpen'];
        
        // Query Database
        $sql1 = "INSERT IGNORE INTO visitor_data 
            SET datetime_visit = NOW(), date_visit = CURRENT_DATE, time_visit = CURRENT_TIME, session_id = '$session_id', 
                client_ip = '$user_ip', user_agent = '$user_agent', client_timezone = '$name_timezone_js', 
                page_visit = '$name_page' ";
        
        if (mysqli_query($conn, $sql1)) {
            $response["success"] = true;
        }

        echo json_encode($response);
    }
    if (isset($_POST['ybe'])) {
        $year_thesis    = $_POST['ybe'];
        $code_major     = $_POST['maj'];

        // เข้าถึงไฟล์
        $dir0       = '../resources/images/2021-2023/thesis_collection/'. $year_thesis .'/';
        $folders    = scandir($dir0);
        $arrF0 = array();
        foreach ($folders as $v0) {
            if (strpos($v0, $code_major) !== false) {
                $arrF0[] = $v0;
            }
        }

        $gallery["success"] = true;
        $gallery["thesis_year"] = $year_thesis;
        $gallery["code_major"] = $code_major;
        $gallery["maj_file_name"] = $arrF0;

        echo json_encode($gallery);
    }
    

    mysqli_close($conn);


    // echo json_encode($response);
    
?>