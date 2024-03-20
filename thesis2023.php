<?php
    // Query Database
    require_once('others/connect_db.php');
    require_once('others/forAllPage.php');
    
    $sql2 = getVisit('Thesis-2023');
    $query2 = mysqli_query($conn, $sql2);
    $dataCnt = mysqli_fetch_array($query2);
    $cntToday = $dataCnt['in_today'];
    $cntYear = $dataCnt['in_year'];
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <title>COSCI Inovation Thesis 2023</title>
    <?php setTagInHead(); ?>

    <!-- ===== Fonts ===== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <style>
        :root {
            --light:    300;
            --regular:  400;
            --semibold: 600;
            --mainColor: #C32218;
            --darkColor: #562518;
            --lightColor: #d34136;
        }
        body * {
            font-family: 'Prompt', sans-serif;
        }
        body {
            background-color: white;
            background-image: linear-gradient(#FFFFFF, #ECB687);
            background-repeat: no-repeat;
            background-size: 100%;
            height: 100%;
            min-height: 100vh;
            width: 100%;
            margin: 0;
            position: relative;
        }
        .bgBorder {
            background-color: transparent;
            height: 100%;
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
            outline: 0px;
            background-image: url("pic/bg_frame_l.png"), url("pic/bg_frame_r.png");
            background-size: 50px, 50px;
            background-position: 15px 0px, calc(100vw - 65px) 0px;
            background-repeat: repeat-y;
        }


        /* ===== Head ===== */
        .headding {
            background-color: #F7CBCB;
        }
        .headLeft { text-align: left; }
        .headLeft #mainLogo {
            width: 300px;
            margin-left: 40px;
        }
        .headRight .indiv {
            padding-top: 5px;
            margin-right: 40px;
            text-align: left;
            float: right;
        }
        .headRight h4 {
            color: var(--mainColor);
        }
        .headRight h3 {
            color: var(--darkColor);
            font-weight: var(--semibold);
            font-size: 2em;
        }
        .headRight h5 {
            color: var(--lightColor);
        }

        /* ===== Head Image ===== */
        .headTitle {
            padding-top: 5em;
            padding-bottom: 6em;
        }
        #divThesisImg {
            text-align: center;
            position: relative;
        }
        #divThesisImg .bgCircle {
            width: 100%;
            aspect-ratio: 4/3;
            border-radius: 50%;
            background-color: #BB3929;
            background-image: linear-gradient(#c95646 5%, #ede1e1 40%, #ecd0b5);
            filter: blur(1px);
            transition: all 1s;
            transform-origin: bottom;
            animation: bgCircleMove 3s ease-in-out;
            -webkit-animation: bgCircleMove 3s ease-in-out;
        }
        @keyframes bgCircleMove {
            0% {
                opacity: 0.1;
                filter: blur(4px);
            }
            90% {
                opacity: 0.75;
                filter: blur(4px);
            }
            100% {
                opacity: 1;
                filter: blur(1px);
            }
        }
        @-webkit-keyframes bgCircleMove {
            0% {
                opacity: 0.1;
                filter: blur(4px);
            }
            90% {
                opacity: 0.75;
                filter: blur(4px);
            }
            100% {
                opacity: 1;
                filter: blur(1px);
            }
        }
        #divThesisImg #boxImage {
            width: 100%;
            margin: 0;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            padding-top: 15%;
        }
        #boxImage img {
            width: 96%;
            display: block;
            margin: auto;
            animation: popImage 3s;
            -webkit-animation: popImage 3s;
            animation-timing-function: cubic-bezier(0.25, 0.55, 0.75, 1.5);
            -webkit-animation-timing-function: cubic-bezier(0.25, 0.55, 0.75, 1.5);
        }
        @keyframes popImage {
            0%, 55% {
                opacity: 0;
                transform: scale(0, 0);
            }
            90% {
                opacity: 1;
            }
            100% {
                opacity: 1;
                transform: scale(1, 1);
            }
        }
        @-webkit-keyframes popImage {
            0%, 55% {
                opacity: 0;
                -webkit-transform: scale(0, 0);
            }
            90% {
                opacity: 1;
            }
            100% {
                opacity: 1;
                -webkit-transform: scale(1, 1);
            }
        }
        .bgDivCandle {
            position: relative;
            width: 100%;
            height: 1.5em;
        }
        .divCandle {
            position: absolute;
            width: 100%;
            height: 300px;
            bottom: 0;
            left: 0;
        }
        .candleL, .candleR {
            position: absolute;
            bottom: 0;
        }
        .candleL { left: 10%; }
        .candleR { right: 10%; }
        .candle {
            display: flex;
            flex-direction: column;
            align-items: baseline;
        }
        .candleBar {
            width: 50px;
            height: 200px;
            background-color: white;
            border: 1px solid black;
            border-bottom: none;
            margin: 0 auto;
        }
        .candleBar::after {
            content: '';
            display: block;
            width: 9px;
            height: 194px;
            margin: 3px 4px 3px 37px;
            background-color: rgb(220, 220, 220);
        }
        .candleL .candleBar::after {
            margin: 3px 37px 3px 4px;
        }
        .thread {
            width: 3px;
            height: 10px;
            background-color: black;
            margin: 0 auto;
        }
        .plane {
            width: 90px;
            height: 14px;
            background-color: #531709;
            border: 1px solid black;
        }
        .flame {
            margin: 0 auto;
            position: relative;
            width: 30px;
            height: 40px;
        }
        .flm1 { 
            color: #D66600;
            box-shadow: 0 0 1rem #D66600;
            opacity: 0.8;
            top: 5px;
            left: 0;
            transform: rotate(70deg) skewX(0deg) scale(1);
            -webkit-transform: rotate(70deg) skewX(0deg) scale(1);
            animation: burnFlmI 0.4s linear infinite;
            -webkit-animation: burnFlmI 0.4s linear infinite;
        }
        .flm2 {
            color: #fc9f47;
            box-shadow: 0 0 1rem #fc9f47;
            bottom: -1px;
            animation: burnFlmII 0.4s linear infinite;
            -webkit-animation: burnFlmII 0.4s linear infinite;
        }
        .candleL .flm1 {
            animation: burnFlmI_L 0.4s linear infinite;
            -webkit-animation: burnFlmI_L 0.4s linear infinite;
        }
        .candleL .flm2 {
            animation: burnFlmII_L 0.4s linear infinite;
            -webkit-animation: burnFlmII_L 0.4s linear infinite;
        }
        .flmePart{
            position: absolute;
            background-color: currentColor;
            border-radius: 50%;
            border-color: currentColor;
            width: 30px;
            height: 30px;
        }
        .flmePart::before {
            content: "";
            position: absolute;
            border-radius: 0 0 0 100%;
            border-bottom-style: solid;
            border-bottom-color: inherit;
            height: 15px;
            width: 30px;
            left: -15px;
            top: -0px;
            border-bottom-width: 30px;
        }
        .candleL .flmePart::before {
            border-radius: 100% 0 0 0;
        }
        @keyframes burnFlmI {
            0% { transform: rotate(75deg) skewX(0deg) scale(1.6)}
            20% { transform: rotate(70deg) skewX(-15deg) scale(1.7)}
            40% { transform: rotate(75deg) skewX(0deg) scale(1.6)}
            60% { transform: rotate(80deg) skewX(2deg) scale(1.7)}
            100% {transform: rotate(75deg) skew(0deg) scale(1.6)}
        }
        @keyframes burnFlmI_L {
            0% { transform: rotate(105deg) skewX(0deg) scale(1.6)}
            20% { transform: rotate(110deg) skewX(-15deg) scale(1.7)}
            40% { transform: rotate(105deg) skewX(0deg) scale(1.6)}
            60% { transform: rotate(100deg) skewX(2deg) scale(1.7)}
            100% {transform: rotate(105deg) skew(0deg) scale(1.6)}
        }
        @keyframes burnFlmII {
            0% { transform: rotate(60deg) skewX(0deg) scale(0.9)}
            20% { transform: rotate(55deg) skewX(-10deg) scale(0.85)}
            40% { transform: rotate(60deg) skewX(0deg) scale(0.9)}
            60% { transform: rotate(65deg) skewX(2deg) scale(0.85)}
            100% {transform: rotate(60deg) skew(0deg) scale(0.9)}
        }
        @keyframes burnFlmII_L {
            0% { transform: rotate(105deg) skewX(0deg) scale(0.9)}
            20% { transform: rotate(110deg) skewX(-10deg) scale(0.85)}
            40% { transform: rotate(105deg) skewX(0deg) scale(0.9)}
            60% { transform: rotate(100deg) skewX(2deg) scale(0.85)}
            100% {transform: rotate(105deg) skew(0deg) scale(0.9)}
        }
        

        /* ===== Slide Tab ===== */
        .textSlideR, .textSlideL {
            background-color: var(--mainColor);
        }
        .textSlideR span {
            animation: rslide 35s linear infinite;
            animation-direction: reverse;
        }
        .textSlideL span {
            animation: rslide 35s linear infinite;
        }
        
        /* Title */
        .thesisTitle {
            margin-top: 5.5em;
            margin-bottom: 5em;
        }
        .thesisTitle .logoThesis {
            display: block;
            width: 50%;
            margin: auto;
        }
        .thesisTitle h1 {
            color: var(--mainColor);
            font-weight: var(--semibold);
        }
        .thesisTitle h5 {
            color: #CB7772;
            margin-top: 1em;
            margin-bottom: 1em;
        }
        .thesisTitle p {
            margin-top: 15px;
            color: var(--darkColor);
        }

        /* Major */
        .thesisPoster {
            padding-top: 5.25em;
            padding-bottom: 5em;
        }
        .h2Head {
            font-weight: var(--semibold);
            color: var(--mainColor);
            margin-bottom: 20px;
        }
        #posterDivSlider {
            margin-top: 15px;
            box-sizing: border-box;
            position: relative;
        }
        .slideContainer {
            width: 60%;
            position: relative;
            margin: auto;
        }
        .boxSlides {
            display: none;
        }
        .boxSlides img {
            width: 92%;
            max-width: 1000px;
            display: block;
            margin: auto;
        }
        .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            margin-top: -15px;
            width: 30px;
            aspect-ratio: 1;
            text-align: center;
            font-size: 18px;
            padding-top: 2px;
            color: #eee;
            background-color: #666;
            border-radius: 50%;
            transition: 0.6s ease;
            opacity: .3;
        }
        .prev { left: 0; }
        .next { right: 0; }
        .prev:hover, .next:hover {
            background-color: black;
            color: white;
            font-weight: bold;
            text-decoration: none;
            opacity: 1;
        }
        #divDot {
            text-align: center;
            margin-top: 15px;
        }
        .dot {
            cursor: pointer;
            width: 18px;
            aspect-ratio: 1;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }
        .activeDot, .dot:hover {
            background-color: #717171;
        }
        .sh {
            -webkit-animation-name: fadeSlide;
            -webkit-animation-duration: 1.5s;
            animation-name: fadeSlide;
            animation-duration: 1.5s;
        }
        @-webkit-keyframes fadeSlide {
            from {opacity: .4} 
            to {opacity: 1}
        }
        @keyframes fadeSlide {
            from {opacity: .4} 
            to {opacity: 1}
        }
        .thesisMajors {
            padding-top: 2em;
            padding-bottom: 5em;
        }

        .bgDivLogo {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            height: 100%;
            width: 100%;
        }
        .divLogoMaj {
            width: 350px;
            /* height: 350px; */
            aspect-ratio: 1;
            position: relative;
        }
        .divLogoMaj img {
            position: relative;
            width: 100%;
            z-index: 2;
        }
        .divLogoMaj::before, .divLogoMaj::after {
            position: absolute;
            content: '';
            border: none;
            border-radius: 100%;
            box-sizing: border-box;
            width: 20%;
            /* height: 20%; */
            aspect-ratio: 1;
            left: 40%;
            top: 40%;
            /* top: 50%;
            left: 50%;
            transform: translate(-60%, -60%);
            -webkit-transform: translate(-60%, -60%); */
            opacity: 0.6;
            transform-origin: center;
            -webkit-transform-origin: center;
            transform: scale(0.25);
            z-index: 1;
        }
        .divLogoMaj:hover::before, .divLogoMaj:hover::after {
            border: #EB4320 solid 5px;
            background-color: #FEF0EC;
            -webkit-animation: pulse 1.5s linear infinite, cycle-colors 6s linear infinite;
            animation: pulse 1.5s linear infinite, cycle-colors 6s linear infinite;
        }
        .divLogoMaj:hover::after {
            -webkit-animation-delay: .75s;
            animation-delay: .75s;
        }
        @keyframes pulse {
            to {
                opacity: 0;
                transform: scale(6.75);
            }
        }
        @keyframes cycle-colors {
            0% { border-color: #ff4520; }
            25% { border-color: #df8248; }
            50% { border-color: #f16c13; }
            75% { border-color: #f1a33d; }
            100% { border-color: #d94f33; }
        }
        
        .majDes {
            margin-top: 1em;
            margin-bottom: 4em;
            padding-left: 100px;
        }
        .majName {
            color: var(--mainColor);
            font-weight: var(--semibold);
            font-size: 1.5em;
        }
        .majTxt {
            color: var(--darkColor);
            font-weight: var(--light);
            display: block;
        }
        .majMaj {
            color: var(--mainColor);
            display: block;
            margin-top: 8px;
        }
        .majDivLink {
            margin-top: 12px;
        }
        .majDivLink a, .majDivLink a:hover {
            text-decoration: none;
            display: inline-block;
            width: 2.75em;
            cursor: pointer;
        }
        .majDivLink a:not(:last-child) {
            margin-right: 8px;
        }
        .majDivLink a img {
            display: block;
            width: 100%;
        }


        /* VDO - Youtube */
        .thesisVDO {
            padding-top: 6em;
            padding-bottom: 6em;
        }
        /* Button */
        #aBTN {
            text-decoration: none;
            display: inline-block;
            padding: 4px 20px;
            border-radius: 8px;
            color: #FFFFFF;
            background-color: var(--mainColor);
        }
        #aBTN:hover {
            color: #FFFFFF;
            background-color: #94160e;
        }


        /* Footer */
        .divfootter {
            background-color: #20140E;
        }
        .divfootter h3, .divfootter p {
            font-family: 'Prompt', sans-serif !important;
        }



        /* ========== Resize ========== */
        @media only screen and (max-width: 2000px) {
            /* Head */
            .headLeft #mainLogo { width: 270px; margin-left: 0px; }
            .headRight .indiv { margin-right: 6px; }

            /* Candle */
            .candleL { left: 8%; }
            .candleR { right: 8%; }
            .candleBar {
                width: 2em;
                height: 8.5em;
            }
            .candleBar::after {
                width: 6px;
                height: calc(8.5em - 6px);
                margin: 3px 3px 3px calc(2em - 9px);
            }
            .candleL .candleBar::after {
                margin: 3px calc(2em - 9px) 3px 3px;
            }
            .plane {
                width: 4.25em;
                height: 12px;
            }

            /* Title */
            .thesisTitle .logoThesis { width: 80%; }

            /* Major */
            .slideContainer { width: 80%; }
            .divLogoMaj { width: 94%; }
            .majDes { padding-left: 14px; }
        }
        @media only screen and (max-width: 1024px) {
            /* Head */
            .headRight .indiv { margin-right: 8px; }
            .headRight h5 span {
                display: block;
                margin-top: 3px;
            }

            /* Candle */
            .candleL { left: 6%; }
            .candleR { right: 6%; }
            .flm1 { top: 10px; }
            .flm2 { bottom: -3px; }
            .flmePart{
                width: 1.85em;
                height: 1.85em;
            }

            /* Major */
            .prev { left: -20px; }
            .next { right: -20px; }
            #divDot { margin-top: 6px; }
            .dot {
                width: 10px;
                margin: 0 1px;
            }
        }
        @media only screen and (max-width: 992px) {
            .bgBorder {
                background-size: 20px, 20px;
                background-position: 10px 0px, calc(100vw - 30px) 0px;
            }

            /* Head */
            .headRight .indiv { margin-right: 6px; }
            .headRight h4 { font-size: 1.5em; }
            .headRight h3 { font-size: 1.75em; }
            .headRight h5 { font-size: 1em; }

            /* Candle */
            .divCandle { bottom: -1.5em; }
            .candleL { left: 5%; }
            .candleR { right: 5%; }
            .candleBar {
                width: 1.5em;
                height: 7em;
            }
            .candleBar::after {
                width: 5px;
                height: calc(7em - 4px);
                margin: 2px 2px 2px calc(1.5em - 7px);
            }
            .candleL .candleBar::after {
                margin: 2px calc(1.5em - 7px) 2px 2px;
            }
            .plane {
                width: 4em;
                height: 10px;
            }
            .flame {
                width: 1.75em;
                height: 2.25em;
            }
            .flm1 { top: 5px; }
            .flm2 { bottom: -3px; }
            .flmePart{
                width: 1.75em;
                height: 1.75em;
            }
            .flmePart::before {
                height: 0.875em;
                width: 1.75em;
                left: -0.875em;
                top: -0px;
                border-bottom-width: 1.75em;
            }

            /* Major */
            .slideContainer { width: 100%; }
            .boxSlides img { width: 84%; }
            .prev { left: 0; }
            .next { right: 0; }
            .majDes { padding-right: 40px; }
        }
        @media only screen and (max-width: 768px) {
            /* Candle */
            .divCandle { bottom: -2em; }
            .candleL { left: 2.5%; }
            .candleR { right: 2.5%; }

            /* Title */
            .thesisTitle .logoThesis { width: 90%; }
        }
        @media only screen and (max-width: 580px) {
            /* Head */
            .headLeft { text-align: center; }
            .headLeft #mainLogo { margin-left: auto; }
            .headRight .indiv {
                margin-top: 20px;
                margin-right: auto;
                text-align: center;
                float: none;
            }

            /* Candle */
            .divCandle { bottom: -2.75em; }
            .candleL { left: 0%; }
            .candleR { right: 0%; }
            .candleBar {
                width: 1.25em;
                height: 5em;
                border-width: 0.5px;
            }
            .candleBar::after {
                width: 4px;
                height: calc(5em - 4px);
                margin: 2px 2px 2px calc(1.25em - 6px);
            }
            .candleL .candleBar::after {
                margin: 2px calc(1.25em - 6px) 2px 2px;
            }
            .thread { width: 2px; }
            .plane {
                width: 2.5em;
                height: 8px;
                border-width: 0.5px;
            }
            .flame {
                width: 1.25em;
                height: 1.5em;
            }
            .flm1 { top: 2px; }
            .flm2 { bottom: -3px; }
            .flmePart{
                width: 1.25em;
                height: 1.25em;
            }
            .flmePart::before {
                height: 0.625em;
                width: 1.25em;
                left: -0.625em;
                border-bottom-width: 1.25em;
            }

            /* Title */
            .thesisTitle h1, .thesisTitle h5 { text-align: center; }

            /* Major */
            .boxSlides img { width: 100%; }
            .prev { left: 0; }
            .next { right: 0; }
            #divDot { margin-top: 4px; }
            .thesisMajors { padding-top: 0; }
            .divLogoMaj { width: 80%; }
            .majDes {
                margin-top: 0px;
                padding-right: 14px;
            }
        }
        @media only screen and (max-width: 375px) {
            /* Head */
            .headLeft #mainLogo { width: 90%; }
            .headRight h4 { font-size: 1em; }
            .headRight h3 { font-size: 1.5em; }
            .headRight h5 { font-size: 0.75em; }

            /* Candle */
            .candleBar {
                width: 1em;
                height: 4em;
            }
            .candleBar::after {
                width: 2px;
                height: calc(4em - 4px);
                margin: 2px 2px 2px calc(1em - 4px);
            }
            .candleL .candleBar::after {
                margin: 2px calc(1em - 4px) 2px 2px;
            }
            .plane {
                width: 2.25em;
                height: 6px;
            }
            .flame {
                width: 1em;
                height: 1.25em;
            }
            .flm1 { top: 5px; }
            .flm2 { bottom: -6px; }
            .flmePart{
                width: 1em;
                height: 1em;
            }
            .flmePart::before {
                height: 0.5em;
                width: 1em;
                left: -0.5em;
                border-bottom-width: 1em;
            }

            /* Title */
            .thesisTitle h1 { font-size: 2.15em; }

            /* Major */
            .h2Head { font-size: 1.7em; }
        }
    </style>
</head>
<body>
    <div class="bgBorder"></div>

    <div class="headding">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-7 col-sm-5 headLeft">
                    <img src="pic/main_logo2023.png" id="mainLogo" draggable="false">
                </div>
                <div class="col-lg-6 col-md-5 col-sm-7 headRight">
                    <div class="indiv">
                        <h4>นิทรรศการออนไลน์</h4>
                        <h3>นวัตกรรมสื่อสารนิพนธ์</h3>
                        <h5>
                            วิทยาลัยนวัตกรรมสื่อสารสังคม &nbsp;<span>มหาวิทยาลัยศรีนครินทรวิโรฒ</span>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row headTitle">
            <div class="col-xl-3 col-lg-2 col-md-2 col-sm-1"></div>
            <div class="col-xl-6 col-lg-8 col-md-8 col-sm-10 txtCenter">
                <div id="divThesisImg">
                    <div class="bgCircle"></div>
                    <div id="boxImage">
                        <img src="pic/element_thesis2023.png">
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-2 col-md-2 col-sm-1"></div>

            <!-- Candles -->
            <div class="col-lg-12 txtCenter">
                <div class="bgDivCandle">
                    <div class="divCandle">
                        <div class="candleL">
                            <div class="candle">
                                <div class="flame">
                                    <div class="flmePart flm1"></div>
                                    <div class="flmePart flm2"></div>
                                </div>
                                <div class="thread"></div>
                                <div class="candleBar"></div>
                            </div>
                            <div class="plane"></div>
                        </div>
                        <div class="candleR">
                            <div class="candle">
                                <div class="flame">
                                    <div class="flmePart flm1"></div>
                                    <div class="flmePart flm2"></div>
                                </div>
                                <div class="thread"></div>
                                <div class="candleBar"></div>
                            </div>
                            <div class="plane"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <p class="textSlideR">
            <span>
                &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
            </span>
        </p>

        <div class="row thesisTitle">
            <div class="col-lg-1"></div>
            <div class="col-lg-4 col-md-5 col-sm-5">
                <div class="divTable">
                    <div class="divCell txtCenter">
                        <img src="pic/main_logo_thesis2023.png" class="logoThesis">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="divTable">
                    <div class="divCell">
                        <h1>CO-LLECTION เมตตา มา-หา-นิยม</h1>
                        <h5>
                            #COSCIThesis #COSCISWU #COSCI #ทีมนวัต #ทีมมศว
                        </h5>
                        <p>
                            จากกระแสของสายมูเตลูที่คนส่วนใหญ่ให้ความสนใจ และกลายเป็นสิ่งที่นิยมอันดับต้น ๆ ถือว่าเป็น นวัตกรรมที่เปลี่ยนไปจากเดิม สังเกตได้จากสิ่งของต่าง ๆ ที่ทำออกมาในรูปแบบใหม่ 
                            และ<span class="noWrap">เชื่อมโยง</span>กับ<span class="noWrap">มูเตลู</span> <br> 
                            <b>เมตตา มา หา นิยม</b> จึงเป็นการมูและอวยพรเพื่อให้ นวัต 62 จบการศึกษาครบทุกคน ไม่ขาดใครไป จบพร้อมเพื่อนอย่างลุล่วงสำเร็จไปด้วยดี เพี้ยง! 
                            และ<span class="noWrap">โคซาย</span><span class="noWrap">กำลัง</span>เป็นที่ต้องการของตลาด มีกลุ่มเป้าหมายที่กว้างขึ้น
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-1"></div>
        </div>

        <p class="textSlideL">
            <span>
                &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
            </span>
        </p>

        <div class="row thesisPoster">
            <div class="col-lg-12 txtCenter">
                <h2 class="h2Head">นิทรรศการของพวกเรา</h2>
                <div id="posterDivSlider">
                    <div class="slideContainer">
                        <div class="boxSlides sh">
                            <img src="pic/poster_tour2023.jpg" alt="COSCI_touris2023">
                        </div>
                        <div class="boxSlides sh">
                            <img src="pic/poster_health2023.jpg" alt="COSCI_health2023">
                        </div>
                        <div class="boxSlides sh">
                            <img src="pic/poster_inno2023.jpg" alt="COSCI_inno2023">
                        </div>
                        <div class="boxSlides sh">
                            <img src="pic/poster_cinema2023.jpg" alt="COSCI_cinema2023">
                        </div>
                        <div class="boxSlides sh">
                            <img src="pic/poster_cyber2023.jpg" alt="COSCI_cyber2023">
                        </div>
                        <div class="boxSlides sh">
                            <img src="pic/poster_commu2023.jpg" alt="COSCI_commu2023">
                        </div>
                        <div class="boxSlides sh">
                            <img src="pic/poster_multi2023.jpg" alt="COSCI_multi2023">
                        </div>
                
                        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                        <a class="next" onclick="plusSlides(1)">&#10095;</a>
                    </div>
                
                    <div id="divDot">
                        <span class="dot" onclick="currentSlide(1)"></span>
                        <span class="dot" onclick="currentSlide(2)"></span>
                        <span class="dot" onclick="currentSlide(3)"></span>
                        <span class="dot" onclick="currentSlide(4)"></span>
                        <span class="dot" onclick="currentSlide(5)"></span>
                        <span class="dot" onclick="currentSlide(6)"></span>
                        <span class="dot" onclick="currentSlide(7)"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row thesisMajors">
            <div class="col-xl-2 col-lg-1"></div>
            <div class="col-xl-8 col-lg-10">
                <div class="row" style="margin: 0;">
                    <div class="col-lg-4 col-md-5 col-sm-4" data-san="slideLeft">
                        <div class="bgDivLogo">
                            <div class="divLogoMaj">
                                <img src="pic/logo_tour2023.png">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-8 majDes" data-san="slideLeft">
                        <div class="divTable">
                            <div class="divCell">
                                <div class="majName">เที่ยว 4 HID</div>
                                <span class="majTxt">
                                    ‘เที่ยว 4 ทิศ ไม่ Hid ได้ไง’ 
                                    เราจะพาทุกคนไปรู้จักกับสถานที่ท่องเที่ยว วัฒนธรรม วิถีชีวิต และเรื่องราวสุด Hidden ของทั้ง 4 ภาคในไทย ให้ทุกคนได้เก็บเกี่ยวและแลกเปลี่ยนประสบการณ์การท่องเที่ยวที่ไม่เคยรู้มาก่อน
                                </span>
                                <span class="majMaj">
                                    วิชาเอกการสื่อสารเพื่อการท่องเที่ยว <br>
                                    Tourism Communication
                                </span>
                                <div class="majDivLink">
                                    <a href="https://www.facebook.com/TourismThesisExhibition" target="_blank">
                                        <img src="pic/icon_facebook2.png">
                                    </a>
                                    <a href="https://www.instagram.com/tourismthesis/" target="_blank">
                                        <img src="pic/icon_instagram2.png">
                                    </a>
                                    <a onclick="show_gallery('tour')">
                                        <img src="pic/icon_image2.png">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-5 col-sm-4" data-san="slideLeft" data-san-delay="200">
                        <div class="bgDivLogo">
                            <div class="divLogoMaj">
                                <img src="pic/logo_health2023.png">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-8 majDes" data-san="slideLeft" data-san-delay="200">
                        <div class="divTable">
                            <div class="divCell">
                                <div class="majName">MUTOPIA</div>
                                <span class="majTxt">
                                    Mutopia ดินแดนของชาวเฮ้ลคอม 
                                    เราจะพาทุกคน Move On แบบสายมูไปด้วยกัน ..พร้อมจะร่ายคาถาทั้ง 16 บทไปกับพวกเราแล้วหรือยัง!!
                                </span>
                                <span class="majMaj">
                                    วิชาเอกการสื่อสารเพื่อสุขภาพ <br>
                                    Health Communication
                                </span>
                                <div class="majDivLink">
                                    <a href="https://www.facebook.com/HealthThesisExhibition.COSCI/" target="_blank">
                                        <img src="pic/icon_facebook2.png">
                                    </a>
                                    <a href="https://www.instagram.com/healthcom.cosci/" target="_blank">
                                        <img src="pic/icon_instagram2.png">
                                    </a>
                                    <a onclick="show_gallery('health')">
                                        <img src="pic/icon_image2.png">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-5 col-sm-4" data-san="slideLeft" data-san-delay="400">
                        <div class="bgDivLogo">
                            <div class="divLogoMaj">
                                <img src="pic/logo_inno2023.png">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-8 majDes" data-san="slideLeft" data-san-delay="400">
                        <div class="divTable">
                            <div class="divCell">
                                <div class="majName">บายศรีสู่สรรค์</div>
                                <span class="majTxt">
                                    ‘The soul of creativity เนรมิตการสื่อสารด้วยจิตวิญญาณนักสร้างสรรค์’ 
                                    พบกับผลงานสร้างสรรค์อัดแน่นมากถึง 13 ผลงาน ..ขอเชิญทุกคนมาสู่สรรค์และร่วมเป็นส่วนหนึ่งในการผลักดันนักสื่อสารรุ่นใหม่
                                </span>
                                <span class="majMaj">
                                    วิชาเอกการสื่อสารเพื่อการจัดการนวัตกรรม <br>
                                    Innovation Management Communication
                                </span>
                                <div class="majDivLink">
                                    <a href="https://www.facebook.com/innocosciswu" target="_blank">
                                        <img src="pic/icon_facebook2.png">
                                    </a>
                                    <!-- <a href="" target="_blank">
                                        <img src="pic/icon_instagram2.png">
                                    </a> -->
                                    <a onclick="show_gallery('inno')">
                                        <img src="pic/icon_image2.png">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-5 col-sm-4" data-san="slideLeft" data-san-delay="600">
                        <div class="bgDivLogo">
                            <div class="divLogoMaj">
                                <img src="pic/logo_cinema2023.png">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-8 majDes" data-san="slideLeft" data-san-delay="600">
                        <div class="divTable">
                            <div class="divCell">
                                <div class="majName">Keep Rolling Thesis Exhibition : It's a wrap</div>
                                <span class="majTxt">
                                    กลับมาอีกครั้งกับงานฉายภาพยนตร์ธีสิสจากนิสิตภาพยนตร์ มศว กับภาพยนตร์สั้นทั้ง 10 เรื่อง 
                                    ..ถ้าอยากเจอกับสมาชิกทั้ง 10 ห้องของ DOUZENEMA Apartment! อย่าลืมเข้ามาชมกันนะ
                                </span>
                                <span class="majMaj">
                                    สาขาภาพยนตร์และสื่อดิจิทัล <br>
                                    Cinema and Digital Media
                                </span>
                                <div class="majDivLink">
                                    <a href="https://www.facebook.com/KeepRollingThesis" target="_blank">
                                        <img src="pic/icon_facebook2.png">
                                    </a>
                                    <a href="https://www.instagram.com/keeprollingthesis/" target="_blank">
                                        <img src="pic/icon_instagram2.png">
                                    </a>
                                    <a onclick="show_gallery('cinema')">
                                        <img src="pic/icon_image2.png">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-5 col-sm-4" data-san="slideLeft" data-san-delay="400">
                        <div class="bgDivLogo">
                            <div class="divLogoMaj">
                                <img src="pic/logo_cyber2023.png">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-8 majDes" data-san="slideLeft" data-san-delay="400">
                        <div class="divTable">
                            <div class="divCell">
                                <div class="majName">Cyber Town เมืองมหาเสน่ห์ (X Ari Around)</div>
                                <span class="majTxt">
                                    มาแล้วกับงานที่รอคอย ‘Cyber Town (X AriAround) เมืองมหาเสน่ห์’ พบกับผลงานของนิสิตไซเบอร์ มศว มากมาย
                                </span>
                                <span class="majMaj">
                                    วิชาเอกการจัดการธุรกิจไซเบอร์ <br>
                                    Cyber Business Management
                                </span>
                                <div class="majDivLink">
                                    <a href="https://www.facebook.com/CybertownthesisExhibition" target="_blank">
                                        <img src="pic/icon_facebook2.png">
                                    </a>
                                    <a href="https://www.instagram.com/cyberthesis_swu/" target="_blank">
                                        <img src="pic/icon_instagram2.png">
                                    </a>
                                    <a onclick="show_gallery('cyber')">
                                        <img src="pic/icon_image2.png">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-5 col-sm-4" data-san="slideLeft" data-san-delay="200">
                        <div class="bgDivLogo">
                            <div class="divLogoMaj">
                                <img src="pic/logo_commu2023.png">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-8 majDes" data-san="slideLeft" data-san-delay="200">
                        <div class="divTable">
                            <div class="divCell">
                                <div class="majName">คอม(สาย)มู : แก้บัคไม่ได้ให้มูก่อน</div>
                                <span class="majTxt">
                                    รวมผลงานธีสิตของพวกเรานิสิตคอมมูไว้มากมาย เข้ามาชมกันได้เลย!!
                                </span>
                                <span class="majMaj">
                                    วิชาเอกคอมพิวเตอร์เพื่อการสื่อสาร <br>
                                    Computer for Communication
                                </span>
                                <div class="majDivLink">
                                    <a href="https://www.facebook.com/CommuteluThesis" target="_blank">
                                        <img src="pic/icon_facebook2.png">
                                    </a>
                                    <a href="https://www.instagram.com/commuthesis/" target="_blank">
                                        <img src="pic/icon_instagram2.png">
                                    </a>
                                    <a href="http://commuexhibition.com" target="_blank">
                                        <img src="pic/icon_web2.png">
                                    </a>
                                    <a onclick="show_gallery('commu')">
                                        <img src="pic/icon_image2.png">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-5 col-sm-4" data-san="slideLeft">
                        <div class="bgDivLogo">
                            <div class="divLogoMaj">
                                <img src="pic/logo_multi2023.png">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-8 majDes" data-san="slideLeft">
                        <div class="divTable">
                            <div class="divCell">
                                <div class="majName">The Last Suffer ทุกข์สุดท้าย ตายเพื่อเกิด</div>
                                <span class="majTxt">
                                    ระหว่างการเดินทางของพวกเราชาวมัลติ ที่ไม่ว่าจะถูกความทุกข์หรือความเจ็บปวดถาโถมจนร่างกายแทบแตกสลาย แต่ท้ายที่สุดแล้วก็จะฟื้นคืนชีพกลับมา เพื่อเป็นคนใหม่ที่แข็งแกร่งยิ่งกว่าเดิม
                                </span>
                                <span class="majMaj">
                                    วิชาเอกการออกแบบสื่อปฎิสัมพันธ์และมัลติมีเดีย <br>
                                    Interactive and Multimedia Design
                                </span>
                                <div class="majDivLink">
                                    <a href="https://www.facebook.com/Multi.Xhibition" target="_blank">
                                        <img src="pic/icon_facebook2.png">
                                    </a>
                                    <a href="https://www.instagram.com/iamd.multi/" target="_blank">
                                        <img src="pic/icon_instagram2.png">
                                    </a>
                                    <a onclick="show_gallery('multi')">
                                        <img src="pic/icon_image2.png">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-1"></div>
        </div>

        <p class="textSlideR">
            <span>
                &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
                CO-LLECTION เมตตา มา-หา-นิยม &nbsp; --- &nbsp; 
            </span>
        </p>

        <div class="row thesisVDO">
            <div class="col-xl-3 col-lg-2 col-md-1"></div>
            <div class="col-xl-6 col-lg-8 col-md-10 txtCenter">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/wYD-EFwx3dw?autoplay=0&playlist=wYD-EFwx3dw&loop=1" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-xl-3 col-lg-2 col-md-1"></div>
            <div class="col-lg-12 txtCenter">
                <br><br><br><br><br>
                <a href="thesis_all.php" id="aBTN">
                    นิทรรศการนวัตกรรมสื่อสารนิพนธ์ทั้งหมด
                </a>
            </div>
        </div>

        <div class="row divfootter">
            <div class="col-lg-1 col-md-1"> </div>
            <div class="col-lg-3 col-md-5 div01">
                <img src="pic/logo_cosci.png">
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
                    <img src="pic/icon_facebook1.png"><span>COSCI SWU</span>
                </a>
                <a href="https://www.youtube.com/watch?v=306-8ddB4UQ" target="_blank">
                    <img src="pic/icon_youtube1.png"><span>COSCI Innovation Thesis</span>
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


    <!-- ===== แสดงรูป/gallery Thesis ===== -->
    <div id="divLoad" class="modalGallery">
        <div class="divTable">
            <div class="divCell txtCenter">
                <i class="fa fa-spinner fa-spin" style="font-size:80px; color:white;"></i>
            </div>
        </div>
    </div>
    <div id="divGallery" class="modalGallery">
        <div class="boxGridLR">
            <div id="sideBox">
                <div id="sideScroll"></div>
            </div>
            <div id="divShowGImg">
                <div id="showImg"></div>
            </div>
        </div>
        <span class="galleryClose"><i class="fa fa-times"></i></span>
    </div>
</body>

<script src="others/mainJS.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    // Ajax
    $.post(
        "others/php_backend.php",
        {userTimezone:  Intl.DateTimeFormat().resolvedOptions().timeZone + ' / ' + new Date().toString().match(/([A-Z]+[\+-][0-9]+.*)/)[1],
         pageOpen:      'Thesis-2023'},
        // function(datas, status) {
        //     alert(datas)
        // }
    );

    // Reload One time after onload
    var numTD = "<?php echo $cntToday; ?>";
    var numAll = "<?php echo $cntYear; ?>";
    $('#getNumTD').text(numberWithCommas(numTD));
    $('#getNumAll').text(numAll.toLocaleString());
    window.onload = windowLoad(numTD, numAll, 'thesis2023');




    /* ========== Slide Show Poster ========== */
    const setTimeOut = 3000;    //หรือ 7000 ถ้าภาพยังโหลดไม่ทัน
    const minutTime = 70;
    var timeOut = setTimeOut;
    var slideIndex = 1;
    var autoOn = true;

    showSlides(slideIndex);
    autoSlides();
    function autoSlides() {
        timeOut = timeOut - minutTime;

        if (autoOn == true && timeOut < 0) {
            showSlides(slideIndex);
        }
        setTimeout(autoSlides, minutTime);
    }

    function showSlides(n) {
        timeOut = setTimeOut;

        var slides = document.getElementsByClassName("boxSlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1;}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
            dots[i].className = dots[i].className.replace(" activeDot", "");
        }

        slides[slideIndex-1].style.display = "block"; 
        dots[slideIndex-1].className += " activeDot";

        slideIndex++;
    }
    
    function plusSlides(n) {
        showSlides(slideIndex += (n - 1));
    }
    
    function currentSlide(n) {
        showSlides(slideIndex = n);
    }


    /* ========== Image Gallery ========== */
    var sideScroll = document.getElementById("sideScroll");
    var sideImage = document.getElementsByClassName("sideImg");
    var showImage = document.getElementById("showImg");
    var numIndex = 0;
    var allIndex = sideImage.length;
    // Before Show
    function show_gallery(majorCode) {
        $('#divLoad').show();
        while (sideScroll.hasChildNodes()) {
            sideScroll.removeChild(sideScroll.firstChild);
        }
        showImage.style.backgroundImage = "url()";

        setTimeout(function() {
            set_gallery(majorCode);
            $('#divLoad').hide();
        }, 3000);
    }
    // Show Gallery
    function set_gallery(majorCode) {
        sideScroll.innerHTML = '';

        const likeMaj = majorCode + '_';
        const thesisY = 2023;
        const path = 'pic/thesis_collection/' + thesisY + '/';
        var majFileName = [];

        // Ajax Find Files
        $('#divGallery').show();
        $.ajax({
            type : "POST",
            url  : "others/php_backend.php",
            data : { ybe : thesisY, maj : likeMaj },
            success: function(res) {
                const myJSON = JSON.parse(res);
                majFileName = myJSON.maj_file_name;

                majFileName.forEach(em => {
                    // console.log(em);
                    const pathFile = path + em;
                    const divSide = document.createElement("div");
                    divSide.style.backgroundImage = "url(" + pathFile + ")";
                    divSide.classList.add("sideImg");
                    divSide.onclick = function() {
                        const allElements = document.querySelectorAll(".sideImg.imgShow");
                        allElements.forEach((element) => {
                            element.classList.remove('imgShow');
                        });
                        this.classList.add("imgShow");
                        const classSideImg = document.getElementsByClassName("sideImg");
                        numIndex = Array.from(classSideImg).indexOf(this);

                        const bgImg = this.style.backgroundImage;
                        const url = bgImg.substring(4, bgImg.length-1);
                        showImage.style.backgroundImage = "url(" + url + ")";
                    };
                    sideScroll.appendChild(divSide);
                });

                // Set Default
                sideScroll.scrollLeft = 0;
                sideScroll.scrollTop = 0;
                sideImage = document.getElementsByClassName("sideImg");
                sideImage[0].classList.add("imgShow");
                const defaultBgImg = sideImage[0].style.backgroundImage;
                const defaultBgURL = defaultBgImg.substring(4, defaultBgImg.length-1);
                showImage.style.backgroundImage = "url(" + defaultBgURL + ")";
                $(".sideImg").eq(0).click();
            }
        });
    }

    // Close modal
    $('.galleryClose').click(function() {
        $('#divGallery').hide();
        sideScroll.innerHTML = '';
    });
    const modal1 = document.getElementById("divGallery");
    window.onclick = function(event) {
        if (event.target == modal1) { modal1.style.display = "none"; }
    }
    document.onkeydown = function(e) {
        allIndex = sideImage.length;
        const width = $(window).width();
        e = e || window.event;
        // if modal show
        if (modal1.style.display != "none") {
            if ( e.keyCode === 27 ) { // ESC
                modal1.style.display = "none";
                sideScroll.innerHTML = '';
            }

            // Keyboard Left Right Top Down
            var num = 0;
            if (e.keyCode == '37' || e.keyCode == '38') { // left or up
                num = -1;
            }
            else if (e.keyCode == '39' || e.keyCode == '40') { // right or down
                num = +1;
            }
            else {
                num = 0;
            }

            if (num != 0) {
                numIndex += num;
                if (numIndex < 0) { numIndex = 0; }
                if (numIndex > (allIndex-1)) { numIndex = (allIndex-1); }

                if (allIndex > 0) {
                    $(".sideImg").eq(numIndex).click();

                    if (width > 580) { // Up and Down
                        const divHeight = $(".sideImg").eq(numIndex).height();
                        $('#sideScroll').animate({ scrollTop: '+='+((divHeight + 12) * num) }, "fast");
                    }
                    else {  // Small Screen Width
                        const divWidth = $(".sideImg").eq(numIndex).width();
                        $('#sideScroll').animate({ scrollLeft: '+='+((divWidth + 8) * num) }, "fast");
                    }
                }
            }
        }
    }
</script>

</html>
