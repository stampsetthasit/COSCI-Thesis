<!DOCTYPE html>
<html lang="th">
<head>
    <title>COSCI Inovation Thesis</title>
    <?php
    require_once('others/forAllPage.php');
    setTagInHead();
    ?>

    <!-- ===== Fonts ===== -->
    <link rel="preconnect" href="https://fonts.gstatic.com"> 
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --gray1:    #CACAC8;
            --gray2:    #4f4f4f;
        }

        body * {
            font-family: 'Kanit', sans-serif;
        }
        body {
            background-color: white;
            background-image: radial-gradient(#CACAC8 70%, #a6a6a6 90%, #858585 100%);
            background-repeat: no-repeat;
            background-size: 100%;
            height: 100%;
            min-height: 100vh;
            width: 100%;
            margin: 0;
            position: relative;
            box-sizing: border-box;
        }

        /* ========== Header ========== */
        #divHeader {
            background: var(--gray2);
            position: relative;
            width: 45%;
            padding-top: 16px;
            padding-left: 30px;
        }
        #divHeader img {
            display: block;
            height: 50px;
        }
        #divHeader::before {
            content: '';
            position: absolute;
            background-image: radial-gradient(ellipse at 100% 100%, rgba(0, 0, 0, 0) 75%, var(--gray2) 75%);
            top: 100%;
            left: 0;
            width: 100%;
            height: 100px;
        }
        #divHeader::after {
            content: '';
            position: absolute;
            background: var(--gray2);
            top: 0%;
            left: 100%;
            width: 100%;
            height: 100%;
            border-radius: 0 0 100% 0 / 0 0 100% 0;
        }

        /* ========== Body ========== */
        .divBody {
            margin-top: 100px;
            margin-bottom: 80px;
        }
        .colMarB {
            margin-bottom: 60px;
        }
        .divBody a h4 {
            color: #777;
            text-shadow: 
                0 0 1px rgba(255, 255, 255, 0.6), 
                0 0 2px rgba(255, 255, 255, 0.6), 
                0 0 3px rgba(255, 255, 255, 0.6), 
                0 0 4px rgba(255, 255, 255, 0.6);
            padding: 6px;
            border-radius: 6px;
        }
        .divBody a:hover {
            text-decoration: none;
        }
        .divBody a:hover h4 {
            color: #333;
            text-shadow: 
                0 0 2px rgba(255, 255, 255, 1.0), 
                0 0 4px rgba(255, 255, 255, 1.0), 
                0 0 6px rgba(255, 255, 255, 1.0), 
                0 0 8px rgba(255, 255, 255, 1.0);
            background-color: #909090;
        }
        .divLogoThesis {
            width: 100%;
            height: 15em;
            position: relative;
        }
        .divLogoThesis img {
            max-width: 70%;
            max-height: 15em;
        }

        /* ========== Header & Footer ========== */
        #divFooter {
            width: 100%;
            text-align: right;
            position: absolute;
            bottom: 0;
            right: 0;
        }
        #boxFooter {
            background-color: var(--gray2);
            color: #ccc;
            padding: 10px 20px;
            width: 30%;
            margin-left: auto;
            position: relative;
        }
        #boxFooter::before {
            content: '';
            position: absolute;
            background-image: radial-gradient(ellipse at 0% 0%, rgba(0, 0, 0, 0) 75%, var(--gray2) 75%);
            top: -100%;
            right: 0;
            width: 100%;
            height: 100%;
        }
        #boxFooter::after {
            content: '';
            position: absolute;
            background: var(--gray2);
            bottom: 0%;
            right: 100%;
            width: 100%;
            height: 100%;
            border-radius: 100% 0 0 0 / 100% 0 0 0;
        }


        /* ========== Animation ========== */
        #logo2021:hover img {
            transform-origin: bottom;
            animation: img2021 1.75s ease infinite;
        }
        @keyframes img2021 {
            0%   { transform: scale(1,1)    translateY(0); }
            10%  { transform: scale(1.1,.9) translateY(0); }
            30%  { transform: scale(.9,1.1) translateY(-80px); }
            50%  { transform: scale(1,1)    translateY(0); }
            100% { transform: scale(1,1)    translateY(0); }
        }
        #logo2022:hover img {
            transform-origin: center;
            animation: img2022 2s ease infinite;
        }
        @keyframes img2022 {
            to { transform: rotateY(360deg); }
        }
        .divFlex {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            height: 100%;
            width: 100%;
        }
        .divFlex img {
            position: relative;
            z-index: 2;
        }
        .divFlex::before, .divFlex::after {
            position: absolute;
            content: '';
            border: none;
            border-radius: 100%;
            box-sizing: border-box;
            height: 20%;
            aspect-ratio: 1;
            left: 40%;
            top: 40%;
            transform-origin: center;
            transform: scale(0.75);
            opacity: 0.6;
            z-index: 1;
        }
        #logo2023:hover .divFlex::before, #logo2023:hover .divFlex::after {
            border: #fff solid 4px;
            animation: img2023_1 1s linear infinite, img2023_2 6s linear infinite;
        }
        #logo2023:hover .divFlex::after {
            animation-delay: .5s;
        }
        @keyframes img2023_1 {
            to {
                opacity: 0;
                transform: scale(6.75);
            }
        }
        @keyframes img2023_2 {
            0% { border-color: hsl(0, 100%, 50%); }
            25% { border-color: hsl(73, 98%, 44%); }
            50% { border-color: hsl(41, 85%, 52%); }
            75% { border-color: hsl(270, 100%, 50%); }
            100% { border-color: hsla(284, 74%, 39%, 0.884); }
        }

        /* ========== Dot ========== */
        .dotLink {
            margin-bottom: 10px;
        }
        .dot {
            display: inline-block;
            margin: 4px;
            width: 10px;
            height: 10px;
            background-color: #999;
            border-radius: 50%;
        }
        .dot:hover, .dotShow {
            cursor: pointer;
            background-color: #777;
        }



        /* ========== Resize ========== */
        @media only screen and (max-width: 2000px) {
            /* ========== Body ========== */
            .divLogoThesis { height: 12em; }
            .divLogoThesis img {
                max-width: 75%;
                max-height: 12em;
            }
        }
        @media only screen and (max-width: 580px) {
            /* ========== Header ========== */
            #divHeader {
                width: 50%;
                padding-top: 10px;
                padding-bottom: 10px;
                padding-left: 15px;
            }
            #divHeader img { height: 40px; }
            #divHeader:after { left: 99%; }

            /* ========== Body ========== */
            .divBody {
                margin-top: 80px;
                margin-bottom: 100px;
            }

            /* ========== Header & Footer ========== */
            #boxFooter {
                font-size: 12px;
                width: 45%;
            }
        }
    </style>
