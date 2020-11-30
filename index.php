<?php
     include_once('./db/jhDbcon.php');
    include_once('header.php');
?>
<style>
    .slider {
        width: 100%;
        height: 150px;
        overflow: hidden;
        position: relative;
        margin: 50px auto;
    }     
    .imgSlider{
        padding:30px 50px;
    }
    .slick-prev {
        position: absolute;
        z-index: 999;
        top: 65%;
        left: 0%;
        border: 0;
        padding: 5px;
        background-color:white;
        color:#c1c2c3;
    }
    .slick-next {
        position: absolute;
        z-index: 999;
        top: 65%;
        right: 0%;
        border: 0;
        padding: 5px;
        background-color:white;
        color:#c1c2c3;
    }
</style>
<link href="./static/css/slick.css" rel="stylesheet">
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="./static/js/slick.js"></script>
<script src="./static/js/jquery.easing.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/moonspam/NanumSquare/master/nanumsquare.css">
<style>
#boardA{
    font-family: "NanumSquare", sans-serif;
    font-size:17px;
}
</style>
       <div class="ftco-blocks-cover-1">
            <!--상단 이미지 : 상단 메뉴 및 여자 배경화면-->
            <div class="site-section-cover overlay "  data-stellar-background-ratio="0.5" style="background-image: url('static/img/hero_1.jpg') ">
                <div class="container ">
                    <!--상단 텍스트 :  메뉴이름, 설명-->
                    <div class="row align-items-center justify-content-center text-center ">
                        <div class="col-md-12 mt-5 pt-5 ">
                            <h1 class="m-0 p-2">Venus Consulting</h1>
                            <p class="m-0">Venus Consulting, the fastest way to get a job, is with us.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-section bg-light mb-0 pb-4">
            <div class="container">
                <!--중앙제목-->
                <div class="row justify-content-center text-center mb-5 section-2-title">
                    <div class="col-md-8 mb-5">
                        <h1 class="scissors text-center" style="font-weight:900;color:#1d2a30;">VENUS CONSULTING</h1>
                        <p class="mb-5" style="font-size:17px;">1996년 설립,초기단계부터 경영기획 및 탁월한 마케팅 기법을 도입하여<br> 단순한 파견회사가 아닌 일괄적인 사후관리시스템 제도를 접목 시킴으로서<br>21세기 세계로 도약하는 인재 파견전문기업을 지향하고 있습니다.</p>
                    </div>
                </div>
                <div class="row mb-5">
                    <!--상단 좌측:인사말-->
                    <div class="col-md-5 mb-5">
                        <h2 class="h4 mb-4" style="color:#1d2a30;">CEO Greeting</h2>
                        <p>Venus Consulting executives and employees are committed to improving the quality of service to customers by doing their best to reconsider the competitiveness of corporate management, flexibly manage the workforce, and create new jobs for irregular workers.</p>

                        <div class="d-flex align-items-center">
                            <span class="sign w-25 mr-4">
                                <img src="static/img/ceo.PNG" alt="" class="img-fluid">
                             </span>
                            <div>
                                <span class="d-block font-weight-bold">Mr. Jo Hang Yong</span>
                                <span>CEO &amp; Co-Founder </span>
                            </div>
                        </div>
                    </div>
                    <!--상단 우측:정보게시판-->
                    <div class="col-md-6 ml-auto mb-5">
                        <h2 class="h4 mb-4" style="color:#1d2a30;">Information Bulletin Board</h2>

                        <div class="progress-wrap mb-2">
                            <div class="d-flex">
                                <span>NOTICE</span>
                                <span class="ml-auto mb-1"><a href="./notice_board.php" style="color:#be4d59">+more</a></span>
                            </div>
                            <?php 
                                $notice=mq('select * from notice order by date desc limit 2');
                                while($noticeBoard=$notice->fetch_array()){
                                    if(strlen($noticeBoard['title'])<=0){
                                        break;
                                    }
                                    echo "<div class='progress rounded-0 mb-1' style='height:30px; vertical-align:middle;'>";
                                     echo "<a id='boardA' href='./notice_read.php?num=".$noticeBoard['noticeNum']."' class='p-1'>".$noticeBoard['title']."</a>";
                                    echo "</div>";
                                }
                            
                            ?>
                        </div>

                        <div class="progress-wrap mb-2">
                            <div class="d-flex">
                                <span>EMPLOYMENT NEWS</span>
                                <span class="ml-auto mb-1"><a href="./news_board.php" style="color:#be4d59">+more</a></span>
                            </div>
                            <?php 
                                $news=mq('select * from news order by date desc limit 2');
                                while($newsBoard=$news->fetch_array()){
                                    if(strlen($newsBoard['title'])<=0){
                                        break;
                                    }
                                    echo "<div class='progress rounded-0 mb-1' style='height:30px; vertical-align:middle;'>";
                                     echo "<a id='boardA' href='./news_read.php?num=".$newsBoard['newsNum']."' class='p-1'>".$newsBoard['title']."</a>";
                                    echo "</div>";
                                }

                            ?>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <!--상단 좌측:구인정보-->
                    <div class="col-md-6 mr-auto mt-5">
                        <h2 class="h4 mb-4" style="color:#1d2a30;">A Job Notice of Employment</h2>

                        <div class="progress-wrap mb-2">
                            <div class="d-flex">
                                <span>POST JOB OPENING</span>
                                <span class="ml-auto mb-1"><a href="./jobInfo-region.php" style="color:#be4d59">+more</a></span>
                            </div>
                            <?php 
                                $jobsql=mq('select * from jobinfo where status="진행중" order by date desc limit 3');
                                while($jobBoard=$jobsql->fetch_array()){
                                    if(strlen($jobBoard['jikjong'])<=0){
                                        break;
                                    }
                                    echo "<div class='progress rounded-0 mb-1' style='height:30px; vertical-align:middle;'>";
                                     echo "<a id='boardA' href='./show-jobinfo.php?id=".$jobBoard['id']."' class='p-1'>".$jobBoard['companyName']." - ".$jobBoard['jikjong']."</a>";
                                    echo "</div>";
                                }
                            ?>
                        </div>
                    </div>
                    <!--상단 우측:인사말-->
                    <div class="col-md-5 mt-5 text-right">
                        <h2 class="h4 mb-4" style="color:#1d2a30;">Our Service</h2>
                        <p>Human Resources Dispatch / Recruitment Agency /<br> Headhunting / Outplacement / Outsourcing /<br> Lycroutopsis Lycroptosse</p>
                        <a href="./services.php"  style="color:#be4d59">Additional Description▷</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="site-section bg-light mt-0">
            <div class="container mt-0">
                <!-- <h2 class="h4 mb-5 text-center" style="color:#1d2a30;">Information Bulletin Board</h2> -->
                <!--중앙 박스 : 이미지와 설명있는 쪽-->
                <div class="row align-items-stretch">
                    <div class="col-lg-4 col-md-6 mb-5">
                        <div class="post-entry-1 h-100 person-1">
                            <!--설명-->
                            <div class="post-entry-1-contents mt-0 pt-5">
                                <span class="meta">A Request for Help</span>
                                <h2><a href="./jobInfo-request.php">구인의뢰</a><span class="wrap-icon"><span class="icon-pencil ml-2"></span></span></h2>
                                <p style="font-size:13px;">If you fill out the request for help, we'll give you a job guidance as soon as possible.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-5">
                        <div class="post-entry-1 h-100 person-1">
                            <!--설명-->
                            <div class="post-entry-1-contents mt-0 pt-5">
                                <span class="meta">Register Resume</span>
                                <h2><a href="./mypage-cv.php">이력서등록</a><span class="wrap-icon"><span class="icon-person ml-2"></span></span></h2>
                                <p style="font-size:13px;">Please fill out your resume and register for the job openings.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-5">
                        <div class="post-entry-1 h-100 person-1">
                            <!--설명-->
                            <div class="post-entry-1-contents mt-0 pt-5">
                                <span class="meta">certificate issue</span>
                                <h2><a href="./customerSupport.php#certificate">증명서발급</a><span class="wrap-icon"><span class="icon-message ml-2"></span></span></h2>
                                <p style="font-size:13px;">If you apply for a certificate issue, we will send you the certificate via email.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <!-- <h2 class="h4 mb-4 mt-4" style="color:#1d2a30;">Business Acouaintance</h2> -->
            <div class="mt-3">
                <span class="meta" style="color:#a1a2a3;">Business Acouaintance</span>
                <h4>주요거래처</h4>
            </div>
            <div class="slider multiple-items col-md-6">
                <img class="imgSlider" src="./static/img/1.png" alt="img">
                <img class="imgSlider" src="./static/img/2.png" alt="img">
                <img class="imgSlider" src="./static/img/3.png" alt="img">
                <img class="imgSlider" src="./static/img/4.png" alt="img">
                <img class="imgSlider" src="./static/img/5.png" alt="img">
                <img class="imgSlider" src="./static/img/6.png" alt="img">
                <img class="imgSlider" src="./static/img/7.png" alt="img">
                <img class="imgSlider" src="./static/img/8.png" alt="img">
            </div>
        </div>
        <div class="site-section section-3" data-stellar-background-ratio="0.5" style="background-image: url('static/img/hero_2.jpg');">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-7 text-center mb-5">
                        <h2 class="text-white">Get ready to start your exciting journey. Our Company</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="site-section counter-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="d-flex align-items-center counter">
                            <span class="icon-building-o wrap-icon mr-3"></span>
                            <div class="text">
                            <span class="companyCountCon d-block number"></span>
                                <span class="caption">Number of companys </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="d-flex align-items-center counter">
                            <span class="icon-people wrap-icon mr-3"></span>
                            <div class="text">
                                <span class="memberCountCon d-block number"></span>
                                <span class="caption">Number of members</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="d-flex align-items-center counter">
                            <span class="icon-building wrap-icon mr-3"></span>
                            <div class="text">
                                <span class="jobCountCon d-block number"></span>
                                <span class="caption">Number of job openings</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    $sql1=mq("select * from jobinfo");
    $row_num_job= mysqli_num_rows($sql1);

    $sql2=mq("select * from member");
    $row_num_mem= mysqli_num_rows($sql2);

    $sql3=mq("select * from company");
    $row_num_company= mysqli_num_rows($sql3);
?>
<script>
    $('.multiple-items').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 2
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    var sample=setInterval(test,5);
    var count=0;
    function test(){
        if(count<(<?php echo $row_num_mem;?>*100)){count++;}
        $(".memberCountCon").text(count+"명");
    }
});
$(document).ready(function(){
    var sample=setInterval(test,5);
    var count=0;
    function test(){
        if(count<(<?php echo $row_num_company;?>*100)){count++;}
        $(".companyCountCon").text(count+"사");
    }
});
$(document).ready(function(){
    var sample=setInterval(test,5);
    var count=0;
    function test(){
        if(count< (<?php echo $row_num_job;?>*100)){count++;}
        $(".jobCountCon").text(count+"건");
    }
});
</script>
<?php
    include_once('footer.php');
?>