<?php
include_once 'nav.php';
include_once 'db/company/getCompany.php';
include_once 'db/uptae/getUptae.php';
include_once 'db/jikjong/getJikjong.php';
$result = getCompanyById($_GET['id'])[0];
?>

<div id="content-wrapper" class="d-flex flex-column">
  <!-- Main Content -->
  <div id="content">
    <div class="container-fluid">
      <!-- Page Heading -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">기업수정FORM</h6>
        </div>
        <div class="card-body">
          <form class="user">
            <div class="form-group row">
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="form-field-title"> 아이디 </div>
              </div>
              <div class="col-sm-4 mb-3 mb-sm-0">
                <input disabled id="id-company-companyId" type="text" class="form-field-title-white" 
                  placeholder="아이디" value=<?php echo $result['companyId'] ?>>
              </div>
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="form-field-title"> 회사명 </div>
              </div>
              <div class="col-sm-4 mb-3 mb-sm-0">
                <input id="id-company-name" type="text" class="form-field-title-white" 
                  placeholder="회사명" value=<?php echo $result['companyName'] ?> >
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-3 mb-3 mb-sm-0">
                <div class="form-field-title"> 비밀번호 </div>
              </div>
              <div class="col-sm-5 mb-3 mb-sm-0">
                <input id="id-company-password" type="password" class="form-field-title-white" 
                  placeholder="비밀번호" >
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="form-field-title"> 대표이름 </div>
              </div>
              <div class="col-sm-4 mb-3 mb-sm-0">
                <input  id="id-company-ceoName" type="text" class="form-field-title-white" 
                  placeholder="대표이름"  value=<?php echo $result['ceoName'] ?>>
              </div>
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="form-field-title"> CRN </div>
              </div>
              <div class="col-sm-4 mb-3 mb-sm-0">
                <input id="id-company-crn" type="text" class="form-field-title-white"
                  placeholder="사업자등록번호" value=<?php echo $result['crn'] ?> >
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="form-field-title"> 대표번호 </div>
              </div>
              <div class="col-sm-4 mb-3 mb-sm-0">
                <input  id="id-company-phone" type="text" class="form-field-title-white"
                  placeholder="대표번호"  value=<?php echo $result['phone'] ?>>
              </div>
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="form-field-title"> FAX </div>
              </div>
              <div class="col-sm-4 mb-3 mb-sm-0">
                <input id="id-company-fax" type="text" class="form-field-title-white" 
                  placeholder="FAX"  value=<?php echo $result['fax'] ?>>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="form-field-title"> 주소 </div>
              </div>
              <div class="col-sm-4 mb-3 mb-sm-0">
                <input id="id-company-addressZipcode" type="text" class="form-field-title-white" 
                  placeholder="우편번호" disabled  value="<?php echo explode("/",$result['address'])[0] ?>">
              </div>
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div id="id-company-zipcode-btn" class="form-field-title register-btn">우편번호</div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2 mb-3 mb-sm-0">
              </div>
              <div class="col-sm-5 mb-3 mb-sm-0">
                <input id="id-company-address" type="text" class="form-field-title-white"
                  placeholder="주소" disabled  value="<?php echo explode("/",$result['address'])[1] ?>">
              </div>
              <div class="col-sm-5 mb-3 mb-sm-0">
                <input id="id-company-addressDetail" type="text" class="form-field-title-white" 
                  placeholder="상세주소"  value="<?php echo explode("/",$result['address'])[2] ?>">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-3 mb-3 mb-sm-0">
                <div class="form-field-title"> 담당자이름 </div>
              </div>
              <div class="col-sm-4 mb-3 mb-sm-0">
                <input id="id-company-managerName" type="text" class="form-field-title-white" 
                  placeholder="담당자이름" value=<?php echo $result['managerName'] ?> >
              </div>
            </div> <div class="form-group row">
              <div class="col-sm-3 mb-3 mb-sm-0">
                <div class="form-field-title"> 담당자이메일 </div>
              </div>
              <div class="col-sm-4 mb-3 mb-sm-0">
                <input id="id-company-managerEmail" type="text" class="form-field-title-white" 
                  placeholder="담당자이메일" value=<?php echo $result['managerEmail'] ?> >
              </div>
            </div> <div class="form-group row">
              <div class="col-sm-3 mb-3 mb-sm-0">
                <div class="form-field-title"> 담당자연락처 </div>
              </div>
              <div class="col-sm-4 mb-3 mb-sm-0">
                <input id="id-company-managerPhone" type="text" class="form-field-title-white"
                  placeholder="담당자연락처" value=<?php echo $result['managerPhone'] ?> >
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="form-field-title"> 업태 </div>
              </div>
              <div class="col-sm-3 mb-3 mb-sm-0">
                <select  id="id-company-uptae"  class="form-field-title-white" >
                  <?php
                    for($i=0;$i<sizeof($uptae=getUptae());$i++){
                      
                      if($uptae[$i]['uptaeId']==$result['uptaeId']){
                        echo "<option id='uptaeId-".$uptae[$i]['uptaeId']."' selected>".$uptae[$i]['uptaeName']."</option>";
                      }
                      else{
                        echo "<option  id='uptaeId-".$uptae[$i]['uptaeId']."'>".$uptae[$i]['uptaeName']."</option>";
                      }}
                      ?>
                </select>
              </div>
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="form-field-title"> 구인분야 </div>
              </div>
              <div class="col-sm-3 mb-3 mb-sm-0">
                <select id="id-company-jikjong" class="form-field-title-white">
                <?php
                    for($i=0;$i<sizeof($jikjong=getJikjong());$i++){
                      if($jikjong[$i]['jikjongId']==$result['jikjongId']){
                        echo "<option id='jikjongId-".$jikjong[$i]['jikjongId']."' value='' selected>".$jikjong[$i]['jikjongName']."</option>";
                      }
                      else{
                        echo "<option  id='jikjongId-".$jikjong[$i]['jikjongId']."' >".$jikjong[$i]['jikjongName']."</option>";
                      }
                    }
                      ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-3 mb-3 mb-sm-0">
                <div class="form-field-title"> 홈페이지 </div>
              </div>
              <div class="col-sm-5 mb-3 mb-sm-0">
                <input id="id-company-homepageUrl" type="text" class="form-field-title-white"
                  placeholder="홈페이지주소"  value=<?php echo $result['homepageUrl'] ?>>
              </div>
            </div>
            <div class="form-group row" >
              <div class="col-sm-3 mb-3 mb-sm-0">
               
              </div>
              <div class="col-sm-3 mb-3 mb-sm-0">
                <div id="id-company-edit" class="form-field-title register-btn"> EDIT</div>
              </div>
              <div class="col-sm-3 mb-3 mb-sm-0">
                <div id="id-company-delete" class="form-field-title register-btn"> DELETE</div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="static/js/company/company-edit.js"></script>
<script type="text/JavaScript" src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
<script>
<?php if($loginType=="company"){?>
  document.getElementById('accordionSidebar').style.display="block";
<?php }?>
</script>