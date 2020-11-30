<?php
include_once 'nav.php';
include_once 'db/jikjong/getJikjong.php';
?>
<link href="static/css/board.css" rel="stylesheet" type="text/css">

<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <div class="container-fluid" style="width:50%;">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">직종 관리</h1>
            <p class="mb-4">직종 추가/삭제/변경 가능한 페이지입니다.</p>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">직종 TABLE</h6>
                </div>
                
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-sm-3 mb-3 mb-sm-0">
                            <input id="id-jikjong-name-insert" type="text" class="form-field-title-white" placeholder="직종 이름">
                        </div>
                        <div class="col-sm-3 mb-3 mb-sm-0">
                        <div id="id-jikjong-insert"  class="form-field-title">등록</div>
                        </div>
                    </div>
                    <table id="example" class="display">
                        <thead>
                            <tr>
                                <th>직종 코드</th>
                                <th>직종 이름</th>
                                <th>.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $jikjong=getJikjong();
                                for($i=0;$i<sizeof($jikjong);$i++){
                                    echo "<tr id='id-jikjong-".$jikjong[$i]['jikjongId']."'>";
                                    echo "<td>".$jikjong[$i]['jikjongId']."</td>";
                                    echo "<td><input id='id-jikjong-name-".$jikjong[$i]['jikjongId']."' type='text' value='".$jikjong[$i]['jikjongName']."'>
                                    <span hidden>".$jikjong[$i]['jikjongName']."</span></td>";
                                    echo "<td><button class='jikjong-edit'>수정</button><button class='jikjong-delete'>삭제</button></td>";
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


<script src="static/js/jikjong/jikjong.js"></script>
<script src="static/vendor/datatables/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>

