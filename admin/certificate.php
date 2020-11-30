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
            <h1 class="h3 mb-2 text-gray-800">증명서발급신청관리</h1>
            <p class="mb-3">증명서발급신청을 관리하는 페이지 입니다.<br><span class="text-gray-800" style="font-size:15px;">아이디 선택시, 증명서 전송이 가능합니다.</span></p>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">증명서발급신청 TABLE</h6>
                </div>
                <div class="card-body">
                    <table id="example" class="display">
                        <thead>
                            <tr>
                                <th>Num</th>
                                <th>아이디</th>
                                <th>이메일</th>
                                <th>종류</th>
                                <th>용도</th>
                                <th>처리상황</th>
                                <th>신고날짜</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            // board테이블에서 idx를 기준으로 내림차순해서 5개까지 표시
                            $sql = mq("select * from certificate order by certificateNum"); 
                                while($board = $sql->fetch_array())
                                {   
                                    echo "<tr>";
                                    echo "<td width='20'>".$board['certificateNum']."</td>";
                                    echo "<td width='30'><a href='./db/certificate/certificateEmail.php?num=".$board['certificateNum'].";?>' target='_blank' onClick=".'"'."window.open(this.href, '', 'width=550,height=350,scrollbars=yes,resizeable=no,left=150,top=150'); return false;".'"'.">".$board['userId']."</a> </td>";
                                    echo "<td width='30'>".$board['email']." </td>";
                                    if($board['type']=='certificate_t1'){
                                        echo "<td width='50'>재직증명서</td>";
                                    }else if($board['type']=='certificate_t2'){
                                        echo "<td width='50'>경력증명서</td>";
                                    }else if($board['type']=='certificate_t3'){
                                        echo "<td width='50'>퇴직증명서</td>";
                                    }else if($board['type']=='certificate_t4'){
                                        echo "<td width='50'>근로소득원천징수영수증</td>";
                                    }else if($board['type']=='certificate_t5'){
                                        echo "<td width='50'>소득자별근로소득원천징수부</td>";
                                    }
                                    if($board['purpose']=='certificate_p1'){
                                        echo "<td width='50'>금융권제출</td>";
                                    }else if($board['purpose']=='certificate_p2'){
                                        echo "<td width='50'>관공서제출</td>";
                                    }else if($board['purpose']=='certificate_p3'){
                                        echo "<td width='50'>학교제출</td>";
                                    }else if($board['purpose']=='certificate_p4'){
                                        echo "<td width='50'>경력증명(회사제출)</td>";
                                    }else if($board['purpose']=='certificate_p5'){
                                        echo "<td width='50'>기타</td>";
                                    }
                                   
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


