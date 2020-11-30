<?php
include_once 'nav.php';
?>
<div id="content-wrapper" class="d-flex flex-column">
  <!-- Main Content -->
  <div id="content">
    <div class="container-fluid">
      <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">급여데이터등록(엑셀)</h1>
      <p class="mb-4">급여데이터를 등록할 수 있는 페이지 입니다.</p>
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-body">
          <div class="form-group row">
            <div class="col-sm-11 mb-3 mb-sm-0"></div>
            <div class="col-sm-1 mb-3 mb-sm-0">
            <h6 class="m-0 font-weight-bold text-primary"> 
            <a href="db/salary/getSalaryForm.php" >양식다운받기</a>
          </h6>
            </div>
          </div>
          <div class="form-group row">
            <div style="margin: 0 auto;">
              <input id="id-salary-excel" type="file" class="form-field-title-white">
            </div>
          </div>
          <div class="form-group row">
              <div id="id-excel-insert" class="form-field-title register-btn">등록</div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </div>
</div>


<script src="static/js/salary/salary-excel.js"></script>
