<?php
include_once 'nav.php';
include_once 'db/admin/getAdmin.php';
$admin = getAdminById($_GET['id'])[0];
?>

<div id="content-wrapper" class="d-flex flex-column">
  <!-- Main Content -->
  <div id="content">
    <div class="container-fluid">
      <!-- Page Heading -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">관리자수정FORM</h6>
        </div>
        <div class="card-body">
          <form class="user">
          <div class="form-group row">
                <img src=<?php if($admin['profileImg']==null) echo "/venus/uploads/default.png";
                  else
                  echo $admin['profileImg']."?".rand() ?> style="width:150px; margin:0 auto;">
            </div>
            <div class="form-group row">
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="form-field-title"> 사번 </div>
              </div>
              <div class="col-sm-3 mb-3 mb-sm-0">
                <input disabled id="id-admin-adminId" type="text" class="form-field-title-white" id="exampleFirstName" value=<?php echo $admin['adminId']?> required>
              </div>
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="form-field-title"> 비밀번호 </div>
              </div>
              <div class="col-sm-4 mb-3 mb-sm-0">
                <input id="id-admin-password" type="password" class="form-field-title-white" id="exampleFirstName" placeholder="변경을 원할 시 입력해주세요">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="form-field-title"> 이름 </div>
              </div>
              <div class="col-sm-4 mb-3 mb-sm-0">
                <input id="id-admin-name" type="text" class="form-field-title-white" id="exampleFirstName" placeholder="이름"
                value=<?php echo $admin['name']?>>
              </div>
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="form-field-title"> 영문이름 </div>
              </div>
              <div class="col-sm-4 mb-3 mb-sm-0">
                <input id="id-admin-nameEng" type="text" class="form-field-title-white" id="exampleFirstName" placeholder="영문이름"
                value=<?php echo $admin['nameEng']?>>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="form-field-title"> 주민번호</div>
              </div>
              <div class="col-sm-3 mb-3 mb-sm-0">
                <input id="id-admin-rrnFront" type="text" class="form-field-title-white" id="exampleFirstName" placeholder="주민등록번호(앞)" value=<?php echo explode("-",$admin['rrn'])[0]?>>
              </div>
              <span>
                -
              </span>
              <div class="col-sm-3 mb-3 mb-sm-0">
                <input id="id-admin-rrnBack" type="text" class="form-field-title-white" id="exampleFirstName" placeholder="주민등록번호(뒤)"
                value=<?php echo explode("-",$admin['rrn'])[1]?>>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="form-field-title"> 입사년월 </div>
              </div>
              <div class="col-sm-3 mb-3 mb-sm-0">
                <input id="id-admin-enteredDate" type="date" class="form-field-title-white" value=<?php echo $admin['enteredDate']?>> 
              </div>
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="form-field-title"> 생년월일 </div>
              </div>
              <div class="col-sm-3 mb-3 mb-sm-0">
                <input id="id-admin-birthDate" type="date" class="form-field-title-white" value=<?php echo $admin['birthDate']?>> 
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="form-field-title"> 부서 </div>
              </div>
              <div class="col-sm-4 mb-3 mb-sm-0">
                <select id="id-admin-buseo" class="form-field-title-white"> 
                  <option <?php if($admin['buseo']==null) echo "selected" ?>></option>
                  <option <?php if($admin['buseo']=="경영") echo "selected" ?>>경영</option>   
                  <option <?php if($admin['buseo']=="인사") echo "selected" ?>>인사</option>   
                  <option <?php if($admin['buseo']=="급여") echo "selected" ?>>급여</option>   
                  <option <?php if($admin['buseo']=="회계") echo "selected" ?>>회계</option>   
                </select>
              </div>
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="form-field-title"> 직위 </div>
              </div>
              <div class="col-sm-4 mb-3 mb-sm-0">
                <select id="id-admin-zikwi" class="form-field-title-white">
                  <option <?php if($admin['zikwi']==null) echo "selected" ?>></option> 
                  <option <?php if($admin['zikwi']=="사장") echo "selected" ?>>사장</option>   
                  <option <?php if($admin['zikwi']=="임원") echo "selected" ?>>임원</option>   
                  <option <?php if($admin['zikwi']=="이사") echo "selected" ?>>이사</option>   
                  <option <?php if($admin['zikwi']=="부장") echo "selected" ?>>부장</option>   
                  <option <?php if($admin['zikwi']=="차장") echo "selected" ?>>차장</option>   
                  <option <?php if($admin['zikwi']=="과장") echo "selected" ?>>과장</option>   
                  <option <?php if($admin['zikwi']=="계장") echo "selected" ?>>계장</option>   
                  <option <?php if($admin['zikwi']=="주임") echo "selected" ?>>주임</option>   
                  <option <?php if($admin['zikwi']=="대리") echo "selected" ?>>대리</option>   
                  <option <?php if($admin['zikwi']=="사원") echo "selected" ?>>사원</option>   
                </select>
              </div>
            </div>
            <div class="form-group row">
            <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="form-field-title"> 직책 </div>
              </div>
              <div class="col-sm-4 mb-3 mb-sm-0">
                <select id="id-admin-zikcheck" class="form-field-title-white"> 
                  <option <?php if($admin['zikcheck']==null) echo "selected" ?>></option>
                  <option <?php if($admin['zikcheck']=="1급") echo "selected" ?>>1급</option>   
                  <option <?php if($admin['zikcheck']=="2급") echo "selected" ?>>2급</option>   
                  <option <?php if($admin['zikcheck']=="3급") echo "selected" ?>>3급</option>
                  <option <?php if($admin['zikcheck']=="4급") echo "selected" ?>>4급</option>   
                  <option <?php if($admin['zikcheck']=="5급") echo "selected" ?>>5급</option>   
                  <option <?php if($admin['zikcheck']=="6급") echo "selected" ?>>6급</option>   
                  <option <?php if($admin['zikcheck']=="7급") echo "selected" ?>>7급</option>   
                  <option <?php if($admin['zikcheck']=="8급") echo "selected" ?>>8급</option>   
                  <option <?php if($admin['zikcheck']=="9급") echo "selected" ?>>9급</option>      
                </select>
              </div>
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div  class="form-field-title"> 직급 </div>
              </div>
              <div class="col-sm-4 mb-3 mb-sm-0">
                <select id="id-admin-zikgeop" class="form-field-title-white"> 
                  <option <?php if($admin['zikgeop']==null) echo "selected" ?>></option>
                  <option <?php if($admin['zikgeop']=="팀장") echo "selected" ?>>팀장</option>   
                  <option <?php if($admin['zikgeop']=="경영팀장") echo "selected" ?>>경영팀장</option>   
                  <option <?php if($admin['zikgeop']=="인사팀장") echo "selected" ?>>인사팀장</option>   
                  <option <?php if($admin['zikgeop']=="급여팀장") echo "selected" ?>>급여팀장</option>   
                  <option <?php if($admin['zikgeop']=="회계팀장") echo "selected" ?>>회계팀장</option>   
                  <option <?php if($admin['zikgeop']=="사원") echo "selected" ?>>사원</option>   
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="form-field-title"> 연락처 </div>
              </div>
              <div class="col-sm-4 mb-3 mb-sm-0">
                <input id="id-admin-phone" type="text" class="form-field-title-white" id="exampleFirstName" placeholder="연락처"
                value=<?php echo $admin['phone']?>>
              </div>
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div  class="form-field-title"> 긴급연락처 </div>
              </div>
              <div class="col-sm-4 mb-3 mb-sm-0">
                <input id="id-admin-emergencyContact" type="text" class="form-field-title-white" id="exampleFirstName" placeholder="긴급연락처"  value=<?php echo $admin['emergencyContact']?>>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="form-field-title">이메일</div>
              </div>
              <div class="col-sm-6 mb-3 mb-sm-0">
                <input id="id-admin-email" type="text" class="form-field-title-white" id="exampleFirstName" placeholder="이메일"  
                value="<?php echo $admin['email']?>">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="form-field-title"> 주소 </div>
              </div>
              <div class="col-sm-3 mb-3 mb-sm-0">
                <input id="id-admin-addressZipcode" type="text" class="form-field-title-white" id="exampleFirstName" placeholder="우편번호" disabled  value="<?php echo explode("/",$admin['address'])[0]?>">
              </div>
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div id="id-admin-zipcode-btn" class="form-field-title register-btn">우편번호</div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2 mb-3 mb-sm-0">
              </div>
              <div class="col-sm-5 mb-3 mb-sm-0">
                <input disabled id="id-admin-address" type="text" class="form-field-title-white" id="exampleFirstName" placeholder="주소"   value="<?php echo explode("/",$admin['address'])[1]?>">
              </div>
              <div class="col-sm-5 mb-3 mb-sm-0">
                <input id="id-admin-addressDetail" type="text" class="form-field-title-white" id="exampleFirstName" placeholder="상세주소"  value="<?php echo explode("/",$admin['address'])[2]?>">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="form-field-title"> 프로필 </div>
              </div>
              <div class="col-sm-3 mb-3 mb-sm-0">
                <input id="id-admin-profileImg" type="file" class="form-field-title-white" name="fileToUpload" >
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-4 mb-3 mb-sm-0">
              </div>
              <div class="col-sm-4 mb-3 mb-sm-0">  <div id="id-admin-edit" class="form-field-title register-btn"> EDIT</div>
              </div>
            </div>
            <hr>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="static/js/admin/admin-edit.js"></script>
<script type="text/JavaScript" src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>