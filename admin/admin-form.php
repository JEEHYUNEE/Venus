<?php
include_once 'nav.php';
?>

<div id="content-wrapper" class="d-flex flex-column">
  <!-- Main Content -->
  <div id="content">
    <div class="container-fluid">
      <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">관리자정보등록</h1>
      <p class="mb-4">관리자의 정보를 등록할 수 있는 페이지입니다. </p>
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">관리자 등록 Form</h6>
        </div>
        <div class="card-body">
          <form class="user">
            <div class="form-group row">
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="form-field-title"> 사번 </div>
              </div>
              <div class="col-sm-3 mb-3 mb-sm-0">
                <input id="id-admin-adminId" type="text" class="form-field-title-white" id="exampleFirstName" placeholder="사번">
              </div>
              <div class="col-sm-1 mb-3 mb-sm-0">
                <div id="id-admin-integrityCheck" class="form-field-title register-btn">중복확인</div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="form-field-title"> 비밀번호 </div>
              </div>
              <div class="col-sm-4 mb-3 mb-sm-0">
                <input id="id-admin-password" type="password" class="form-field-title-white" id="exampleFirstName" placeholder="비밀번호">
              </div>
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="form-field-title"> 비밀번호 확인 </div>
              </div>
              <div class="col-sm-4 mb-3 mb-sm-0">
                <input id="id-admin-password-re" type="password" class="form-field-title-white" id="exampleFirstName" placeholder="비밀번호">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="form-field-title"> 이름 </div>
              </div>
              <div class="col-sm-4 mb-3 mb-sm-0">
                <input id="id-admin-name" type="text" class="form-field-title-white" id="exampleFirstName" placeholder="이름">
              </div>
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="form-field-title"> 영문이름 </div>
              </div>
              <div class="col-sm-4 mb-3 mb-sm-0">
                <input id="id-admin-nameEng" type="text" class="form-field-title-white" id="exampleFirstName" placeholder="영문이름">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="form-field-title"> 주민등록번호</div>
              </div>
              <div class="col-sm-3 mb-3 mb-sm-0">
                <input id="id-admin-rrnFront" type="text" class="form-field-title-white" id="exampleFirstName" placeholder="주민등록번호(앞)">
              </div>
              <span>
                -
              </span>
              <div class="col-sm-3 mb-3 mb-sm-0">
                <input id="id-admin-rrnBack" type="text" class="form-field-title-white" id="exampleFirstName" placeholder="주민등록번호(뒤)">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="form-field-title"> 입사년월 </div>
              </div>
              <div class="col-sm-3 mb-3 mb-sm-0">
                <input id="id-admin-enteredDate" type="date" class="form-field-title-white">
              </div>
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="form-field-title"> 생년월일 </div>
              </div>
              <div class="col-sm-3 mb-3 mb-sm-0">
                <input id="id-admin-birthDate" type="date" class="form-field-title-white">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-1 mb-3 mb-sm-0">
                <div class="form-field-title"> 부서 </div>
              </div>
              <div class="col-sm-2 mb-3 mb-sm-0">
                <select id="id-admin-buseo" class="form-field-title-white"> 
                  <option></option>
                  <option>경영</option>   
                  <option>인사</option>   
                  <option>급여</option>   
                  <option>회계</option>   
                </select>
              </div>
              <div class="col-sm-1 mb-3 mb-sm-0">
                <div class="form-field-title"> 직위 </div>
              </div>
              <div class="col-sm-2 mb-3 mb-sm-0">
                <select id="id-admin-zikwi" class="form-field-title-white">
                  <option></option> 
                  <option>사장</option>   
                  <option>임원</option>   
                  <option>이사</option>   
                  <option>부장</option>   
                  <option>차장</option>   
                  <option>과장</option>   
                  <option>계장</option>   
                  <option>주임</option>   
                  <option>대리</option>   
                  <option>사원</option>   
                </select>
              </div>
              <div class="col-sm-1 mb-3 mb-sm-0">
                <div class="form-field-title"> 직책 </div>
              </div>
              <div class="col-sm-2 mb-3 mb-sm-0">
                <select id="id-admin-zikcheck" class="form-field-title-white"> 
                  <option></option>
                  <option>1급</option>   
                  <option>2급</option>   
                  <option>3급</option>
                  <option>4급</option>   
                  <option>5급</option>   
                  <option>6급</option>   
                  <option>7급</option>   
                  <option>8급</option>   
                  <option>9급</option>      
                </select>
              </div>
              <div class="col-sm-1 mb-3 mb-sm-0">
                <div  class="form-field-title"> 직급 </div>
              </div>
              <div class="col-sm-2 mb-3 mb-sm-0">
                <select id="id-admin-zikgeop" class="form-field-title-white"> 
                  <option></option>
                  <option>팀장</option>   
                  <option>경영팀장</option>   
                  <option>인사팀장</option>   
                  <option>급여팀장</option>   
                  <option>회계팀장</option>   
                  <option>사원</option>   
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="form-field-title"> 연락처 </div>
              </div>
              <div class="col-sm-4 mb-3 mb-sm-0">
                <input id="id-admin-phone" type="text" class="form-field-title-white" id="exampleFirstName" placeholder="연락처">
              </div>
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div  class="form-field-title"> 긴급연락처 </div>
              </div>
              <div class="col-sm-4 mb-3 mb-sm-0">
                <input id="id-admin-emergencyContact" type="text" class="form-field-title-white" id="exampleFirstName" placeholder="긴급연락처">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="form-field-title">이메일</div>
              </div>
              <div class="col-sm-4 mb-3 mb-sm-0">
                <input id="id-admin-email" type="text" class="form-field-title-white" id="exampleFirstName" placeholder="이메일">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="form-field-title"> 주소 </div>
              </div>
              <div class="col-sm-3 mb-3 mb-sm-0">
                <input id="id-admin-addressZipcode" type="text" class="form-field-title-white" id="exampleFirstName" placeholder="우편번호" disabled>
              </div>
              <div class="col-sm-1 mb-3 mb-sm-0">
                <div id="id-admin-zipcode-btn" class="form-field-title register-btn">우편번호</div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2 mb-3 mb-sm-0">
              </div>
              <div class="col-sm-4 mb-3 mb-sm-0">
                <input disabled id="id-admin-address" type="text" class="form-field-title-white" id="exampleFirstName" placeholder="주소">
              </div>
              <div class="col-sm-4 mb-3 mb-sm-0">
                <input id="id-admin-addressDetail" type="text" class="form-field-title-white" id="exampleFirstName" placeholder="상세주소">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="form-field-title"> 프로필이미지 </div>
              </div>
              <div class="col-sm-3 mb-3 mb-sm-0">
                <input id="id-admin-profileImg" type="file" class="form-field-title-white" name="fileToUpload" >
              </div>
            </div>
            <div class="form-group row">
              <div id="id-admin-register" class="form-field-title register-btn"> Register</div>
            </div>
            <hr>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="static/js/admin/send-admin-data.js"></script>
<script type="text/JavaScript" src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>