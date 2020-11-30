<?php
include_once 'nav.php';
include_once 'db/member/getMember.php';
include_once 'db/regular-member/getRegularMember.php';
?>
<link href="static/css/board.css" rel="stylesheet" type="text/css">

<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">개인회원관리</h1>
            <p class="mb-4">개인회원의 정보를 조회/수정/삭제가 가능하며 정규회원전환이 가능한 페이지 입니다.</p>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">개인회원 TABLE</h6>
                </div>

                <div class="card-body">
                    <table id="example" class="display">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>이름</th>
                            <th>이메일</th> 
                            <th>생년월일</th>
                            <th>연락처</th>
                            <th>주소</th>
                            <th>이력서관리</th>
                            <th>회원상태</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for($i=0;$i<sizeof($result = getMember());$i++){
                                echo "<tr id='id-member-".$result[$i]['memberId']."'>";
                                echo "<td class='member-table-row'>".$result[$i]['memberId']."</td>";
                                echo "<td>".$result[$i]['name']."</td>";
                                echo "<td>".$result[$i]['email']."</td>";
                                echo "<td>".$result[$i]['birthDate']."</td>";
                                echo "<td>".$result[$i]['phone']."</td>";
                                echo "<td>".$result[$i]['address']."</td>";
                                echo "<td><a href='show-cv.php?id=".$result[$i]['memberId']."'>이력서확인</a></td>";
                                if(sizeof(checkRegularMember($result[$i]['memberId']))==0)
                                     echo "<td><button class='change-regular-member'>정규회원전환</button></td>";
                                else
                                    echo "<td>정규회원</td>";
                                echo "</tr>";
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


<script src="static/js/member/member.js"></script>
<script src="static/vendor/datatables/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
        $('#example_filter').hide()
    });
    // document.getElementById('example_filter').style.display="none";
</script>