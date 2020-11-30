<?php
include_once 'nav.php';
include_once 'db/uptae/getUptae.php';
?>
<link href="static/css/board.css" rel="stylesheet" type="text/css">

<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <div class="container-fluid" style="width:50%;">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">업태/업종 관리</h1>
            <p class="mb-4">업태/업종 정보를 추가/삭제/변경 가능한 페이지입니다.</p>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">업태/업종 TABLE</h6>
                </div>
                
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-sm-3 mb-3 mb-sm-0">
                            <input id="id-uptae-name-insert" type="text" class="form-field-title-white" placeholder="업태/업종 이름">
                        </div>
                        <div class="col-sm-3 mb-3 mb-sm-0">
                        <div id="id-uptae-insert"  class="form-field-title">등록</div>
                        </div>
                    </div>
                    <table id="example" class="display">
                        <thead>
                            <tr>
                                <th>업태/업종 코드</th>
                                <th>업태/업종 이름</th>
                                <th>.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $uptae=getUptae();
                                for($i=0;$i<sizeof($uptae);$i++){
                                    echo "<tr id='id-uptae-".$uptae[$i]['uptaeId']."'>";
                                    echo "<td>".$uptae[$i]['uptaeId']."</td>";
                                    echo "<td><input id='id-uptae-name-".$uptae[$i]['uptaeId']."' type='text' value='".$uptae[$i]['uptaeName']."'>
                                    <span hidden>".$uptae[$i]['uptaeName']."</span></td>";
                                    echo "<td><button class='uptae-edit'>수정</button><button class='uptae-delete'>삭제</button></td>";
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


<script src="static/js/uptae/uptae.js"></script>
<script src="static/vendor/datatables/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
    // document.getElementById('example_filter').style.display="none";
</script>
