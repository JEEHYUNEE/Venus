<?php
include_once 'nav.php';
include_once 'db/buseo/getBuseo.php';
?>
<link href="static/css/board.css" rel="stylesheet" type="text/css">

<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <div class="container-fluid" style="width:50%;">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">부서 관리</h1>
            <p class="mb-4">부서 정보를 추가/삭제/변경 가능한 페이지입니다.</p>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">부서 TABLE</h6>
                </div>
                
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-sm-3 mb-3 mb-sm-0">
                            <input id="id-buseo-name-insert" type="text" class="form-field-title-white" placeholder="부서 이름">
                        </div>
                        <div class="col-sm-3 mb-3 mb-sm-0">
                        <div id="id-buseo-insert"  class="form-field-title">등록</div>
                        </div>
                    </div>
                    <table id="example" class="display">
                        <thead>
                            <tr>
                                <th>부서 코드</th>
                                <th>부서 이름</th>
                                <th>.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $buseo=getBuseo();
                                for($i=0;$i<sizeof($buseo);$i++){
                                    echo "<tr id='id-buseo-".$buseo[$i]['buseoId']."'>";
                                    echo "<td>".$buseo[$i]['buseoId']."</td>";
                                    echo "<td><input id='id-buseo-name-".$buseo[$i]['buseoId']."' type='text' value='".$buseo[$i]['buseoName']."'>
                                    <span hidden>".$buseo[$i]['buseoName']."</span></td>";
                                    echo "<td><button class='buseo-edit'>수정</button><button class='buseo-delete'>삭제</button></td>";
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


<script src="static/js/buseo/buseo.js"></script>
<script src="static/vendor/datatables/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
    // document.getElementById('example_filter').style.display="none";
</script>
