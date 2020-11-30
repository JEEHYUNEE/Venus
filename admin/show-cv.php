<?php
include_once 'nav.php';
include_once 'db/cv/getCV.php';

?>
<link href="static/css/board.css" rel="stylesheet" type="text/css">

<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">이력서관리</h1>
            <p class="mb-4">이력서를 다운로드 및 삭제 할 수있습니다.</p>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">업태/업종 TABLE</h6>
                </div>

                <div class="card-body">
                    <table id="example" class="display">
                        <thead>
                            <tr>
                            <th>이력서코드</th>
                            <th>회원ID</th>
                            <th>이력서제목</th>
                            <th>등록일</th> 
                            <th>관리</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for($i=0;$i<sizeof($result = getCV($_GET['id']));$i++){
                                echo "<tr id='id-member-".$result[$i]['cvId']."'>";
                                echo "<td class='member-table-row'>".$result[$i]['cvId']."</td>";
                                echo "<td>".$result[$i]['memberId']."</td>";
                                echo "<td><a href='".$result[$i]['cvPath']."' download>".$result[$i]['cvName']."</a></td>";
                                echo "<td>".$result[$i]['date']."</td>";
                                echo "<td><button class='delete'>삭제</button></td>";
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
    });
    for(var i=0;i<document.getElementsByClassName('delete').length;i++){
        document.getElementsByClassName('delete')[i].addEventListener('click',function(){
            var formData = new FormData();
            formData.append('id', this.parentNode.parentNode.children[0].innerHTML);
            $.ajax({
                    url: "/venus/admin/db/cv/delete.php",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (msg) {
                        if (msg == "SUCCESS") {
                        alert("이력서가 삭제되었습니다.");
                            location.reload();

                        }
                    }
                });
        });
    }
   
</script>