<?php
    include_once('header.php');
    include_once('./db/jhDbcon.php');
?>
<style>
    #bo_ser > ul >li{
        display:inline-block;
        zoom:1;
        display:inline;
        padding:3px;
    }
    .registerform{
        display:inline-block; 
        vertical-align:middle; 
        height:60px;
    }
</style>
       <div class="ftco-blocks-cover-1">
            <!--상단 이미지 : 상단 메뉴 및 여자 배경화면-->
            <div class="site-section-cover overlay " data-stellar-background-ratio="0.5 " style="background-image:url('static/img/hero_1.jpg') ">
                <div class="container ">
                    <!--상단 텍스트 :  메뉴이름, 설명-->
                    <div class="row align-items-center justify-content-center text-center ">
                        <div class="col-md-8 mt-5 pt-5 ">
                            <h1 class="mb-3 ">게시판</h1>
                            <p>사람의 가치를 가꾸어주고 일과 정보를 제공해주는 비너스 컨설팅</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-section bg-light text-center">
            <div id='board'>
                <div class="row justify-content-center mt-1 mb-4">
                    <div id="news" class="col-md-8 mt-1 text-center heading-section ftco-animate fadeInUp ftco-animated">
                        <span class="subtitle">job request</span>
                        <h2>구인의뢰</h2>
                    </div>
                </div>             
                <div class="row">
                <div class="col-md-5 mb-5 ml-auto mr-auto">
                    <form action="./db/jobRequest/jobRequestWriteOk.php" method="post">
                        <div class="form-group row">
                            <div class="col-md-3 mb-4 mb-lg-0">
                                <p class="form-control" style="pointer-events: none;">이름</p>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="name" class="form-control" placeholder="Write your Name." required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 mb-4 mb-lg-0">
                                <p class="form-control" style="pointer-events: none;">이메일</p>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="mail" class="form-control" placeholder="Write your Email." required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 mb-4 mb-lg-0">
                                <p class="form-control" style="pointer-events: none;">전화번호</p>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="tel" class="form-control" placeholder="Write your Tel." required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2 mb-4 mb-lg-0">
                                <p class="form-control" style="pointer-events: none;">회사명</p>
                            </div>
                            <div class="col-md-4 p-0">
                                <input type="text" name="companyName" class="form-control" placeholder="Write your Company Name." required>
                            </div>
                            <div class="col-md-2 mb-4 mb-lg-0">
                                <p class="form-control" style="pointer-events: none;">직급</p>
                            </div>
                            <div class="col-md-4 p-0 pr-3">
                                <input type="text" name="position" class="form-control" placeholder="Write your Position." required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2 mb-4 mb-lg-0">
                                <p class="form-control" style="pointer-events: none;">제목</p>
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="title" class="form-control" placeholder="Write your Title." required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2 mb-4 mb-lg-0">
                                <p class="form-control" style="pointer-events: none;">내용</p>
                            </div>
                            <div class="col-md-10">
                                <textarea type="text" name="content" id="bcontents" class="form-control" rows="20" placeholder="Write your Content." required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 ml-auto mr-auto">
                                <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Register">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
            </div>
</div>
<?php
    include_once('footer.php');
?>