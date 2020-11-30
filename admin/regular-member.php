<?php
include_once 'nav.php';
include_once 'db/regular-member/getRegularMember.php';
?>
<link href="static/css/board.css" rel="stylesheet" type="text/css">

<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">정규회원관리</h1>
            <p class="mb-4">정규회원의 정보를 조회 및 회원종류 수정 가능한 페이지 입니다.</p>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">정규회원 TABLE</h6>
                </div>
                <div class="card-body">
                    <table id="example" class="display">
                        <thead>
                            <tr>
                                <th>정규회원코드</th>
                                <th>회원ID</th>
                                <th>성명</th>
                                <th>회사명</th>
                                <th>부서코드</th>
                                <th>근무처</th>
                                <th>근무지</th>
                                <th>입사일</th>
                                <th>회원종류</th>
                                <th>관리</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                            if($loginType=="admin")
                                $rm= getRegularMember();
                            else
                                $rm = getRegularMemberByCompany($login);
                            for($i=0;$i<sizeof($rm);$i++){
                                echo "<tr id='id-rm-".$rm[$i]['rmId']."' >";
                                echo "<td class='class-rm'>".$rm[$i]['rmId']."</td>";
                                echo "<td class='class-member' >".$rm[$i]['memberId']."</td>";
                                echo "<td>".$rm[$i]['name']."</td>";
                                echo "<td>".$rm[$i]['companyName']."</td>";
                                echo "<td>".$rm[$i]['buseoName']."</td>";
                                echo "<td>".$rm[$i]['workPosition']."</td>";
                                echo "<td>".$rm[$i]['workPlace']."</td>";
                                echo "<td>".$rm[$i]['enteredDate']."</td>";
                                echo "<td>".$rm[$i]['typeName']."</td>";
                                echo "<td><button class='show-salary-history'>급여내역</button></td>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>  </div>
        </div>
        <!-- /.container-fluid -->
    </div>
</div>


<script src="static/js/regular-member/regular-member.js"></script>
<script src="static/vendor/datatables/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
