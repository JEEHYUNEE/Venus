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
            <h1 class="h3 mb-1 text-gray-800">FAQ관리</h1>
            <p class="mb-3">FAQ를 관리하는 페이지 입니다.<br><span class="text-gray-800" style="font-size:15px;">제목 선택시, 게시글이 보여집니다.</span></p>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                    <h6 class="col-md-6 m-0 font-weight-bold text-primary text-left">FAQ TABLE</h6>
                    <h6 class="col-md-6 m-0 font-weight-bold text-primary text-right"><a href="./db/faq/faqWrite.php" onClick="window.open(this.href, '', 'width=550,height=700,scrollbars=yes,resizeable=no,left=150,top=150'); return false;" class="p-1 text-black-50">FAQ작성</a></h6>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example" class="display">
                        <thead>
                            <tr>
                                <th>Num</th>
                                <th>제목</th>
                                <th>조회수</th>
                                <th>등록날짜</th>
                                <th>댓글관리</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $sql = mq("select * from faq order by faqNum"); 
                                while($board = $sql->fetch_array())
                                {   
                                    echo "<tr>";
                                    echo "<td width='20'>".$board['faqNum']."</td>";
                                    echo "<td width='30'><a href='./db/faq/faqBoard.php?num=".$board['faqNum'].";?>' target='_blank' onClick=".'"'."window.open(this.href, '', 'width=550,height=700,scrollbars=yes,resizeable=no,left=150,top=150'); return false;".'"'.">".$board['title']."</a> </td>";
                                    echo "<td width='30'>".$board['hit']." </td>";
                                    echo "<td width='50'>".$board['date']." </td>";
                                    echo "<td width='50'><a href='./db/faq/faqReply.php?num=".$board['faqNum'].";?>' target='_blank' onClick=".'"'."window.open(this.href, '', 'width=550,height=700,scrollbars=yes,resizeable=no,left=150,top=150'); return false;".'"'.">"."관리"."</a></td>";
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



