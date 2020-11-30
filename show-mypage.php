<?php
    include_once('header.php');
    include_once 'db/member/getMember.php';
    $member = getMemberById($loginId);
?>
        <div class="ftco-blocks-cover-1 ">
            <!--상단 이미지 : 상단 메뉴 및 여자 배경화면-->
            <div class="site-section-cover overlay " data-stellar-background-ratio="0.5 " style="background-image: url('static/img/hero_1.jpg') ">
                <div class="container ">
                    <!--상단 텍스트 :  메뉴이름, 설명-->
                    <div class="row align-items-center justify-content-center text-center ">
                        <div class="col-md-8 mt-5 pt-5 ">
                            <h1 class="mb-3 ">My Page</h1>
                            <p>역사와 비전을 지향하는 비너스 컨설팅은 여러분의 미래를 위해서 정보화된 기술력으로</br> 양질의 정보만을 제공할 것 을 약속드립니다.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--내용입력 :  하얀부분-->
        <div class="site-section ">
            <div class="container ">
                <!--메뉴 제목 입력-->
                <div class="row justify-content-center text-center ">
                    <div class="col-md-7 mb-5 ">
                        <h5 class="subtitle ">MyPage</h5>
                        <h2>마이페이지</h2>
                    </div>
                </div>
                <div class="row justify-content-center text-center">
                <div class="col-md-6 col-lg-5 mb-4 mb-lg-4  ">
                    <div class="feature-1 " style="height:400px; border-radius:2rem;" >
                    <img src="<?php echo $member['profileImg']?>" style=" height:100%;">
                    </div>
                    
                        <h3><?php echo $member['name'] ?></h3>
                        <p><a href="#">내 정보</a></p>
                </div>
                </div>
                <div class="row ml-auto mr-auto">
                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-4 ml-auto mr-auto">
                        <div class="feature-1 " style="height:225px; text-align:center;">
                        <div class="mt-4">
                            <span class="wrap-icon ">
                            <span class="icon-pencil"></span>
                            </span>
                            <h3  style="font-size:25px;">내가 쓴글</h3>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-3 ml-auto mr-auto">
                        <div class="feature-1 " style="height:225px;text-align:center; ">
                        <div class="mt-4">
                            <span class="wrap-icon ">
                            <span class="icon-person "></span>
                            </span>
                            <h3 style="font-size:25px;">이력서등록</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-3 ml-auto mr-auto">
                        <div class="feature-1 " style="height:225px;text-align:center;">
                        <div class="mt-4">
                            <span class="wrap-icon ">
                            <span class="icon-money "></span>
                            </span>
                            <h3 style="font-size:25px;">급여확인</h3>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
<?php
    include_once('footer.php');
?>