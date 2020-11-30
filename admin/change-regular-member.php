<?php
include_once 'nav.php';
include_once 'db/member/getMember.php';
include_once 'db/buseo/getBuseo.php';
$result = getMemberById($_GET['id']);
?>

<div id="content-wrapper" class="d-flex flex-column">
  <!-- Main Content -->
  <div id="content">
    <div class="container-fluid">
      <!-- Page Heading -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">정규회원등록</h6>
        </div>
        <div class="card-body">
          <form class="user">
            <div class="form-group row">
              <div class="col-sm-3 mb-3 mb-sm-0">
                <div class="form-field-title"> 회원ID </div>
              </div>
              <div class="col-sm-5 mb-3 mb-sm-0">
                <input type="text" id='id-rm-memberId' class="form-field-title-white" disabled
                  value=<?php echo $_GET['id']?>></input>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-3 mb-3 mb-sm-0">
                <div class="form-field-title"> 채용코드 </div>
              </div>
              <div class="col-sm-5 mb-3 mb-sm-0">
                <input  type="text" id='id-jobInfoCode' class="form-field-title-white" ></input>
              </div>
              <div class="col-sm-3 mb-3 mb-sm-0">
                <div id='id-jobinfoSearch' class="form-field-title">검색</div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-3 mb-3 mb-sm-0">
                <div class="form-field-title"> 기업코드 </div>
              </div>
              <div class="col-sm-5 mb-3 mb-sm-0">
                <input  type="text" id='id-companyCode' class="form-field-title-white" ></input>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-3 mb-3 mb-sm-0">
                <div class="form-field-title"> 부서코드 </div>
              </div>
              <div class="col-sm-5 mb-3 mb-sm-0">
                <select id='id-rm-buseo' class="form-field-title-white">
                  <?php
                  $buseo = getBuseo();
                  for($i=0;$i<sizeof($buseo);$i++){
                    echo "<option id='buseoId-".$buseo[$i]['buseoId']."'>".$buseo[$i]['buseoName']."</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
            <div></div>
            <div class="form-group row">
              <div class="col-sm-3 mb-3 mb-sm-0">
                <div class="form-field-title"> 회원타입 </div>
              </div>
              <div class="col-sm-5 mb-3 mb-sm-0">
                <select id='id-rm-memberType' class="form-field-title-white">
                  <?php
                  for($i=0;$i<sizeof($mt=getMemberType());$i++){
                    echo "<option id='typeId-".$mt[$i]['typeId']."' >".$mt[$i]['typeName']."</option>";
                  }
                ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-3 mb-3 mb-sm-0">
                <div class="form-field-title"> 입사날짜 </div>
              </div>
              <div class="col-sm-5 mb-3 mb-sm-0">
                <input id="id-rm-enteredDate" type="date" class="form-field-title-white">
              </div>
            </div>
            <div class="form-group row">
              <div id="id-rm-insert" class="form-field-title register-btn"> REGISTER</div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="static/js/member/change-regular-member.js?ver=1234"></script>