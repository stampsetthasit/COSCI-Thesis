<?php
    // Query Database
    require_once('config/db_connection.php');
    require_once('config/visitor_gallery_data.php');
    
    $sql2 = getVisit('Thesis-2022');
    $query2 = mysqli_query($conn, $sql2);
    $dataCnt = mysqli_fetch_array($query2);
    $cntToday = $dataCnt['in_today'];
    $cntYear = $dataCnt['in_year'];
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <title>COSCI Inovation Thesis 2022</title>
    <?php setTagInHead(); ?>

    <!-- ===== Fonts ===== -->
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Mitr:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Titan+One&display=swap" rel="stylesheet">

    <style>
        /* Head */
        .headding {
            padding: 18px 10px;
            text-align: center;
            background-image: url(resources/images/2021-2023/bg_01.jpg);
            background-repeat: no-repeat;
            background-position: center top;
            background-size: cover;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            width: 100%;
            position: relative;
            overflow-x: hidden;
        }
        .headding img { pointer-events: none; }
        .headding #barLine {
            position: absolute;
            width: 86%;
            height: 3em;
            left: 7%;
            right: 7%;
            top: 4.75em;
        }
        .headding #barGem {
            position: absolute;
            width: 7.5em;
            left: calc(7% - 2.85em);
            top: 2.5em;
        }
        .headding #barDeco {
            position: absolute;
            width: 6.5em;
            right: calc(7% - 2.85em);
            top: 2.75em;
        }
        .headRight .indiv {
            font-family: 'Chakra Petch', sans-serif;
            text-align: center;
            padding-top: 20px;
            float: right;
            color: white;
        }
        .headRight h3 {
            margin-top: 18px;
            font-size: 2em;
            color: black;
        }
        .headLeft { text-align: left; }
        .headLeft #mainLogo {
            width: 260px;
            margin-top: 3.7em;
            margin-left: 1.5em;
        }
        .headLeft #barStar {
            display: block;
            height: 50px;
            margin-top: 10px;
            margin-left: -15px;
        }
        #headImage {
            padding-top: 36px;
            padding-bottom: 40px;
            text-align: center;
        }
        #headImage img { width: 90%; }

        /* Slide */
        .textSlideR, .textSlideL {
            padding: 6px 0;
            z-index: 1;
        }
        .textSlideR span {
            animation: rslide 50s linear infinite reverse;
        }
        .textSlideL span {
            animation: rslide 50s linear infinite;
        }

        /* Major */
        .majorthesis {
            font-family: 'Mitr', sans-serif;
            padding-top: 14px;
            padding-bottom: 110px;
            background-image: url(resources/images/2021-2023/bg_05.png);
            background-repeat: no-repeat;
            background-position: center 14px;
            background-size: 115%;
                -webkit-background-size: 115%;
                -moz-background-size: 115%;
        }
        .majorthesis .logoThesis {
            display: block;
            margin-top: 80px;
            margin-bottom: 60px;
            width: 35%;
        }
        #cardArea {
            width: 100%;
            overflow: hidden;
            padding-top: 60px;
            padding-bottom: 50px;
            perspective: 1000px;
        }
        #cardArea img {
            position: absolute;
            display: inline-block;
            left: 0;
            width: 18%;
            background-color: transparent;
            transform-style: preserve-3d;
            transition: transform 0.6s;
            cursor: pointer;
            opacity: 0;
            box-shadow: 0 4px 6px 0 rgba(0,0,0,0.4);
            animation: cardMove 16s linear infinite reverse;
            -webkit-animation: cardMove 16s linear infinite reverse;
        }
        #cardArea img:hover { width: 18.5%; }
        #cardArea img:nth-child(1) { animation-delay: 0s; }
        #cardArea img:nth-child(2) { animation-delay: 2s; }
        #cardArea img:nth-child(3) { animation-delay: 4s; }
        #cardArea img:nth-child(4) { animation-delay: 6s; }
        #cardArea img:nth-child(5) { animation-delay: 8s; }
        #cardArea img:nth-child(6) { animation-delay: 10s; }
        #cardArea img:nth-child(7) { animation-delay: 12s; }
        #cardArea img:nth-child(8) { animation-delay: 14s; }

        @keyframes cardMove {
            0% {
                left: -200%;
                opacity: 0;
                transform: rotateY(0deg);
                -webkit-transform: rotateY(0deg);
            }
            58% {
                transform: rotateY(360deg);
                -webkit-transform: rotateY(360deg);
                opacity: 0;
            }
            63%, 96% {
                opacity: 1;
            }
            62%, 94% {
                transform: rotateY(0deg);
                -webkit-transform: rotateY(0deg);
            }
            100% {
                left: 100%;
                opacity: 0;
                transform: rotateY(360deg);
                -webkit-transform: rotateY(360deg);
            }
        }
        @-webkit-keyframes cardMove {
            0% {
                left: -200%;
                opacity: 0;
                transform: rotateY(0deg);
            }
            58% {
                transform: rotateY(360deg);
                opacity: 0;
            }
            63%, 96% {
                opacity: 1;
            }
            62%, 94% {
                transform: rotateY(0deg);
            }
            100% {
                left: 100%;
                opacity: 0;
                transform: rotateY(360deg);
            }
        }

        #areaShowCard, #areaShowText {
            margin: 0;
            text-align: center;
            padding-top: 120px;
            padding-bottom: 50px;
        }
        #areaShowCard #blankCard {
            width: 90%;
            display: inline-block;
        }
        #areaShowCard .flipCard {
            background-color: transparent;
            display: inline-block;
            perspective: 1000px;
        }
        #areaShowCard .flipCardInner {
            position: relative;
            width: 100%;
            height: 100%;
            text-align: center;
            transition: transform 0.6s;
            transform-style: preserve-3d;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.4);
        }
        #areaShowCard .flipCard:hover .flipCardInner {
            transform: rotateY(-360deg);
            -webkit-transform:  rotateY(-360deg);
            -moz-transform:     rotateY(-360deg);
            -ms-transform:      rotateY(-360deg);
            -o-transform:       rotateY(-360deg);
        }
        @keyframes flip-720deg {
            100% {
                transform: rotateY(-720deg);
                -webkit-transform:  rotateY(-720deg);
                -moz-transform:     rotateY(-720deg);
                -ms-transform:      rotateY(-720deg);
                -o-transform:       rotateY(-720deg);
            }
        }
        @-webkit-keyframes flip-720deg {
            100% {
                transform: rotateY(-720deg);
            }
        }
        .animateFlipCard {
            animation-name: flip-720deg;
            animation-duration: 1s;
        }
        #areaShowCard .flipCardFront, #areaShowCard .flipCardBack {
            position: absolute;
            width: 100%;
            height: 100%;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
        }
        #areaShowCard .flipCardBack {
            transform: rotateY(180deg);
        }
        .table-container {
            height: 100%;
            width: 100%;
            display: table;
        }
        .table-cell {
            vertical-align: middle;
            height: 100%;
            display: table-cell;
        }
        .boxMajorText {
            display: inline-block;
            text-decoration: none;
            padding: 14px;
            background-color: #C4C4C4;
            border-radius: 26px;
            width: 90%;
            font-size: 1.55em;
            color: black;
        }
        .boxMajorText:hover {
            text-decoration: none;
            color: black;
        }

        /* Video */
        .divVideo {
            padding: 0 !important;
            background-image: url(resources/images/2021-2023/bg_01.jpg);
            background-repeat: repeat;
            background-position: center;
            background-size: cover;
            -webkit-background-size: cover;
            -moz-background-size: cover;
        }

        /* Thesis Detail */
        .thesisdetail {
            font-family: 'Mitr', sans-serif;
            min-height: 90vh;
            padding-top: 20px;
            padding-bottom: 110px;
            background-image: url(resources/images/2021-2023/bg_05.png);
            background-repeat: no-repeat;
            background-position: center top;
            background-size: cover;
            -webkit-background-size: cover;
            -moz-background-size: cover;
        }
        .thesisdetail .divleft, .thesisdetail .divright {
            padding-top: 110px;
        }
        .thesisdetail .divleft h2 {
            font-weight: 800;
            margin-top: 2px;
        }
        .thesisdetail .divleft h4 {
            margin-top: 18px;
            line-height: 30px;
        }
        .thesisdetail .divleft p {
            padding: 4px 0px;
        }
        .thesisdetail .divleft a {
            display: inline-block;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            float: right;
            margin-right: 25px;
            margin-top: 14px;
            padding: 10px 16px;
            background-color: #C4C4C4;
            color: black;
        }
        .thesisdetail .divleft a:hover {
            text-decoration: none;
            background-color: #B0B0B0;
            color: black;
        }
        


        @media only screen and (max-width: 2000px) {
            /* ===== Header ===== */
            .headding #barLine {
                width: 90%;
                left: 5%;
                right: 5%;
            }
            .headding #barDeco { right: calc(5% - 2.85em); }
            .headding #barGem { left: calc(5% - 2.85em); }
            #headImage img { width: 98%; }

            /* Major Card */
            .majorthesis {
                padding-bottom: 60px;
                background-position: center 8px;
                background-size: cover;
                -webkit-background-size: cover;
                -moz-background-size: cover;
            }
            .majorthesis .logoThesis { margin-bottom: 35px; }
            #cardArea img { width: 22%; }
            #cardArea img:hover { width: 22.5%; }
            #areaShowCard, #areaShowText { padding-top: 80px; }
            .boxMajorText { width: 94%; }
        }
        @media only screen and (max-width: 1190px) {
            /* Major Thesis */
            .majorthesis .logoThesis {
                margin-top: 70px;
                margin-left: 12px;
                width: 35%;
            }
            #areaShowCard #blankCard { width: 96%; }
        }
        @media only screen and (max-width: 992px) {
            /* Major Thesis */
            .majorthesis .logoThesis { margin-bottom: 30px; }
            #cardArea { padding-top: 50px; }
            #cardArea img { width: 24%; }
            #cardArea img:hover { width: 24.5%; }
            #areaShowCard, #areaShowText { padding-top: 60px; }
            .boxMajorText { font-size: 1.25em; }

            /* Footer */
            .divfootter .div03 {
                padding-left: 30px;
                padding-right: 30px;
            }
            .visitp { text-align: center; }
            .visittb {
                width: 98%;
                margin: auto;
                margin-top: -10px;
            }
            .visittb tr td:nth-child(1) {
                text-align: right;
                width: 50%;
                padding-right: 10px;
            }
            .visittb tr td:nth-child(2) {
                text-align: left;
                width: 50%;
                padding-left: 8px;
            }

            /* ===== Thesis Detail ===== */
            .thesisdetail .divleft, .thesisdetail .divright {
                padding-top: 80px;
            }
        }
        @media only screen and (max-width: 768px) {
            /* ===== Header ===== */
            .headding #barLine {
                width: 86%;
                height: 4em;
                left: 7%;
                right: 7%;
                top: 5em;
            }
            .headding #barDeco {
                width: 7.5em;
                right: calc(7% - 2.85em);
                top: 2.85em;
            }
            .headding #barGem {
                width: 9em;
                left: calc(7% - 2.85em);
                top: 2.65em;
            }
            .headLeft, .headRight {
                text-align: center;
            }
            .headRight .indiv {
                float: none;
                padding-top: 30px;
            }
            .headRight h3 {
                font-weight: bold;
                font-size: 2.25em;
                text-shadow: 0 0 5px white;
                text-shadow: 0 0 20px white, 0 0 30px white, 0 0 40px white, 0 0 50px white, 0 0 60px white, 0 0 70px white, 0 0 80px white;
            }
            .headLeft #mainLogo {
                width: 262px;
                margin-top: 4.35em;
                margin-left: auto;
            }
            .headLeft #barStar {
                height: 46px;
                margin: 20px auto;
                margin-top: 16px;
            }

            /* Major Thesis */
            #areaShowCard { padding-bottom: 40px; }
            #areaShowText { padding-top: 10px; }
            #areaShowCard #blankCard { width: 52%; }
            .boxMajorText {
                padding: 12px;
                width: 86%;
            }

            /* ===== Thesis Detail ===== */
            .thesisdetail { min-height: 120vh; }
            .thesisdetail .divleft { padding-top: 50px; }
            .thesisdetail .divleft p, .thesisdetail .divleft a {
                margin-right: 0;
            }
            .thesisdetail .divright {
                margin-top: 40px;
            }
        }
        @media only screen and (max-width: 460px) {
            /* ===== Header ===== */
            .headding #barLine {
                width: 80%;
                left: 10%;
                right: 10%;
                height: 3em;
                top: 4.9em;
            }
            .headding #barDeco {
                width: 6.5em;
                right: calc(10% - 2.85em);
                top: 2.9em;
            }
            .headding #barGem {
                width: 6.55em;
                left: calc(10% - 2.85em);
                top: 2.95em;
            }
            .headLeft #mainLogo {
                margin-top: 4.25em;
                width: 52%;
            }
            .headLeft #barStar {
                height: 38px;
                margin-top: 10px;
            }

            /* Major Thesis */
            .majorthesis .logoThesis {
                margin-top: 60px;
                margin-bottom: 10px;
                width: 50%;
            }
            #cardArea { padding-top: 40px; }
            #cardArea img { width: 28%; }
            #cardArea img:hover { width: 28.5%; }
            #areaShowCard { padding-top: 30px; }
            #areaShowText { padding-top: 0px; }
            #areaShowCard #blankCard { width: 56%; }
            .boxMajorText { font-size: 1em; }

            /* Thesis Detail */
            .thesisdetail {
                min-height: 150vh;
                padding-bottom: 30px;
            }
        }
        @media only screen and (max-width: 375px) {
            /* ===== Header ===== */
            .headLeft #barStar {
                height: 30px;
                margin-top: 1em;
            }
            .headRight h3 {
                font-size: 1.95em;
            }

            /* Major Thesis */
            .boxMajorText {
                padding: 10px;
                font-size: 0.9em;
            }
        }


        
    </style>
