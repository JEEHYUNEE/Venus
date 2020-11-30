<?php
  include_once 'nav.php';
  include 'db/admin/getAdmin.php';
?>
<link href="static/css/board.css" rel="stylesheet" type="text/css">

<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">관리자권한관리</h1>
            <p class="mb-4">관리자의 권한을 관리할 수 있는 페이지 입니다. </p>
            <p class="mb-4"> 권한그룹, 근무상태 수정, 혹은 해당 관리자 삭제 가능 </p>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">관리자 TABLE</h6>
                </div>
                <div class="card-body">
                    <table id="example" class="display">
                        <thead>
                            <tr>
                                <th>사원번호</th>
                                <th>성명</th>
                                <th>직위</th>
                                <th>직급</th>
                                <th>권한그룹</th>
                                <th>근무상태</th>
                                <th>.</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            for($i=0;$i<sizeof($admin=getAdmin());$i++){
                                echo "<tr id=id-admin-".$admin[$i]['adminId'].">";
                                echo "<td class='class-admin'>".$admin[$i]['adminId']."</a></td>";
                                echo "<td>".$admin[$i]['name']."</td>";
                                echo "<td>".$admin[$i]['zikwi']."</td>";
                                echo "<td>".$admin[$i]['zikgeop']."</td>";
                                echo "<td><select id='id-admin-authority-".$admin[$i]['adminId']."'>";
                                if($admin[$i]['authority']=="사이트관리자") 
                                 echo "<option selected>사이트관리자</option>";
                                else
                                 echo "<option>사이트관리자</option>";
                                 if($admin[$i]['authority']=="전체권한") 
                                 echo "<option selected>전체권한</option>";
                                else
                                 echo "<option>전체권한</option>";
                                 if($admin[$i]['authority']=="인사권한") 
                                 echo "<option selected>인사권한</option>";
                                else
                                 echo "<option>인사권한</option>";
                                 if($admin[$i]['authority']=="급여권한") 
                                 echo "<option selected>급여권한</option>";
                                else
                                 echo "<option>급여권한</option>";
                                 if($admin[$i]['authority']=="회계권한") 
                                 echo "<option selected>회계권한</option>";
                                else
                                 echo "<option>회계권한</option>";
                                 if($admin[$i]['authority']=="일반권한") 
                                 echo "<option selected>일반권한</option>";
                                else
                                 echo "<option>일반권한</option>";
                                 if($admin[$i]['authority']==null) 
                                 echo "<option selected></option>";

                                echo "</select></td>";
                                echo "<td><select id='id-admin-workingStatus-".$admin[$i]['adminId']."'>";
                                if($admin[$i]['workingStatus']=="재직") 
                                 echo "<option selected>재직</option>";
                                else
                                 echo "<option>재직</option>";
                                 if($admin[$i]['workingStatus']=="휴직") 
                                 echo "<option selected>휴직</option>";
                                else
                                 echo "<option>휴직</option>";
                                 if($admin[$i]['workingStatus']=="출장") 
                                 echo "<option selected>출장</option>";
                                else
                                 echo "<option>출장</option>";
                                 if($admin[$i]['workingStatus']=="병가") 
                                 echo "<option selected>병가</option>";
                                else
                                 echo "<option>병가</option>";
                                 if($admin[$i]['workingStatus']=="퇴직") 
                                 echo "<option selected>퇴직</option>";
                                else
                                 echo "<option>퇴직</option>";
                                 if($admin[$i]['workingStatus']==null) 
                                 echo "<option selected></option>";

                                echo "</select></td>";
                                echo "<td><button  class='class-admin-authority-update'>수정</button>
                                <button class='class-admin-authority-delete' >삭제</button></td>";
                                echo "</tr>";
                             } ?>
    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
</div>

<script src="static/js/admin/admin.js"></script>
<script src="static/vendor/datatables/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