</head>
<body>
    <div id="divHeader">
        <img src="pic/logo_cosci.png">
    </div>

    <div class="container-fluid">
        <!-- ===== Thesis ===== -->
        <div class="row divBody" id="body01">
            <div class="col-xl-1"></div>
            <div class="col-xl-10">
                <div class="row" style="margin: 0;">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 txtCenter colMarB">
                        <a href="index.php" id="logo2023">
                            <div class="divLogoThesis">
                                <div class="divFlex">
                                    <img src="pic/main_logo_thesis2023.png">
                                </div>
                            </div>
                            <h4>COSCI Thesis Exhibition 2023</h4>
                        </a>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 txtCenter colMarB">
                        <a href="thesis2022.php" id="logo2022">
                            <div class="divLogoThesis">
                                <div class="divTable">
                                    <div class="divCell">
                                        <img src="pic/main_logo_thesis2022.png">
                                    </div>
                                </div>
                            </div>
                            <h4>COSCI Thesis Exhibition 2022</h4>
                        </a>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 txtCenter colMarB">
                        <a href="thesis2021.php" id="logo2021">
                            <div class="divLogoThesis">
                                <div class="divTable">
                                    <div class="divCell">
                                        <img src="pic/main_logo_thesis2021.png">
                                    </div>
                                </div>
                            </div>
                            <h4>COSCI Thesis Exhibition 2021</h4>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-1"></div>
        </div>

        <!-- ===== Other ===== -->
        <div class="row divBody" id="body99">
            <div class="col-xl-1"></div>
            <div class="col-xl-10">
                <div class="row" style="margin: 0;">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 txtCenter colMarB">
                        <a href="others_program/gradeCal/" target="_blank">
                            <div class="divLogoThesis">
                                <div class="divFlex">
                                    <img src="pic/others_pic/logo_cal_grade.png">
                                </div>
                            </div>
                            <h4>ระบบคำนวณเกรด</h4>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-1"></div>
        </div>
    </div>

    <br><br>
    <div id="divFooter">
        <div class="dotLink txtCenter">
            <b class="dot" id="dot01"></b>
            <b class="dot" id="dot99"></b>
        </div>
        <div id="boxFooter" class="txtRight">&copy; COSCI SWU</div>
    </div>

