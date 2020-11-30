<?php
include_once 'nav.php';
include_once 'db/regular-member/getRegularMember.php';
include_once 'db/member/getMember.php';
include_once 'db/buseo/getBuseo.php';
$result = getRegularMemberById($_GET['id'])[0];
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
                <img src=<?php if($result['profileImg']==null) echo "/venus/uploads/default.png";
                  else
                  echo $result['profileImg']?> style="width:150px; margin:0 auto;">
            </div>
            <div class="form-group row">
              <div class="col-sm-3 mb-3 mb-sm-0">
                <div class="form-field-title"> 정규회원코드 </div>
              </div>
              <div class="col-sm-3 mb-3 mb-sm-0">
                <input disabled id="id-rm-rmId" type="text" class="form-field-title-white" 
                   value=<?php echo $_GET['id']?>>
              </div>
              
            </div>
            <div class="form-group row">
              <div class="col-sm-3 mb-3 mb-sm-0">
                <div class="form-field-title"> 회원ID </div>
              </div>
              <div class="col-sm-3 mb-3 mb-sm-0">
                <input disabled id="id-rm-memberId" type="text" class="form-field-title-white"
                   value=<?php echo $result['memberId']?>>
              </div>
              <div class="col-sm-3 mb-3 mb-sm-0">
                <div class="form-field-title"> 회원명 </div>
              </div>
              <div class="col-sm-3 mb-3 mb-sm-0">
                <input disabled id="id-rm-memberId" type="text" class="form-field-title-white"
                   value=<?php echo $result['name']?>>
              </div>
            </div>
            <div class="form-group row">
              
              <div class="col-sm-3 mb-3 mb-sm-0">
                <div class="form-field-title"> 회사코드 </div>
              </div>
              <div class="col-sm-3 mb-3 mb-sm-0">
                <input disabled id="id-rm-rmName" type="text" class="form-field-title-white"
                   value=<?php echo $result['companyCode']?>>
              </div>
              <div class="col-sm-3 mb-3 mb-sm-0">
                <div class="form-field-title"> 회사명 </div>
              </div>
              <div class="col-sm-3 mb-3 mb-sm-0">
                <input disabled id="id-rm-rmName" type="text" class="form-field-title-white"
                   value=<?php echo $result['companyName']?>>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-3 mb-3 mb-sm-0">
                <div class="form-field-title"> 근무처 </div>
              </div>
              <div class="col-sm-3 mb-3 mb-sm-0">
                <input id="id-rm-workPosition" type="text" class="form-field-title-white"
                  placeholder="근무처" value=<?php echo $result['workPosition']?>>
              </div>
              <div class="col-sm-3 mb-3 mb-sm-0">
                <div class="form-field-title"> 근무지 </div>
              </div>
              <div class="col-sm-3 mb-3 mb-sm-0">
                <input id="id-rm-workPlace" type="text" class="form-field-title-white"
                  placeholder="근무지" value=<?php echo $result['workPlace']?>>
              </div>
            </div>
            <div class="form-group row">
            <div class="col-sm-3 mb-3 mb-sm-0">
                <div class="form-field-title"> 부서명 </div>
              </div>
              <div class="col-sm-3 mb-3 mb-sm-0">
              <select id="id-rm-buseo" class="form-field-title-white">
                    <?php
                    for($i=0;$i<sizeof($bs=getBuseo());$i++){?>
                    <option <?php echo "id=buseoId-".$bs[$i]['buseoId']; if($result['buseoId']==$bs[$i]['buseoId']) echo " selected"; ?>  ><?php echo $bs[$i]['buseoName'] ;?></option>
                      <!-- echo "<option id='buseoId-".$bs[$i]['buseoId']."' >".$bs[$i]['buseoName']."</option>"; -->
                    <?php
                    }
                    ?>
                </select>
              </div>
              <div class="col-sm-3 mb-3 mb-sm-0">
                <div class="form-field-title"> 회원종류 </div>
              </div>
              <div class="col-sm-3 mb-3 mb-sm-0">
                <select id="id-rm-memberType" class="form-field-title-white">
                    <?php
                    for($i=0;$i<sizeof($mt=getMemberType());$i++){?>
                    <option <?php echo "id=typeId-".$mt[$i]['typeId']; if($mt[$i]['typeId']==$result['typeId']) echo " selected"; ?>  ><?php echo $mt[$i]['typeName']; ?></option>
                     
                    <?php
                    }
                    ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-3 mb-3 mb-sm-0">
                <div class="form-field-title"> 입사일 </div>
              </div>
              <div class="col-sm-3 mb-3 mb-sm-0">
                <input id="id-rm-enteredDate" type="date" class="form-field-title-white"
                  placeholder="입사일" value=<?php echo $result['enteredDate']?>>
              </div>
            </div>
            <div class="form-group row" >
            <div class="col-sm-3 mb-3 mb-sm-0">
                <div class="form-field-title"> 계좌번호 </div>
              </div>
             
              <div class="col-sm-2 mb-3 mb-sm-0">
                <input id="id-rm-accountHolder" type="text" class="form-field-title-white"
                  placeholder="예금주" value=<?php echo $result['accountHolder']?>>
              </div>
              <div class="col-sm-3 mb-3 mb-sm-0">
                <input id="id-rm-bankName" type="text" class="form-field-title-white"
                  placeholder="은행명" value=<?php echo $result['bankName']?>>
              </div>
              <div class="col-sm-4 mb-3 mb-sm-0">
                <input id="id-rm-account" type="text" class="form-field-title-white"
                  placeholder="계좌번호" value=<?php echo $result['account']?>>
              </div>
            </div>
            <div class="form-group row" ></div>
            <div class="form-group row" >
              <div class="col-sm-3 mb-3 mb-sm-0">
               
              </div>
              <div class="col-sm-3 mb-3 mb-sm-0">
                <div id="id-rm-edit" class="form-field-title register-btn"> EDIT</div>
              </div>
              <div class="col-sm-3 mb-3 mb-sm-0">
                <div id="id-rm-delete" class="form-field-title register-btn"> DELETE</div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="static/js/regular-member/regular-member-edit.js"></script>
<script type="text/JavaScript" src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>