</head>
<body>

    <div class="headding">
        <img src="resources/images/2021-2023/bg_bar1.png" id="barLine">
        <img src="resources/images/2021-2023/bg_bar1_gem.png" id="barGem">
        <img src="resources/images/2021-2023/bg_bar1_deco.png" id="barDeco">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-1 col-md-1"></div>
                <div class="col-lg-6 col-md-5 headLeft">
                    <img src="resources/images/2021-2023/main_logo2022.png" id="mainLogo">
                    <img src="resources/images/2021-2023/bg_star2.png" id="barStar">
                </div>
                <div class="col-lg-4 col-md-5 headRight">
                    <div class="indiv">
                        <h4>นิทรรศการออนไลน์</h4>
                        <h3>นวัตกรรมสื่อสารนิพนธ์</h3>
                        <h5>
                            วิทยาลัยนวัตกรรมสื่อสารสังคม <br><span>มหาวิทยาลัยศรีนครินทรวิโรฒ</span>
                        </h5>
                    </div>
                </div>
                <div class="col-lg-1 col-md-1"></div>

                <div class="col-lg-1 col-md-1"></div>
                <div class="col-lg-10 col-md-10" id="headImage">
                    <img src="resources/images/2021-2023/poster_main2022.png">
                </div>
                <div class="col-lg-1 col-md-1"></div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <p class="textSlideR">
            <span>
                &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
            </span>
        </p>

        <div class="row majorthesis" id="idmajorthesis">
            <div class="col-lg-1 col-md-1"></div>
            <div class="col-lg-10 col-md-10">
                <img src="resources/images/2021-2023/main_logo_thesis2022.png" class="logoThesis">

                <div id="cardArea">
                    <img src="resources/images/2021-2023/cardf_commu2022.png" style="visibility: hidden; position: relative;">
                    <img src="resources/images/2021-2023/cardf_tour2022.png" id="tour2022" alt="COSCI_Tour2022">
                    <img src="resources/images/2021-2023/cardf_cinema2022.png" id="cinema2022" alt="COSCI_Cinema2022">
                    <img src="resources/images/2021-2023/cardf_cyber2022.png" id="cyber2022" alt="COSCI_Cyber2022">
                    <img src="resources/images/2021-2023/cardf_health2022.png" id="health2022" alt="COSCI_Health2022">
                    <img src="resources/images/2021-2023/cardf_multi2022.png" id="multi2022" alt="COSCI_Multi2022">
                    <img src="resources/images/2021-2023/cardf_inno2022.png" id="inno2022" alt="COSCI_Inno2022">
                    <img src="resources/images/2021-2023/cardf_thesisALL.png" id="thesisALL" alt="COSCI Thesis">
                    <img src="resources/images/2021-2023/cardf_commu2022.png" id="commu2022" alt="COSCI_Commu2022">
                </div>
            </div>
            <div class="col-lg-1 col-md-1"></div>

            <div class="col-lg-2 col-md-1"></div>
            <div class="col-lg-3 col-md-4">
                <div id="areaShowCard">
                    <div class="flipCard" id="showFlipCard">
                        <div class="flipCardInner">
                            <div class="flipCardFront">
                                <img src="resources/images/2021-2023/cardf_commu2022.png" alt="Thesis2022" id="getImgFCard" style="width:100%;">
                            </div>
                            <div class="flipCardBack">
                                <img src="resources/images/2021-2023/cardb_commu2022.png" alt="Thesis2022" id="getImgBCard" style="width:100%;">
                            </div>
                        </div>
                    </div>
                    
                    <img src="resources/images/2021-2023/card_blank2022.png" id="blankCard">
                </div>
            </div>
            <div class="col-lg-5 col-md-6">
                <div class="table-container">
                    <div class="table-cell">
                        <div id="areaShowText">
                            <a href="#idmajorthesis" class="boxMajorText" id="boxnoSelect">
                                .. กดเลือกการ์ดด้านบน ..
                            </a>
                            <!-- https://www.facebook.com/ExclusiveCOXIThesisExhibition -->
                            <a href="https://www.commuexhibition.com" class="boxMajorText" id="boxcommu2022" target="_blank">
                                วิชาเอกคอมพิวเตอร์เพื่อการสื่อสาร<br>Computer for Communication
                            </a>
                            <a href="https://www.facebook.com/TourismThesisExhibition" class="boxMajorText" id="boxtour2022" target="_blank">
                                วิชาเอกการสื่อสารเพื่อการท่องเที่ยว<br>Tourism Communication
                            </a>
                            <a href="https://www.facebook.com/KeepRollingThesis" class="boxMajorText" id="boxcinema2022" target="_blank">
                                สาขาภาพยนตร์และสื่อดิจิทัล<br>Cinema and Digital Media
                            </a>
                            <a href="https://www.facebook.com/CyberSMEsHeroesThesis" class="boxMajorText" id="boxcyber2022" target="_blank">
                                วิชาเอกการจัดการธุรกิจไซเบอร์<br>Cyber Business Management
                            </a>
                            <a href="https://www.facebook.com/HealthThesisExhibition.COSCI" class="boxMajorText" id="boxhealth2022" target="_blank">
                                วิชาเอกการสื่อสารเพื่อสุขภาพ<br>Health Communication
                            </a>
                            <!-- https://www.facebook.com/Multi.Xhibition -->
                            <a href="http://ronkhongexhibition.com" class="boxMajorText" id="boxmulti2022" target="_blank">
                                วิชาเอกการออกแบบสื่อปฏิสัมพันธ์และมัลติมีเดีย<br>Interactive and Multimedia Design
                            </a>
                            <a href="https://www.facebook.com/innocosciswu/" class="boxMajorText" id="boxinno2022" target="_blank">
                                วิชาเอกการสื่อสารเพื่อการจัดการนวัตกรรม<br>Innovation Management Communication
                            </a>
                            <a href="thesis_all.php" class="boxMajorText" id="boxthesisALL">
                                รวมนิทรรศการนวัตกรรมสื่อสารนิพนธ์<br>COSCI Thesis Exhibition
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-1"></div>
        </div>

        <p class="textSlideL">
            <span>
                &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
            </span>
        </p>

        <!-- Video Youtube -->
        <div class="row">
            <div class="col-lg-12 divVideo">
                <div class="row" style="margin: 0; padding-top: 100px; padding-bottom: 80px;">
                    <div class="col-lg-2 col-md-1"></div>
                    <div class="col-lg-8 col-md-10" data-san="slideTop">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/306-8ddB4UQ?autoplay=0&playlist=306-8ddB4UQ&loop=1" style="border:1px solid black;" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-1"></div>
                </div>
            </div>
        </div>

        <p class="textSlideR">
            <span>
                &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
                CO-LLECTION! &nbsp; &nbsp; CO-LLECTION! &nbsp; &nbsp; 
            </span>
        </p>

        <div class="row thesisdetail">
            <div class="col-lg-1"></div>
            <div class="col-lg-6 col-md-6 divright">
                <div class="slideshowContainer">
                    <div class="mySlides">
                        <img src="resources/images/2021-2023/poster_commu2022.jpg" style="width:100%">
                    </div>
                    <div class="mySlides">
                        <img src="resources/images/2021-2023/poster_tour2022.jpg" style="width:100%">
                    </div>
                    <div class="mySlides">
                        <img src="resources/images/2021-2023/poster_cinema2022.jpg" style="width:100%">
                    </div>
                    <div class="mySlides">
                        <img src="resources/images/2021-2023/poster_cyber2022.jpg" style="width:100%">
                    </div>
                    <div class="mySlides">
                        <img src="resources/images/2021-2023/poster_health2022.jpg" style="width:100%">
                    </div>
                    <div class="mySlides">
                        <img src="resources/images/2021-2023/poster_multi2022.jpg" style="width:100%">
                    </div>
                    <div class="mySlides">
                        <img src="resources/images/2021-2023/poster_inno2022.jpg" style="width:100%">
                    </div>

                    <!-- Next and previous buttons -->
                    <a class="slideprev" onclick="plusSlides(-1)">
                        <img src="resources/images/2021-2023/button_back1.png">
                    </a>
                    <a class="slidenext" onclick="plusSlides(1)">
                        <img src="resources/images/2021-2023/button_next1.png">
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 divleft">
                <div class="myDetails">
                    <h2>Exclusive CO'XI </h2>
                    <h4 data-san-delay="400" data-san="slideTop">
                        Computer for Communication <br>
                        วิชาเอกคอมพิวเตอร์เพื่อการสื่อสาร
                    </h4>
                    <br>
                    <p data-san-delay="600" data-san="slideTop">
                        นิทรรศการออนไลน์สุด Exclusive จากชาวคอมสื่อรุ่นที่ 11 มาในสโลแกน “Unique as SUPERCALIFRAGILISTICEXPIALIDOCIOUS” 
                        เพราะดีกว่าเกินจะบรรยายได้ ซึ่งประกอบด้วยนวัตกรรมทั้งหมด 3 ประเภทด้วยกัน คือ นวัตกรรมเพื่อบุคคล (Exclusive for Personal) 
                        นวัตกรรมเพื่อมหาวิทยาลัย (Exclusive for University) และนวัตกรรมเพื่อองค์กร (Exclusive for Organization)  
                        ที่พร้อมจะมอบความสะดวกสบายที่สุดแสนพิเศษให้กับคุณ
                    </p>
                    <a href="https://www.commuexhibition.com" target="_blank" data-san-delay="400" data-san="slideTop">
                        VISIT <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
                <div class="myDetails">
                    <h2>เที่ยว มั้ย คราฟต์</h2>
                    <h4 data-san-delay="400" data-san="slideTop">
                        Tourism Communication<br>
                        วิชาเอกการสื่อสารเพื่อการท่องเที่ยว
                    </h4>
                    <br>
                    <p data-san-delay="600" data-san="slideTop">
                        ‘เที่ยว’ เนื่องจากพวกเราเป็นนิสิตเอกการสื่อสารเพื่อการท่องเที่ยว ดังนั้นการท่องเที่ยวจึงเป็นสิ่งที่สำคัญมาก 
                        เราเลยพาทุกคนไปเที่ยวทั่วไทยผ่านชิ้นงานของเรา ว่าแต่ละจังหวัดหรือแต่ละสถานที่มีอะไรน่าสนใจบ้าง ทั้งของกิน ของใช้ 
                        รวมไปถึงการบริการ ทุกคนจะได้เที่ยวผ่านสื่อและผลงานที่ได้สร้างสรรค์ออกมาของนิสิตแต่ละกลุ่ม ‘คราฟต์’ ที่หมายถึงงานฝีมือ 
                        เพราะผลงานต่าง ๆ เป็นผลงานที่นิสิตแต่ละกลุ่มสร้างสรรค์ขึ้นมาเอง แม้ว่าบางอย่างอาจไม่ใช่งานฝีมือด้วยสินค้าและบริการ แต่สื่อต่าง ๆ 
                        ก็ออกมาด้วยฝืมือของนิสิตแต่กลุ่ม นอกจากนี้ ‘เที่ยวมั้ยคราฟต์’ ยังเป็นการเล่นเสียงกับคำว่า ‘เที่ยวไหมครับ’ 
                        เพื่อเป็นการสอบถามและเชิญชวนให้ทุกคน มาเที่ยวในงานของเราอีกด้วย
                    </p>
                    <!-- https://www.facebook.com/TourismThesisExhibition -->
                    <a href="https://www.facebook.com/hashtag/เที่ยวมั้ยคราฟต์" target="_blank" data-san-delay="400" data-san="slideTop">
                        VISIT <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
                <div class="myDetails">
                    <h2>Keep Rolling Thesis 2022</h2>
                    <h4 data-san-delay="400" data-san="slideTop">
                        Cinema and Digital Media <br>
                        สาขาภาพยนตร์และสื่อดิจิทัล
                    </h4>
                    <br>
                    <p data-san-delay="600" data-san="slideTop">
                        "Keep Rolling Thesis Exhibition - แกก็กลับมาดูหนังเราดิ"
                    </p>
                    <!-- https://www.facebook.com/KeepRollingThesis -->
                    <a href="https://www.facebook.com/hashtag/keeprollingthesisexhibition2022" target="_blank" data-san-delay="400" data-san="slideTop">
                        VISIT <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
                <div class="myDetails">
                    <h2>Cyber Business : SMEs Heroes</h2>
                    <h4 data-san-delay="400" data-san="slideTop">
                        Cyber Business Management <br>
                        วิชาเอกการจัดการธุรกิจไซเบอร์
                    </h4>
                    <br>
                    <p data-san-delay="600" data-san="slideTop">
                        หลายคนเห็นชื่องานของพวกเราแล้วอาจเกิดความสงสัย...🤔 วิกฤตเศรษฐกิจ จากสถานการณ์โควิด 19 
                        ที่เกิดขึ้นในไทยส่งผลกระทบต่อหลายธุรกิจโดยทั่วกัน ผู้ประกอบการต่างต้องปรับตัวให้ธุรกิจสามารถดำเนินต่อไปได้ 
                        แต่ก็มีอีกหลายธุรกิจที่ต้องปิดตัวลงอย่างน่าเสียดาย พวกเราจึงแปลงร่างเป็น 'Heroes' เข้าไปช่วยกันพัฒนา และสร้างสรรค์ผลงานต่าง ๆ 
                        ให้ธุรกิจขนาดเล็กจนถึงปานกลางอย่าง 'SMEs' ให้สามารถดำเนินธุรกิจผ่านพ้นวิกฤตเศรษฐกิจในครั้งนี้ไปให้ได้ 🙌🏻
                    </p>
                    <a href="https://www.facebook.com/CyberSMEsHeroesThesis/" target="_blank" data-san-delay="400" data-san="slideTop">
                        VISIT <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
                <div class="myDetails">
                    <h2>SURVID Thesis Exhibition</h2>
                    <h4 data-san-delay="400" data-san="slideTop">
                        Health Communication <br>
                        วิชาเอกการสื่อสารเพื่อสุขภาพ
                    </h4>
                    <br>
                    <p data-san-delay="600" data-san="slideTop">
                        สื่อสุขภาพส่งตรงถึงหน้าจอคุณ นิทรรศการแสดงผลงานนวัตกรรมสื่อสารนิพนธ์ ประจำวิชาเอกการสื่อสารเพื่อสุขภาพ ภายใต้คอนเซ็ป 
                        “I will Survive เอาตัวรอดจากการใช้ชีวิตในยุค COVID-19” กับผลงานทั้ง 17 ชิ้นที่จะมาให้ความรู้ ความสนุกสนาน กับทุกคน 
                        SUR-VID = Service ที่ถอดมาจากคำว่า SURvive(การเอาชีวิตรอด) + coVID(COVID-19) 
                        ซึ่งหมายถึงเป็นธีสิสที่บริการส่งมอบความรู้การเอาตัวรอดจาก COVID-19  ให้ทุกคน
                    </p>
                    <!-- https://www.facebook.com/HealthThesisExhibition.COSCI -->
                    <a href="https://www.facebook.com/hashtag/healththesis2022" target="_blank" data-san-delay="400" data-san="slideTop">
                        VISIT <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
                <div class="myDetails">
                    <h2>ร้อนของ Thesis Exhibition</h2>
                    <h4 data-san-delay="400" data-san="slideTop">
                        Interactive and Multimedia Design<br>
                        วิชาเอกการออกแบบสื่อปฏิสัมพันธ์และมัลติมีเดีย
                    </h4>
                    <br>
                    <p data-san-delay="600" data-san="slideTop">
                        เมื่อกาลเวลาผ่านไป ยุทธภพกลายเป็นเพียงตำนานเก่าแก่ เหล่าผู้ฝึกตนเริ่มจางหายและซ่อนเร้นไปตามที่ต่าง ๆ แต่พวกเรานั้นเป็นจอมยุทธ์รุ่นใหม่ที่สืบทอดวิทยายุทธอันแข็งแกร่งและร้ายกาจ ผู้ซุกซ่อนบ่มเพาะกำลังภายในมานานแสนนาน และในวันนี้พวกเราจะไม่ซุกซ่อนตัวตนอยู่ในเงามืดอีกต่อไป เพราะพลังในตัวของเราร่ำร้องอยากจะออกมาวาดลวดลายโชว์ของดี ถึงเวลาแล้วที่เราจะเปลี่ยนยุคสมัยอันจืดชืดนี้ให้กลายเป็นยุทธภพในแบบของเรา!
                    </p>
                    <a href="http://www.ronkhongexhibition.com" target="_blank" data-san-delay="400" data-san="slideTop">
                        VISIT <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
                <div class="myDetails">
                    <h2>PERK’SCARD</h2>
                    <h4 data-san-delay="400" data-san="slideTop">
                        Innovation Management Communication <br>
                        วิชาเอกการสื่อสารเพื่อการจัดการนวัตกรรม
                    </h4>
                    <br>
                    <p data-san-delay="600" data-san="slideTop">
                        Perks Card Online Thesis Exhibition งานนิทรรศการนวัตกรรมสื่อสารนิพนธ์ ของนิสิตชั้นปีที่ 4 เอกการสื่อสารเพื่อการจัดการนวัตกรรม ซึ่งคำว่า perks card หมายถึง การ์ดแห่งความสามารถที่หลากหลาย เปรียบเสมือนความสามารถของเด็กอินโนที่มีทักษะในหลาย ๆ ด้าน และพร้อมที่จะ “เปิดการ์ด” หรือความสามารถเหล่านั้นให้ทุกคนได้เห็นผ่านงาน Perks Card Online Thesis Exhibition
                    </p>
                    <!-- https://www.facebook.com/innocosciswu/ -->
                    <a href="https://www.facebook.com/hashtag/innothesisexhibition2022" target="_blank" data-san-delay="400" data-san="slideTop">
                        VISIT <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
                
            </div>
            <div class="col-lg-1"></div>
        </div>

        <div class="row divfootter">
            <div class="col-lg-1 col-md-1"> </div>
            <div class="col-lg-3 col-md-5 div01">
                <img src="resources/images/2021-2023/logo_cosci.png">
            </div>
            <div class="col-lg-4 col-md-5 div02">
                <h3>ABOUT</h3>
                <p>
                    ฝ่ายเครือข่ายองค์กร<br>
                    วิทยาลัยนวัตกรรมสื่อสารสังคม &nbsp;<span>มหาวิทยาลัยศรีนครินทรวิโรฒ</span><br>
                    <i class="fa fa-phone"></i> &nbsp;02-259-2343 &nbsp;&nbsp;&nbsp;&nbsp; 
                    <span><i class="fa fa-envelope-o"></i> &nbsp;cosci.thesis@gmail.com</span><br>
                    <a href="http://cosci.swu.ac.th" target="_blank">http://cosci.swu.ac.th</a>
                </p>
            </div>
            <div class="col-lg-3 col-md-12 div03">
                <a href="https://www.facebook.com/cosciswunews" target="_blank">
                    <img src="resources/images/2021-2023/icon_facebook1.png"><span>COSCI SWU</span>
                </a>
                <a href="https://www.youtube.com/watch?v=306-8ddB4UQ" target="_blank">
                    <img src="resources/images/2021-2023/icon_youtube1.png"><span>COSCI Innovation Thesis</span>
                </a>
                <hr class="visithr">
                <p class="visitp">
                    จำนวนผู้เข้าชมเว็บไซต์ ปี <?php echo $nowYear; ?>
                    <table class="visittb">
                        <tr>
                            <td style="width:60px;">วันนี้</td>
                            <td>
                                <span class="visitnum" id="getNumTD"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>ทั้งหมด</td>
                            <td>
                                <span class="visitnum" id="getNumAll"></span>
                            </td>
                        </tr>
                    </table>
                </p>
            </div>
            <div class="col-lg-1 col-md-1"></div>
        </div>
    </div>
    
