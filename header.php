<?php 
include_once "session.php"; 
include_once "db/member/getMember.php"; 
?>
<!doctype html>
<html lang="en">

<head>
    <title>Venus</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--CSS-->
    <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700&display=swap" rel="stylesheet">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="static/css/origin/style.css">
    <!--CSS-->
    <link rel="stylesheet" href="static/fonts/icomoon/style.css">
    <link rel="stylesheet" href="static/css/origin/bootstrap.min.css">
    <link rel="stylesheet" href="static/css/origin/bootstrap-datepicker.css">
    <link rel="stylesheet" href="static/css/origin/jquery.fancybox.min.css">
    <link rel="stylesheet" href="static/css/origin/owl.carousel.min.css">
    <link rel="stylesheet" href="static/css/origin/owl.theme.default.min.css">
    <link rel="stylesheet" href="static/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="static/css/origin/aos.css">
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    <div class="site-wrap" id="home-section">

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>
        <!--상단-->
        <header id='header' class="site-navbar site-navbar-target" role="banner">
            <!--상위정보단-->
            <div class="container mb-3">
                <div class="d-flex align-items-center">
                    <!--로고-->
                    <div class="site-logo mr-auto">
                        <a href="index.php">Venus<span class="text-primary">Consulting</span></a>
                    </div>
                    <!--우측아이콘/정보-->
                    <div class="site-quick-contact d-none d-lg-flex ml-auto ">
                        <!--지도-->
                        <div class="d-flex site-info align-items-center mr-5">
                            <span class="block-icon mr-3"><span class="icon-map"></span></span>
                            <span>서울특별시 강남구 논현로 518,<br />여산빌딩 2층</span>
                        </div>
                        <!--시간-->
                        <div class="d-flex site-info align-items-center mr-5">
                            <span class="block-icon mr-3"><span class="icon-clock-o"></span></span>
                            <span>Monday - Saturday<br />9:00AM - 6:00PM</span>
                        </div>
                        <!--연락처-->
                        <div class="d-flex site-info align-items-center">
                            <span class="block-icon mr-3"><span class="icon-phone"></span></span>
                            <span>Call : 02)539-1144<br />Email : venusjob@venusjob.com</span>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container">
                <!--메뉴단-->
                <div class="menu-wrap d-flex align-items-center" style="position:relative;">
                    <span class="d-inline-block d-lg-none">
                        <a href="#" class="text-black site-menu-toggle js-menu-toggle py-5"><span
                                class="icon-menu h3 text-black"></span></a>
                    </span>
                    <!--웹메뉴-->
                    <!-- 선택된 메뉴의 경우 다음 코드를 추가한다. class="active" -->
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item dropdown mr-2">
                                    <a class="nav-link" href="./companyIntro.php" id="navbarDropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false">
                                        회사소개
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="./companyIntro.php#ceoGreet">인사말</a>
                                        <a class="dropdown-item" href="./companyIntro.php#overviewCompany">회사개요</a>
                                        <a class="dropdown-item" href="./companyIntro.php#dispatchArea">파견분야</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown mr-2">
                                    <a class="nav-link" href="./services.php" id="navbarDropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false">
                                        서비스소개
                                    </a>
                                </li>
                                <li class="nav-item dropdown mr-2">
                                    <a class="nav-link" href="./job-info.php" id="navbarDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        채용정보
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="./jobInfo-region.php">지역별</a>
                                        <a class="dropdown-item" href="./jobInfo-jikjong.php">직종별</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown mr-2">
                                    <a class="nav-link"  href="./customerSupport.php" id="navbarDropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false">
                                        고객지원
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="./customerSupport.php#consult">상담/불편신고</a>
                                        <a class="dropdown-item" href="./customerSupport.php#certificate">증명서발급신청관리</a>
                                        <a class="dropdown-item" href="./customerSupport.php#contactUs">담당자연락처</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class=" nav-link " href="./notice_board.php" id="navbarDropdown " role="button "
                                        aria-haspopup="true " aria-expanded="false ">
                                        게시판
                                    </a>
                                    <div class="dropdown-menu "  href="./faq_board.php" aria-labelledby="navbarDropdown ">
                                        <a class="dropdown-item " href="./faq_board.php">FAQ</a>
                                        <a class="dropdown-item " href="./qna_board.php ">Q&A</a>
                                        <a class="dropdown-item " href="./notice_board.php">공지사항</a>
                                        <a class="dropdown-item " href="./news_board.php">취업뉴스</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <!--회원메뉴-->
                  
                    <div class="member-menu" style="display:inherit; position:absolute; right:0;">
                    <?php if($loginId)  {?>
                        <div class="nav-item dropdown mr-2">
                            <a class="nav-link" href="mypage-main.php" id="navbarDropdown" role="button" 
                                aria-haspopup="true" aria-expanded="false">
                                <?php 
                                
                                    echo getMemberById($loginId)['name']."님 환영해용" ;
                                ?>
                            </a>
                        </div>
                        <div class="nav-item dropdown mr-4">
                            <a class="nav-link" href="logout.php">
                                Logout
                            </a>
                        </div>
                    </div>
                    <?php }
                            else{
                            echo "<div class='nav-item dropdown mr-4'><a href='login-regist.php'><span>LOGIN/REGIST</span></a></div>";
                            }
                        ?>
                </div>
            </div>
        </header>