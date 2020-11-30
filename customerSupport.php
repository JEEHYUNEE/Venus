<?php
include_once('header.php');
?>
    <div class="ftco-blocks-cover-1">
        <!--상단 이미지 : 상단 메뉴 및 여자 배경화면-->
        <div class="site-section-cover overlay " data-stellar-background-ratio="0.5 " style="background-image: url('static/img/hero_1.jpg') ">
            <div class="container ">
                <!--상단 텍스트 :  메뉴이름, 설명-->
                <div class="row align-items-center justify-content-center text-center ">
                    <div class="col-md-8 mt-5 pt-5 ">
                        <h1 class="mb-3 ">Customer Support</h1>
                        <p>사람의 가치를 가꾸어주고 일과 정보를 제공해주는 비너스 컨설팅</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section bg-light" id="contact-section">
        <div id="consult" class="container mb-4">
            <div class="row justify-content-center mt-2 mb-5">
                <div id="dispatchArea" class="col-md-8 mt-5 text-center heading-section ftco-animate fadeInUp ftco-animated">
                    <span class="subtitle">Consultation/Inconvenience report</span>
                    <h2 class="mb-4">상담/불편신고</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 mb-5 ml-auto mr-auto">
                    <form action="./db/customerSupport/consult.php" method="post">
                        <div class="form-group row">
                            <div class="col-md-6 mb-4 mb-lg-0">
                                <input type="text" name="name" class="form-control" placeholder="Write your Name." required>
                            </div>
                            <div class="col-md-6">
                                <select class="form-control" name="type" required>
                                <option value="" selected disabled hidden>Select what you want</option>
                                  <option value="sangdam">상담</option>
                                  <option value="shingo">불편신고</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="text" name="email" class="form-control" placeholder="Write your Email." required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <textarea name="content" class="form-control" placeholder="Write your message." cols="30" rows="10" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 ml-auto mr-auto">
                                <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Send Consult">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr class="w-50 mt-5 mb-5" style="color:#364d59" />
        <div id="certificate" class="container mt-4 mb-4">
            <div class="row justify-content-center mt-5 mb-5">
                <div id="dispatchArea" class="col-md-8 mt-5 text-center heading-section ftco-animate fadeInUp ftco-animated">
                    <span class="subtitle">Application for issuance of certificate</span>
                    <h2 class="mb-4">증명서발급신청</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 mb-5 ml-auto mr-auto">
                    <form action="./db/customerSupport/certificate.php" method="post">
                        <div class="form-group row">
                            <div class="col-md-6 mb-4 mb-lg-0">
                                <input type="text" name="id" class="form-control" value="<?php echo $loginId;?>" hidden>
                                <select class="form-control" name="type" required>
                                <option value="" selected disabled hidden>Select that Type </option>
                                  <option value="certificate_t1">재직증명서</option>
                                  <option value="certificate_t2">경력증명서</option>
                                  <option value="certificate_t3">퇴직증명서</option>
                                  <option value="certificate_t4">근로소득원천징수영수증</option>
                                  <option value="certificate_t5">소득자별근로소득원천징수부</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select class="form-control" name="purpose" required>
                                <option value="" selected disabled hidden>Select that Purpose</option>
                                  <option value="certificate_p1">금융권제출</option>
                                  <option value="certificate_p2">관공서제출</option>
                                  <option value="certificate_p3">학교제출</option>
                                  <option value="certificate_p4">경력증명(회사제출)</option>
                                  <option value="certificate_p5">기타</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="text" name="email" class="form-control" placeholder="Write your Email." required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <textarea name="content" class="form-control" placeholder="Write your message." cols="30" rows="10" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 ml-auto mr-auto">
                            <?php if(isset($loginId)){?>
                                <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Send Consult">
                            <?php } else {?>
                                <p class='text-center'>증명서발급신청은 로그인 후 이용가능합니다.</p>
                                <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Send Consult" disabled>
                            <?php }?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr class="w-50 mt-5 mb-5" style="color:#364d59" />
        <!--담당자연락처-->
        <section class="ftco-section testimony-section mt-4">
            <div class="container-fluid px-md-5 mt-3">
                <!--담당자연락처 제목-->
                <div class="row justify-content-center mt-5 mb-5">
                    <div id="contactUs" class="col-md-8 mt-5 text-center heading-section ftco-animate fadeInUp ftco-animated">
                        <span class="subtitle">the natural place in charge</span>
                        <h2 class="mb-4">담당자연락처</h2>
                    </div>
                </div>
                <!--담당자연락처 표-->
                <div class="row ftco-animate justify-content-center fadeInUp ftco-animated">
                    <div class="col-md-8">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>부서명</th>
                                                <th>담당업무</th>
                                                <th>연락처</th>
                                                <th>이메일</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>마케팅본부</td>
                                                <td>헤드헌팅, 채용대행</td>
                                                <td rowspan="5">02-539-1144</td>
                                                <td rowspan="4">venusjob@venusjob.com</td>
                                            </tr>
                                            <tr>
                                                <td>마케팅사업1팀</td>
                                                <td>대기업사무, IT사무, 금융사무</td>
                                            </tr>
                                            <tr>
                                                <td>마케팅사업2팀</td>
                                                <td>카드사업, 전문콜센터</td>
                                            </tr>
                                            <tr>
                                                <td>마케팅사업3팀</td>
                                                <td>도급, 위탁</td>
                                            </tr>
                                            <tr>
                                                <td>경영지원팀</td>
                                                <td>경리회계, 전산지원, 총무관리</td>
                                                <td>venusjob03@venusjob.com</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php
include_once('footer.php');
?>