</body>

<script>
    const allDivBody = document.querySelectorAll(".divBody");
    const allDot = document.querySelectorAll(".dot");
    function hideAllBody() {
        for (let i = 0; i < allDivBody.length; i++) {
            allDivBody[i].style.display = "none";
            allDot[i].classList.remove("dotShow");
        }
    }
    hideAllBody();
    allDivBody[0].style.display = "block";
    allDot[0].classList.add("dotShow");
    for (let i = 0; i < allDot.length; i++) {
        allDot[i].onclick = function() {
            hideAllBody();
            allDivBody[i].style.display = "block";
            allDot[i].classList.add("dotShow");
        }
    }

    /* ========== TOUCH slide left & right ========== */
    // document.addEventListener("touchstart", handleTouchStart);
    // document.addEventListener("touchmove", handleTouchMove);
    // var xDown = null;                                                        
    // var yDown = null;
    // function getTouches(evt) {
    //     return evt.touches ||             // browser API
    //            evt.originalEvent.touches; // jQuery
    // }

    // function handleTouchStart(evt) {
    //     const firstTouch = getTouches(evt)[0];                                      
    //     xDown = firstTouch.clientX;                                      
    //     yDown = firstTouch.clientY;                                      
    // }

    // function handleTouchMove(evt) {
    //     if ( !xDown || !yDown ) { return; }

    //     var xUp = evt.touches[0].clientX;                                    
    //     var yUp = evt.touches[0].clientY;

    //     var xDiff = xDown - xUp;
    //     var yDiff = yDown - yUp;
                                                                            
    //     if ( Math.abs( xDiff ) > Math.abs( yDiff ) ) {
    //         if ( xDiff > 0 ) {  //right swipe (R --> L)
    //             for (let i = 0; i < allDot.length; i++) {
    //                 if (allDivBody[i].style.display == "block") {
    //                     if (i+1 < allDot.length) {
    //                         hideAllBody();
    //                         allDivBody[i+1].style.display = "block";
    //                         allDot[i+1].classList.add("dotShow");
    //                     }
    //                 }
    //             }
    //         } else {  // left swipe (L --> R)
    //             for (let i = 0; i < allDot.length; i++) {
    //                 if (allDivBody[i].style.display == "block") {
    //                     if (i-1 >= 0) {
    //                         hideAllBody();
    //                         allDivBody[i-1].style.display = "block";
    //                         allDot[i-1].classList.add("dotShow");
    //                     }
    //                 }
    //             }
    //         }                       
    //     }
    //     // reset values
    //     xDown = null;
    //     yDown = null;                                             
    // }
</script>

</html>