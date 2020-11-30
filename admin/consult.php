<?php
  include_once('./db/jhDbcon.php');
  include_once 'nav.php';
?>
<link href="static/css/board.css" rel="stylesheet" type="text/css">
<script src="static/vendor/datatables/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>

<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">상담/불편신고관리</h1>
            <p class="mb-3">상담과 불편신고를 관리하는 페이지 입니다.<br><span class="text-gray-800" style="font-size:15px;">아이디 선택시, 답변 전송이 가능합니다.</span></p>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">상담/불편신고 TABLE</h6>
                </div>
                <div class="card-body">
                    <table id="example" class="display">
                        <thead>
                            <tr>
                                <th>Num</th>
                                <th>이름</th>
                                <th>이메일</th>
                                <th>종류</th>
                                <th>내용</th>
                                <th>처리상황</th>
                                <th>신고날짜</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            // board테이블에서 idx를 기준으로 내림차순해서 5개까지 표시
                            $sql = mq("select * from consult order by consultNum"); 
                                while($board = $sql->fetch_array())
                                {   
                                    echo "<tr>";
                                    echo "<td width='10'>".$board['consultNum']."</td>";
                                    echo "<td width='50'><a href='./db/consult/consultEmail.php?num=".$board['consultNum'].";?>' target='_blank' onClick=".'"'."window.open(this.href, '', 'width=550,height=575,scrollbars=yes,resizeable=no,left=150,top=150'); return false;".'"'.">".$board['userName']."</a> </td>";
                                    echo "<td width='30'>".$board['email']." </td>";
                                    if($board['type']=='sangdam'){
                                        echo "<td width='30'>상담</td>";
                                    }else{
                                        echo "<td width='30'>불편신고</td>";
                                    }
                                    echo "<td width='200'>".$board['content']." </td>";
                                    echo "<td width='20'>".$board['situation']." </td>";
                                    echo "<td width='30'>".$board['date']." </td>";
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
</body>
</html>