</body>

<script src="resources/js/mainJS_2021-2023.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    // Ajax
    $.post(
        "others/php_backend.php",
        {userTimezone:  Intl.DateTimeFormat().resolvedOptions().timeZone + ' / ' + new Date().toString().match(/([A-Z]+[\+-][0-9]+.*)/)[1],
         pageOpen:      'Thesis-2022'},
        // function(datas, status) {
        //     alert(datas)
        // }
    );

    // Reload One time after onload
    var numTD = "<?php echo $cntToday; ?>";
    var numAll = "<?php echo $cntYear; ?>";

    $('#getNumTD').text(numberWithCommas(numTD));
    $('#getNumAll').text(numAll.toLocaleString());
    window.onload = windowLoad(numTD, numAll, 'thesis2022');



    /* ========== Click Card ========== */
    $('#cardArea img').click(function() {
        const imgID = this.id;
        const fcardName = "resources/images/2021-2023/cardf_" + imgID + ".png";
        const bcardName = "resources/images/2021-2023/cardb_" + imgID + ".png";
        $('#blankCard').hide();
        $('#getImgFCard').attr("src", fcardName);
        $('#getImgBCard').attr("src", bcardName);
        $('#showFlipCard').show();
        $('#showFlipCard .flipCardInner').addClass("animateFlipCard");
        
        const boxTextID = "#box" + imgID;
        $('.boxMajorText').hide();
        $(boxTextID).show();
    });
    $('#showFlipCard .flipCardInner').on("animationend webkitAnimationEnd oAnimationEnd MSAnimationEnd", function() {
        $(this).removeClass("animateFlipCard");
    });
    var startWidth = $(window).width();
    function setShowCard() {
        // alert( $('#blankCard').width() )
        $('#showFlipCard').hide();
        $('.boxMajorText').hide();
        $('#blankCard').show();
        $('#boxnoSelect').show();
        $('#showFlipCard').width( $('#blankCard').width() );
        $('#showFlipCard').height( $('#blankCard').height() );
        // alert($(window).width());
        // if ($(window).width() < 3600 || $(window).width() > 10) {
        //     $('#showFlipCard').hide();
        //     $('.boxMajorText').hide();
        //     $('#blankCard').show();
        //     $('#boxnoSelect').show();
        //     $('#showFlipCard').width( $('#blankCard').width() );
        //     $('#showFlipCard').height( $('#blankCard').height() );
        // }
    }
    $(document).ready(function() {
        startWidth = $(window).width();
        setShowCard();
    });
    // $(window).on('resize', setShowCard);
    // $(window).on("load resize scroll", setShowCard);
    // $(window).on("load resize", setShowCard($(window).width()));
    $(window).resize(function() {
        if ($(window).width() != startWidth) {
            startWidth = $(window).width();
            setShowCard();
        }
    });



    var sld1Index = 0;
    showSlides(sld1Index);

    var sld2Index = 0;
    autoSlideShow();
</script>

</html>
