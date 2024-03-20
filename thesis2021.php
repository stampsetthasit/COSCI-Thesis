<?php
    // Query Database
    require_once('config/db_connection.php');
    require_once('config/visitor_gallery_data.php');
    
    $sql2 = getVisit('Thesis-2021');
    $query2 = mysqli_query($conn, $sql2);
    $dataCnt = mysqli_fetch_array($query2);
    $cntToday = $dataCnt['in_today'];
    $cntYear = $dataCnt['in_year'];
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <title>COSCI Inovation Thesis 2021</title>
    <?php setTagInHead(); ?>

    <!-- ===== Fonts ===== -->
    <link rel="preconnect" href="https://fonts.gstatic.com"> 
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Titan+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Alef:wght@700&display=swap" rel="stylesheet">

    <style>
        /* Head */
        .headding {
            background-image: url(resources/images/2021-2023/bg_nav2021.png);
            background-repeat: no-repeat;
            background-position: left;
            background-size: cover;
            -webkit-background-size: cover;
            -moz-background-size: cover;
        }
        .headLeft img {
            width: 260px;
            margin: 30px 0;
        }
        .headRight {
            font-family: 'Kanit', sans-serif;
        }
        .headRight .indiv {
            text-align: left;
            float: right;
        }
        .headRight h3 {
            margin-top: 1px;
            margin-bottom: 0px;
            font-size: 2em;
        }
        .headRight h5 span {
            white-space: nowrap;
        }

        /* Slide */
        .textSlideR, .textSlideL {
            padding: 2px 0;
            z-index: 1;
        }
        .textSlideR span {
            animation: rslide 35s linear infinite;
            animation-direction: reverse;
        }
        .textSlideL span {
            animation: rslide 35s linear infinite;
        }

        /* Video */
        .divVideo {
            padding: 0 !important;
            background-image: url(resources/images/2021-2023/bg_grid1.png);
            background-repeat: repeat;
        }
        .bgcartoon {
            margin: 0;
            background-image: url(resources/images/2021-2023/bg_cartoon1.png);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .bginside {
            background-image: url(resources/images/2021-2023/bg_gradient1.png), url(resources/images/2021-2023/bg_star1.png);
            background-repeat: repeat, repeat;
        }

        /* Major */
        .majorthesis {
            margin-top: 14px;
            background-image: url(resources/images/2021-2023/bg_02.png);
            background-position: center;
            /* background-repeat: no-repeat; */
            background-repeat: repeat-y;
            background-size: cover;
        }
        .inmajthesis {
            margin: 0;
            background-image: url(resources/images/2021-2023/bg_03.png);
            background-repeat: repeat;
        }
        .majorthesis .divleft, .majorthesis .divright {
            padding-top: 50px;
        }
        .majorthesis .divleft img {
            width: 80%;
        }
        .majorthesis .divright {
            font-family: 'Kanit', sans-serif;
        }
        .majorthesis .divright h3 {
            font-family: 'Titan One', cursive;
            text-align: center;
            margin-top: 0;
        }
        .majorthesis .divright h4 {
            text-align: center;
            font-weight: 600;
        }
        .majorthesis .divright h5 {
            font-family: 'Alef', sans-serif;
            text-align: center;
            font-weight: 10;
        }
        .majorthesis .divright hr {
            border-top: 1px solid #444444;
            margin-top: 10px;
            margin-bottom: 5px;
            width: 96%;
        }
        .majorthesis .divright p {
            padding: auto 8px;
            text-align: justify;
            text-justify: inter-word;
        }
        .majorthesis .div02 {
            margin-top: 52px;
            margin-bottom: 30px;
            text-align: center;
        }
        .majorthesis .div02 span {
            font-family: 'Kanit', sans-serif;
            /* width: 24.5%; */
            width: 32.6%;
            display: inline-block;
        }
        .majorthesis .div02 span img {
            width: 50%;
        }
        .majorthesis .div02 span h5 {
            /* font-family: 'Titan One', cursive, 'Kanit', sans-serif; */
            font-weight: 800;
            margin-bottom: 10px;
            margin-top: 10px;
            font-size: 18px;
        }
        .majorthesis .div02 span b {
            font-weight: normal;
        }
        .majorthesis .div02 span button {
            background-color: #303030;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 2px 6px;
            margin-top: 6px;
            text-decoration: none;
        }
        .majorthesis .div02 span button:hover {
            background-color: #DFDFDF;
            color: black;
            border: 1px solid black;
            text-decoration: none;
        }
        
        /* Detail */
        .thesisdetail {
            margin-top: 14px;
            padding-bottom: 50px;
            background-image: url(resources/images/2021-2023/bg_04.png);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .thesisdetail .divleft, .thesisdetail .divright {
            padding-top: 50px;
            font-family: 'Kanit', sans-serif;
        }
        .thesisdetail .divleft h2 {
            font-weight: 800;
            margin-top: 1px;
        }
        .thesisdetail .divleft h2 hr {
            border-top: 2px dotted #444444;
            margin-top: 12px;
            margin-left: 0;
            width: 84%;
        }
        .thesisdetail .divleft h4 {
            margin-top: 18px;
            line-height: 30px;
        }
        .thesisdetail .divleft p {
            border: 1px solid #444444;
            padding: 4px 8px;
            margin-top: -14px;
            margin-right: 25px;
            /* text-align: justify;
            text-justify: inter-word; */
        }
        .thesisdetail .divleft a {
            text-decoration: none;
            border: none;
            float: right;
            margin-right: 25px;
            margin-top: 14px;
        }
        .thesisdetail .divleft a img {
            height: 35px;
        }


        @media only screen and (max-width: 992px) {
            .majorthesis .divleft {
                text-align: center;
            }
            .majorthesis .divleft img {
                width: 82%;
            }
            .majorthesis .div02 span {
                width: 32.6%;
            }
            .majorthesis .div02 span img {
                width: 66%;
            }

            .thesisdetail {
                padding-left: 20px;
                padding-left: 20px;
                min-height: 60vh;
            }

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
        }
        @media only screen and (max-width: 768px) {
            /* ===== Header ===== */
            .headLeft, .headRight {
                text-align: center;
            }
            .headRight .indiv {
                text-align: center;
                float: none;
            }
            .headRight { padding-top: 20px; }
            .headRight h3 { font-size: 1.75em; }
            .headLeft img {
                width: 45%;
                margin-bottom: 10px;
            }
            .headLeft { padding-top: 25px; }

            /* ===== Major Thesis ===== */
            .majorthesis .div02 span {
                width: 47%;
                margin-left: 4px;
                margin-right: 4px;
            }

            /* ===== Thesis Detail ===== */
            .thesisdetail .divleft p, .thesisdetail .divleft a {
                margin-right: 0;
            }
            .thesisdetail .divright {
                margin-top: 40px;
            }
        }
        @media only screen and (max-width: 600px) {
            .thesisdetail {
                padding-left: 12px;
                padding-left: 12px;
                min-height: 115vh;
            }
        }
        @media only screen and (max-width: 375px) {
            /* ===== Major Thesis ===== */
            .majorthesis .divleft img {
                width: 70%;
            }
            .majorthesis .divright h3 {
                font-size: 1.45em;
            }
            .majorthesis .divright h4 {
                font-size: 1em;
            }
            .majorthesis .divright h5, .majorthesis .divright p {
                font-size: 0.85em;
            }
            .majorthesis .div02 span {
                width: 46.25%;
                padding-left: 3px;
                padding-right: 3px;
            }
            .majorthesis .div02 span img {
                width: 70%;
            }
            .majorthesis .div02 span h5 {
                font-size: 1em;
            }
            .majorthesis .div02 span b {
                font-size: 0.75em;
                display: inline-block;
                line-height: 16px;
            }
            .majorthesis .div02 span button {
                font-size: 0.75em;
            }
        }
    </style>
</head>
<body>

    <div class="container-fluid">
        <div class="row headding">
            <div class="col-lg-1 col-md-1"></div>
            <div class="col-lg-6 col-md-5 col-sm-5 headLeft">
                <img src="resources/images/2021-2023/main_logo2021.png">
            </div>
            <div class="col-lg-4 col-md-5 col-sm-7 headRight">
            <div class="indiv">
                <h4>นิทรรศการออนไลน์</h4>
                <h3>นวัตกรรมสื่อสารนิพนธ์</h3>
                <h5>
                    วิทยาลัยนวัตกรรมสื่อสารสังคม &nbsp;<span>มหาวิทยาลัยศรีนครินทรวิโรฒ</span>
                </h5>
            </div>
            </div>
            <div class="col-lg-1 col-md-1"></div>
        </div>

        <p class="textSlideR">
            <span>
                &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
            </span>
        </p>

        <!-- Video Youtube -->
        <div class="row">
            <div class="col-lg-12 divVideo">
                <div class="bgcartoon">
                    <div class="bginside">
                        <div class="row" style="margin: 0; padding-top: 100px; padding-bottom: 80px;">
                            <div class="col-lg-2 col-md-1"></div>
                            <div class="col-lg-8 col-md-10" data-san="slideTop">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/ejikiDuvPCA?autoplay=1&playlist=ejikiDuvPCA&loop=1" style="border:1px solid black;" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-1"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <p class="textSlideL">
            <span>
                &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
            </span>
        </p>

        <div class="row majorthesis">
            <div class="inmajthesis">
                <div class="row" style="margin: 0;">
                    <div class="col-lg-1 col-md-1"></div>
                    <div class="col-lg-5 col-md-5 col-sm-5 divleft" data-san="slideRight">
                        <img src="resources/images/2021-2023/main_logo_thesis2021.png">
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-7 divright" data-san="slideLeft" data-san-delay="400">
                        <h3>COSCI INNOVATION DAY 2021</h3>
                        <h4>แตกต่าง · สร้างสรรค์ · เติบโต</h4>
                        <h5>#COSCIinnovationday &nbsp;#COSCIcolap &nbsp;#coscithesis</h5>
                        <hr>
                        <p>
                            COLA:P COSCI Innovation Day 2021 เป็นกิจกรรมภายใต้โครงการ Innovation day จากนิสิตชั้นปีที่ 4 วิทยาลัยนวัตกรรมสื่อสารสังคม มหาวิทยาลัยศรีนครินทรวิโรฒ<br>
                            โดยถูกสร้างขึ้นจากแนวคิด COSCI + labratory ซึ่งเป็นแลปที่รวมความคิดสร้างสรรค์ อันเป็นเอกลักษณ์แห่งนวัตกรรมสื่อสารนิพนธ์ จากทุกสาขาวิชา หลายหลายแนวคิด หลากหลายสไตล์ ที่รวบรวมความแตกต่าง อย่างสร้างสรรค์ เพื่อที่จะเติบโต และพร้อมสร้างสรรค์ผลงานเคียงคู่ผู้ประกอบการอย่างมีคุณภาพ
                        </p>
                        <hr>
                    </div>
                    <div class="col-lg-1 col-md-1"></div>

                    <div class="col-12 col-lg-12 col-md-12 col-sm-12"></div>

                    <div class="col-lg-1 col-md-1"></div>
                    <div class="col-lg-10 col-md-10 div02">
                        <span data-san="slideTop">
                        <img src="resources/images/2021-2023/logo_cyber2021.png">
                        <br>
                        <h5>Cybermarket</h5>
                        <b>Cyber Business Management</b>
                        <br>
                        <a href="https://cybermarket-exhibition.com" target="_blank" style="display: inline-block;">
                            <button>วิชาเอกการจัดการธุรกิจไซเบอร์</button>
                        </a>
                        <br><br><br><br>
                        </span>
                        <span data-san="slideTop">
                        <img src="resources/images/2021-2023/logo_inno2021.png">
                        <br>
                        <h5>INNOPRISM</h5>
                        <b>Innovation Management Communication</b>
                        <br>
                        <!-- https://www.facebook.com/innocosciswu -->
                        <a href="https://www.facebook.com/hashtag/INNOPRISM" target="_blank" style="display: inline-block;">
                            <button>วิชาเอกการสื่อสารเพื่อการจัดการนวัตกรรม</button>
                        </a>
                        <br><br><br><br>
                        </span>
                        <span data-san="slideTop">
                        <img src="resources/images/2021-2023/logo_commu2021.png">
                        <br>
                        <h5>Future X</h5>
                        <b>Computer for Communication</b>
                        <br>
                        <a href="https://commuexhibition.com" target="_blank" style="display: inline-block;">
                            <button>วิชาเอกคอมพิวเตอร์เพื่อการสื่อสาร</button>
                        </a>
                        <br><br><br><br>
                        </span>
                        <span data-san-delay="200" data-san="slideTop">
                        <img src="resources/images/2021-2023/logo_health2021.png">
                        <br>
                        <h5>MAI TUMMADA (ที่ไม่ธรรมดา)</h5>
                        <b>Health Communication</b>
                        <br>
                        <a href="https://www.facebook.com/MAITUMMADA.HealthThesisExhibition/" target="_blank" style="display: inline-block;">
                            <button>วิชาเอกการสื่อสารเพื่อสุขภาพ</button>
                        </a>
                        <br><br><br><br>
                        </span>
                        <span data-san-delay="200" data-san="slideTop">
                        <img src="resources/images/2021-2023/logo_multi2021.png">
                        <br>
                        <h5>DO-ET</h5>
                        <b>Interactive and Multimedia Design</b>
                        <br>
                        <a href="http://www.doetxhibition.com" target="_blank" style="display: inline-block;">
                            <button>วิชาเอกการออกแบบสื่อปฏิสัมพันธ์และมัลติมีเดีย</button>
                        </a>
                        <br><br><br><br>
                        </span>
                        <span data-san-delay="200" data-san="slideTop">
                        <img src="resources/images/2021-2023/logo_tour2021.png">
                        <br>
                        <h5>เที่ยว ทุก ทิพย์</h5>
                        <b>Tourism Communication</b>
                        <br>
                        <!-- https://www.facebook.com/TourismThesisExhibition/ -->
                        <a href="https://www.facebook.com/hashtag/เที่ยวทุกทิพย์thesisexhibition" target="_blank" style="display: inline-block;">
                            <button>วิชาเอกการสื่อสารเพื่อการท่องเที่ยว</button>
                        </a>
                        <br><br><br><br>
                        </span>
                        <span data-san-delay="400" data-san="slideTop">
                        <img src="resources/images/2021-2023/logo_cinema2021.png">
                        <br>
                        <h5>Keep Rolling Thesis Exhibition</h5>
                        <b>Cinema and Digital Media</b>
                        <br>
                        <a href="https://www.facebook.com/KeepRollingThesis" target="_blank" style="display: inline-block;">
                            <button>สาขาภาพยนตร์และสื่อดิจิทัล</button>
                        </a>
                        <br><br><br><br>
                        </span>
                        <span data-san-delay="400" data-san="slideTop">
                        <img src="resources/images/2021-2023/logo_thesisALL.png">
                        <br>
                        <h5> &nbsp; </h5>
                        <b>COSCI Thesis Exhibition</b>
                        <br>
                        <a href="thesis_all.php" style="display: inline-block;">
                            <button>รวมนิทรรศการนวัตกรรมสื่อสารนิพนธ์</button>
                        </a>
                        <br><br><br><br>
                        </span>
                    </div>
                    <div class="col-lg-1 col-md-1"></div>
                </div>
            </div>
        </div>

        <p class="textSlideR">
            <span>
                &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
                COLA:P COSCI INNOVATION DAY 2021 &nbsp; --- &nbsp; 
            </span>
        </p>

        <div class="row thesisdetail">
            <div class="col-lg-1"></div>
            <div class="col-lg-4 col-md-6 divleft">
                <div class="myDetails">
                    <h2 data-san-delay="200" data-san="slideTop">
                        Cybermarket
                        <hr>
                    </h2>
                    <h4 data-san-delay="400" data-san="slideTop">
                        Cyber Business Management <br>
                        วิชาเอกการจัดการธุรกิจไซเบอร์
                    </h4>
                    <br>
                    <p data-san-delay="600" data-san="slideTop">
                        CyberMarket : shopping zone<br>
                        แหล่งรวมธุรกิจโดนๆ นวัตกรรมดีๆ มาช้อปในสิ่งที่ชอบได้ที่ Cyber Market Exibition
                    </p>
                    <a href="https://cybermarket-exhibition.com" target="_blank" data-san-delay="400" data-san="slideTop">
                        <img src="resources/images/2021-2023/button_go1.png">
                    </a>
                </div>
                <div class="myDetails">
                    <h2 data-san-delay="200" data-san="slideTop">
                        INNOPRISM
                        <hr>
                    </h2>
                    <h4 data-san-delay="400" data-san="slideTop">
                        Innovation Management Communication <br>
                        วิชาเอกการสื่อสารเพื่อการจัดการนวัตกรรม
                    </h4>
                    <br>
                    <p data-san-delay="600" data-san="slideTop">
                        INNO PRISM<br>
                        สะท้อนทุกเฉดของนวัตกรรม &nbsp; “มิติแตกต่าง สื่อสารสร้างสรรค์”
                    </p>
                    <!-- https://www.facebook.com/innocosciswu -->
                    <a href="https://www.facebook.com/hashtag/INNOPRISM" target="_blank" data-san-delay="400" data-san="slideTop">
                        <img src="resources/images/2021-2023/button_go1.png">
                    </a>
                </div>
                <div class="myDetails">
                    <h2 data-san-delay="200" data-san="slideTop">
                        Future X
                        <hr>
                    </h2>
                    <h4 data-san-delay="400" data-san="slideTop">
                        Computer for Communication <br>
                        วิชาเอกคอมพิวเตอร์เพื่อการสื่อสาร
                    </h4>
                    <br>
                    <p data-san-delay="600" data-san="slideTop">
                        Future X : อนาคตเรากำหนดได้<br>
                        มาร่วมกำหนดค่า X ไปกับเราที่ Commu Thesis Exhibition 2021
                    </p>
                    <a href="https://commuexhibition.com" target="_blank" data-san-delay="400" data-san="slideTop">
                        <img src="resources/images/2021-2023/button_go1.png">
                    </a>
                </div>
                <div class="myDetails">
                    <h2 data-san-delay="200" data-san="slideTop">
                        MAI TUMMADA (ที่ไม่ธรรมดา)
                        <hr>
                    </h2>
                    <h4 data-san-delay="400" data-san="slideTop">
                        Health Communication <br>
                        วิชาเอกการสื่อสารเพื่อสุขภาพ
                    </h4>
                    <br>
                    <p data-san-delay="600" data-san="slideTop">
                        MAI TUMMADA (ใหม่ธรรมดา) ชีวิตยุคใหม่ที่ไม่ธรรมดา จะแปลกใหม่แค่ไหน ติดตามชมได้ที่ Health Thesis Exhibition : MAI TUMMADA
                    </p>
                    <a href="https://www.facebook.com/MAITUMMADA.HealthThesisExhibition/" target="_blank" data-san-delay="400" data-san="slideTop">
                        <img src="resources/images/2021-2023/button_go1.png">
                    </a>
                </div>
                <div class="myDetails">
                    <h2 data-san-delay="200" data-san="slideTop">
                        DO-ET
                        <hr>
                    </h2>
                    <h4 data-san-delay="400" data-san="slideTop">
                        Interactive and Multimedia Design<br>
                        วิชาเอกการออกแบบสื่อปฏิสัมพันธ์และมัลติมีเดีย
                    </h4>
                    <br>
                    <p data-san-delay="600" data-san="slideTop">
                        “ What did we do? ” พวกเรา DO อะไรในธีสิส<br>
                        มาร่วมกัน ดูออกได้ใน Do-et. Thesis Exhibition
                    </p>
                    <a href="http://www.doetxhibition.com" target="_blank" data-san-delay="400" data-san="slideTop">
                        <img src="resources/images/2021-2023/button_go1.png">
                    </a>
                </div>
                <div class="myDetails">
                    <h2 data-san-delay="200" data-san="slideTop">
                        เที่ยว ทุก ทิพย์
                        <hr>
                    </h2>
                    <h4 data-san-delay="400" data-san="slideTop">
                        Tourism Communication<br>
                        วิชาเอกการสื่อสารเพื่อการท่องเที่ยว
                    </h4>
                    <br>
                    <p data-san-delay="600" data-san="slideTop">
                        "เที่ยว ทุก ทิพย์" สงสัยกันละสิว่า เที่ยว-ทุก-ทิพย์ คืออะไร? และเราจะพาทุกคนไปเที่ยวทิพย์ๆ ที่ไหนบ้าง มารอติดตามไปพร้อมๆ กันที่ @Tourism Thesis Exhibition : เที่ยว ทุก ทิพย์
                    </p>
                    <!-- https://www.facebook.com/TourismThesisExhibition/ -->
                    <a href="https://www.facebook.com/hashtag/เที่ยวทุกทิพย์thesisexhibition" target="_blank" data-san-delay="400" data-san="slideTop">
                        <img src="resources/images/2021-2023/button_go1.png">
                    </a>
                </div>
                
            </div>
            <div class="col-lg-6 col-md-6 divright" data-san-delay="600" data-san="slideLeft">
                <div class="slideshowContainer">
                    <div class="mySlides">
                        <img src="resources/images/2021-2023/poster_cyber2021.png" style="width:100%">
                    </div>
                    <div class="mySlides">
                        <img src="resources/images/2021-2023/poster_inno2021.jpg" style="width:100%">
                    </div>
                    <div class="mySlides">
                        <img src="resources/images/2021-2023/poster_commu2021.jpg" style="width:100%">
                    </div>
                    <div class="mySlides">
                        <img src="resources/images/2021-2023/poster_health2021.jpg" style="width:100%">
                    </div>
                    <div class="mySlides">
                        <img src="resources/images/2021-2023/poster_multi2021.png" style="width:100%">
                    </div>
                    <div class="mySlides">
                        <img src="resources/images/2021-2023/poster_tour2021.jpg" style="width:100%">
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
                <a href="https://www.youtube.com/watch?v=ejikiDuvPCA" target="_blank">
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
         pageOpen:      'Thesis-2021'},
        // function(datas, status) {
        //     alert(datas)
        // }
    );

    // Reload One time after onload
    var numTD = "<?php echo $cntToday; ?>";
    var numAll = "<?php echo $cntYear; ?>";
    $('#getNumTD').text(numberWithCommas(numTD));
    $('#getNumAll').text(numAll.toLocaleString());
    window.onload = windowLoad(numTD, numAll, 'thesis2021');



    var sld1Index = 0;
    showSlides(sld1Index);

    var sld2Index = 0;
    autoSlideShow();
</script>

</html>
