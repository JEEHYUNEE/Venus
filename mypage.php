<?php
    include_once('header.php');
    include_once 'db/bank/getBank.php';
    include_once 'db/jikjong/getJikjong.php';
    include_once 'db/region/getRegion.php';
    include_once 'db/member/getMember.php';
    include_once 'db/regularmember/getRegularmember.php';
    $member = getMemberById($loginId);
?>
<style>
    .form-control-title {
        font-weight: 400;
        color: #dc3545;
        border-color: #dc3545;
        text-align: center;
    }

    .form-control-title:hover {
        border-color: #dc3545 !important;
    }
</style>
<div class="ftco-blocks-cover-1 ">
    <!--상단 이미지 : 상단 메뉴 및 여자 배경화면-->
    <div class="site-section-cover overlay " data-stellar-background-ratio="0.5 "
        style="background-image: url('static/img/hero_1.jpg') ">
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
        <div class="row">
            <div class="col-md-8 mb-5 ml-auto mr-auto">
                <form action="#" method="post">
                    <div class="form-group row">
                        <div class="col-md-3 mb-4 mb-lg-0">
                            <div class="form-control form-control-title">ID</div>
                        </div>
                        <div class="col-md-6">
                            <input id='id-memberId' disabled type="text" class="form-control" value="<?php echo $member['memberId'] ?>">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-md-3 mb-4 mb-lg-0">
                            <div class="form-control form-control-title">NAME</div>
                        </div>
                        <div class="col-md-9">
                            <input disabled type="text" class="form-control" value="<?php echo $member['name'] ?>">
                        </div>
                    </div>
                    <div id='id-input-password' class="form-group row" >
                        <div class="col-md-3 mb-4 mb-lg-0">
                            <div class="form-control form-control-title">PASSWORD</div>
                        </div>
                        <div class="col-md-7">
                            <input id='id-password' type="password" class="form-control" disabled="disabled" value="" >
                        </div>
                        <div class="col-md-2">
                            <input type='button' class='btn btn-block btn-primary text-white pl-1 py-1 px-0'
                                value="변경" id='id-change-password' >
                        </div>
                        
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 mb-4 mb-lg-0">
                            <div class="form-control form-control-title">EMAIL</div>
                        </div>
                        <div class="col-md-9">
                            <input id='id-email' type="email" class="form-control" value="<?php echo $member['email'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 mb-4 mb-lg-0">
                            <div class="form-control form-control-title">BIRTH</div>
                        </div>
                        <div class="col-md-4">
                            <input id='id-birthDate' type="date" class="form-control" value="<?php echo $member['birthDate'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 mb-4 mb-lg-0">
                            <div class="form-control form-control-title">PHONE</div>
                        </div>
                        <div class="col-md-6">
                            <input id='id-phone' type="text" class="form-control" value="<?php echo $member['phone'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 mb-4 mb-lg-0">
                            <div class="form-control form-control-title">ADDRESS</div>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id='id-addressZipcode'
                            value="<?php echo explode("/",$member['address'])[0]?>">
                        </div>
                        <div class="col-md-2">
                            <input type='button' class='btn btn-block btn-primary text-white pl-1 py-1 px-0'
                                value="우편번호" id='id-zipcode-btn' >
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 mb-4 mb-lg-0">
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id='id-address'  value="<?php echo explode("/",$member['address'])[1]?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 mb-4 mb-lg-0">
                        </div>
                        <div class="col-md-9">
                            <input id='id-addressDetail' type="text" class="form-control" value="<?php echo explode("/",$member['address'])[2]?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 mb-4 mb-lg-0">
                            <div class="form-control form-control-title">HOPE AREA</div>
                        </div>
                        <div class="col-md-3">
                            <select id='id-hopeArea' class="form-control">
                                <option></option>
                                <?php for($i=0;$i<sizeof($region=getRegion()) ; $i++){?>
                                    <option <?php if($region[$i]['regionName']==$member['hopeArea']) echo "selected" ?> ><?php echo $region[$i]['regionName']?></option>
                                <?php
                                }?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <div class="form-control form-control-title">HOPE FIELD</div>
                        </div>
                        <div class="col-md-3">
                            <select id='id-hopeField' class="form-control">
                            <option></option>
                                <?php for($i=0;$i<sizeof($jikjong=getJikjong()) ; $i++){
                                    $selected=null;
                                    if($jikjong[$i]['jikjongId']==$member['hopeField']) 
                                        $selected="selected";?>
                                    <option id='jikjongId-<?php echo $jikjong[$i]['jikjongId']?>'<?php echo $selected ?> ><?php echo $jikjong[$i]['jikjongName']?></option>
                                <?php
                                }?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 mb-4 mb-lg-0">
                            <div class="form-control form-control-title">PROFILE</div>
                        </div>
                        <div class="col-md-3">
                            <input id="id-profile" type="file" class="form-control" style="border:none;">
                        </div>
                    </div>
                

                    <!-- 정규회원.. -->
                    <?php if(sizeof(isRegularMember($loginId))!=0){
                        $rm = getRegularMemberByMember($loginId)[0];
                        ?>
                    <hr style="border: solid 0.01rem #FBCEB1;"> 
                    <div class="form-group row">
                        <div class="col-md-3 mb-4 mb-lg-0">
                            <div class="form-control form-control-title">정규회원코드</div>
                        </div>
                        <div class="col-md-3">
                            <input disabled type="text" class="form-control"value="<?php echo $rm['rmId'] ?>">
                        </div>
                        <div class="col-md-3 mb-4 mb-lg-0">
                            <div class="form-control form-control-title" >고용형태</div>
                        </div>
                        <div class="col-md-3">
                            <input disabled type="text" class="form-control" value="<?php echo $rm['typeName'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 mb-4 mb-lg-0">
                            <div class="form-control form-control-title">회사이름</div>
                        </div>
                        <div class="col-md-3">
                            <input disabled type="text" class="form-control" value="<?php echo $rm['companyName'] ?>">
                        </div>
                        <div class="col-md-3 mb-4 mb-lg-0">
                            <div class="form-control form-control-title">부서명</div>
                        </div>
                        <div class="col-md-3">
                            <input disabled type="text" class="form-control" value="<?php echo $rm['buseoName'] ?>">
                        </div>
                    </div>    
                    <div class="form-group row">
                        <div class="col-md-3 mb-4 mb-lg-0">
                            <div class="form-control form-control-title"  >근무처</div>
                        </div>
                        <div class="col-md-3">
                            <input disabled type="text" class="form-control" value="<?php echo $rm['workPosition'] ?>">
                        </div>
                        <div class="col-md-3 mb-4 mb-lg-0">
                            <div class="form-control form-control-title">근무지</div>
                        </div>
                        <div class="col-md-3">
                            <input disabled type="text" class="form-control" value="<?php echo $rm['workPlace'] ?>">
                        </div>
                    </div>  
                    <div class="form-group row">
                        <div class="col-md-3 mb-4 mb-lg-0">
                            <div  class="form-control form-control-title">계좌번호</div>
                        </div>
                        <div class="col-md-2">
                            <input disabled type="text" class="form-control" placeholder="예금주" value="<?php echo $rm['accountHolder'] ?>">
                        </div>
                        <div class="col-md-3 mb-4 mb-lg-0">
                            <input disabled type="text" class="form-control" placeholder="은행명" value="<?php echo $rm['bankName'] ?>">
                        </div>
                        <div class="col-md-4">
                            <input disabled type="text" class="form-control"placeholder="계좌번호" value="<?php echo $rm['account'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 mb-4 mb-lg-0"></div>
                        <div class="col-md-9 mb-4 mb-lg-0"><a href="mypage-salary.php">계좌 정보를 입력/수정 하려면 여기를 클릭하세요.</a></div>
                    </div>  
                    <?php } ?>
                    <div class="form-group row">
                        <div class="col-md-3 ml-auto mr-auto">
                            <input id="id-edit" class="btn btn-block btn-primary text-white py-3 px-5" value="EDIT">
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<script type="text/JavaScript" src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>

<script src="static/js/member/edit.js?"></script>

    <?php
    include_once('footer.php');
?>
