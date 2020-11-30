<?php
include_once 'nav.php';
include_once 'db/jobInfo/getJobInfo.php';
include_once 'db/apply/getApply.php';

?>
<link href="static/css/board.css" rel="stylesheet" type="text/css">

<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">구인정보관리</h1>
            <p class="mb-3">구인정보를 관리하는 페이지 입니다.<br></p>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">구인정보 TABLE</h6>
                </div>

                <div class="card-body">
                    <table id="example" class="display">
                        <thead>
                            <tr>
                            <th>채용코드</th>
                            <th>회사명</th>
                            <th>담당자</th> 
                            <th>담당자이메일</th>
                            <th>채용인원</th>
                            <th>지원자수</th>
                            <th>마감일</th>
                            <th>진행상황</th>
                            <th>관리</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            <?php
                            if($loginType=="admin")
                                $result = getJobInfo();
                            else   
                                $result = getJobInfoByCompany($login);

                            for($i=0;$i<sizeof($result);$i++){
                                echo "<tr id='id-jobInfo-".$result[$i]['id']."'>";
                                echo "<td  class='jobInfo-table-row'>".$result[$i]['id']."</td>";
                                echo "<td>".$result[$i]['companyName']."</td>";
                                echo "<td>".$result[$i]['managerName']."</td>";
                                echo "<td>".$result[$i]['managerEmail']."</td>";
                                echo "<td>".$result[$i]['applyNumber']."</td>";
                                echo "<td>".getApplyNum($result[$i]['id'])[0]['count(*)']."</td>";
                                echo "<td>".$result[$i]['dueDate']."</td>";
                                echo "<td><select class='class-status'> "; ?>
                                <option <?php if($result[$i]['status']=="대기") echo "selected"?>  >대기</option>
                                <option <?php if($result[$i]['status']=="진행중") echo "selected"?>>진행중</option>
                                <option <?php if($result[$i]['status']=="마감") echo "selected"?>>마감</option>
                                </select></td>
                                <td><button class='class-delete'>삭제</button></td>
                                </tr>
                                <?php
                            }
                              ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
</div>


<script src="static/js/jobInfo/jobInfo-show.js"></script>
<script src="static/vendor/datatables/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
        // $('#example_filter').hide()
    });
    // document.getElementById('example_filter').style.display="none";
    
</script>