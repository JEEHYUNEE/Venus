<?php
include_once 'nav.php';
include_once 'db/member/getMember.php';
$result = getMemberById($_GET['id']);
?>

<div id="content-wrapper" class="d-flex flex-column">
  <!-- Main Content -->
  <div id="content">
    <div class="container-fluid">
      <!-- Page Heading -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">회원수정FORM</h6>
        </div>
        <div class="card-body">
          <form class="user">
            <div class="form-group row">
                <img src=<?php if($result[0]['profileImg']==null) echo "/venus/uploads/default.png";
                  else
                  echo $result[0]['profileImg']."?".rand() ?> style="width:150px; margin:0 auto;">
            </div>
            <div class="form-group row">
              <div class="col-sm-3 mb-3 mb-sm-0">
                <div class="form-field-title"> 아이디 </div>
              </div>
              <div class="col-sm-3 mb-3 mb-sm-0">
                <input disabled id="id-member-memberId" type="text" class="form-field-title-white" id="exampleFirstName"
                  placeholder="아이디" value=<?php echo $result[0]['memberId']?>>
              </div>
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="form-field-title"> 이름 </div>
              </div>
              <div class="col-sm-4 mb-3 mb-sm-0">
                <input id="id-member-name" type="text" class="form-field-title-white" id="exampleFirstName"
                  placeholder="이름" value=<?php echo $result[0]['name']?>>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-3 mb-3 mb-sm-0">
                <div class="form-field-title"> 비밀번호 </div>
              </div>
              <div class="col-sm-4 mb-3 mb-sm-0">
                <input id="id-member-password" type="password" class="form-field-title-white" id="exampleFirstName"
                  placeholder="비밀번호" >
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-3 mb-3 mb-sm-0">
                <div class="form-field-title"> 생년월일 </div>
              </div>
              <div class="col-sm-4 mb-3 mb-sm-0">
                <input id="id-member-birthDate" type="date" class="form-field-title-white"
                  value=<?php echo $result[0]['birthDate']?>>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-3 mb-3 mb-sm-0">
                <div class="form-field-title"> 연락처 </div>
              </div>
              <div class="col-sm-4 mb-3 mb-sm-0">
                <input id="id-member-phone" type="text" class="form-field-title-white" id="exampleFirstName"
                  placeholder="연락처" value=<?php echo $result[0]['phone']?>>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-3 mb-3 mb-sm-0">
                <div class="form-field-title">이메일</div>
              </div>
              <div class="col-sm-4 mb-3 mb-sm-0">
                <input id="id-member-email" type="text" class="form-field-title-white" id="exampleFirstName"
                  placeholder="이메일" value=<?php echo $result[0]['email']?>>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-3 mb-3 mb-sm-0">
                <div class="form-field-title"> 주소 </div>
              </div>
              <div class="col-sm-3 mb-3 mb-sm-0">
                <input id="id-member-addressZipcode" type="text" class="form-field-title-white" id="exampleFirstName"
                  placeholder="우편번호" disabled value="<?php echo explode('/',$result[0]['address'])[0]?>">
              </div>
              <div class="col-sm-3 mb-3 mb-sm-0">
                <div id="id-member-zipcode-btn" class="form-field-title register-btn">우편번호</div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-3 mb-3 mb-sm-0">
              </div>
              <div class="col-sm-4 mb-3 mb-sm-0">
                <input id="id-member-address" type="text" class="form-field-title-white" id="exampleFirstName"
                  placeholder="주소" value="<?php echo explode('/',$result[0]['address'])[1]?>">
              </div>
              <div class="col-sm-4 mb-3 mb-sm-0">
                <input id="id-member-addressDetail" type="text" class="form-field-title-white" id="exampleFirstName"
                  placeholder="상세주소" value="<?php echo explode("/",$result[0]['address'])[2]?>">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-3 mb-3 mb-sm-0">
                <div class="form-field-title"> 프로필 </div>
              </div>
              <div class="col-sm-3 mb-3 mb-sm-0">
                <input id="id-member-profileImg" type="file" class="form-field-title-white" name="fileToUpload">
              </div>
            </div>
            <div class="form-group row" >
              <div class="col-sm-3 mb-3 mb-sm-0">
                <div id="id-member-edit" class="form-field-title register-btn"> EDIT</div>
              </div>
              <div class="col-sm-3 mb-3 mb-sm-0">
                <div id="id-member-delete" class="form-field-title register-btn"> DELETE</div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="static/js/member/member-edit.js"></script>
<script type="text/JavaScript" src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>