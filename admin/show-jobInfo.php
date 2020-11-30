<?php

include_once 'nav.php';
include_once 'db/region/getRegion.php';
include_once 'db/jikjong/getJikjong.php';
include_once 'db/jobInfo/getJobInfo.php';
$id=$_GET['id'];
$result = getJobInfoById($id)[0];
?>

<!-- <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet"> -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 

<!-- include summernote css/js-->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>

<style>
    .note-popover{
      display:none;
    }
    .note-insert{
      display:none;
    }
    .note-toolbar, .panel-heading{
      background-color:#F8F8FF;
    }
</style>

<div id="content-wrapper" class="d-flex flex-column">
  <!-- Main Content -->
  <div id="content">
    <div class="container-fluid">
      <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">구인정보관리</h1>
      <p class="mb-4">구인정보를 확인 및 수정 할 수 있는 페이지입니다. </p>
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">구인정보 확인 Form</h6>
        </div>
        <div class="card-body">
          <form>
            <div class="form-group row">
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="form-field-title"> 기업코드 </div>
              </div>
              <div class="col-sm-3 mb-3 mb-sm-0">
                <input id='id-companyCode' type="text" class="form-field-title-white" placeholder="기업코드" value='<?php echo $result['companyCode']?>' readonly>
              </div>
              <div class="col-sm-1 mb-3 mb-sm-0"  style="display:none;">
              <div id='id-search-companyCode' class="form-field-title"> 검색 </div>
              </div>
              <div class="col-sm-3 mb-3 mb-sm-0">
                <input id='id-companyName' type="text" class="form-field-title-white" placeholder="기업명"  value='<?php echo $result['companyName']?>' readonly>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="form-field-title"> 근무처 </div>
              </div>
              <div class="col-sm-4 mb-3 mb-sm-0">
                <input id='id-workPosition' type="text" class="form-field-title-white"   value='<?php echo $result['workPosition']?>' >
              </div>
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="form-field-title"> 근무지 </div>
              </div>
              <div class="col-sm-4 mb-3 mb-sm-0">
                <input id='id-workPlace' type="text" class="form-field-title-white"  value='<?php echo $result['workPlace']?>'>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="form-field-title" > 지역 </div>
              </div>
              <div class="col-sm-2 mb-3 mb-sm-0">
                <select id='id-region' class="form-field-title-white" >
                  <?php
                  for($i=0;$i<sizeof($region=getRegion());$i++){
                    echo "<option id='regionId-".$region[$i]['regionId']."'>".$region[$i]['regionName']."</option>";
                  }
                   ?>
                </select>
              </div>
              <div class="col-sm-2 mb-3 mb-sm-0">
                <input type="text" id='id-subRegion' class="form-field-title-white" value="<?php echo $result['workPlace'] ?>" >
              </div>
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="form-field-title"> 직종 </div>
              </div>
              <div class="col-sm-2 mb-3 mb-sm-0">
                <select id='id-jikjong' class="form-field-title-white" >
                <?php
                  for($i=0;$i<sizeof($jikjong=getJikjong());$i++){
                      $selected =null;
                      if($jikjong[$i]['jikjongId']==$result['jikjong'])
                      $selected="selected";
                    ?>
                    <option id='jikjongId-<?php echo $jikjong[$i]['jikjongId'] ?>' <?php echo $selected?>> <?php echo $jikjong[$i]['jikjongName'] ?>  </option>
                  <?php }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div  class="form-field-title"> 채용인원 </div>
              </div>
              <div class="col-sm-2 mb-3 mb-sm-0">
                <input id='id-applyNumber' type="text" class="form-field-title-white" value='<?php echo $result['applyNumber']?>'>
              </div>
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="form-field-title"> 마감일자 </div>
              </div>
              <div class="col-sm-2 mb-3 mb-sm-0">
                <input id='id-dueDate' type="date" class="form-field-title-white"   value='<?php echo $result['dueDate']?>'>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="form-field-title"> 담당자 </div>
              </div>
              <div class="col-sm-3 mb-3 mb-sm-0">
                <input id='id-managerName' type="text" class="form-field-title-white"  placeholder="담당자이름"  value='<?php echo $result['managerName']?>'>
              </div>
              
              <div class="col-sm-3 mb-3 mb-sm-0">
                <input id='id-managerPhone' type="text" class="form-field-title-white"  placeholder="담당자번호" value='<?php echo $result['managerPhone']?>'>
              </div>

              <div class="col-sm-4 mb-3 mb-sm-0">
                <input id='id-managerEmail' type="text" class="form-field-title-white"  placeholder="담당자이메일"  value='<?php echo $result['managerEmail']?>'>
              </div>
            </div>
            <div class="form-group row">
            <div class="col-sm-1  mb-3 mb-sm-0"  ></div>
              <div class="col-sm-9 mb-3 mb-sm-0"  >
                  <div id='id-contents'><?php echo $result['contents'] ?></div>
              </div>
            </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-5 mb-3 mb-sm-0"></div>
              <div class="col-sm-2 mb-3 mb-sm-0">
              <div id='id-edit-jobInfo' class="form-field-title register-btn"> 수정 </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function() {
  $('#id-contents').summernote();
});
</script>
<script src="static/js/jobInfo/jobInfo-edit.js?ver=123"></script>