<?php
  include_once 'nav.php';
  include 'db/apply/getApply.php';
?>
<link href="static/css/board.css" rel="stylesheet" type="text/css">

<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">지원현황 관리</h1>
            <p class="mb-4">회원들의 지원현황을 확인할 수 있습니다.</p>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">관리자 TABLE</h6>
                </div>
                <div class="card-body">
                    <table id="example" class="display">
                        <thead>
                            <tr>
                                <th>지원코드</th>
                                <th>회원아이디</th>
                                <th>회원이름</th>
                                <th>회사이름</th>
                                <th>이력서</th>
                                <th>등록일</th>
                                <th>상태</th>
                                <th>처리일</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if($loginType=="admin"){
                                $apply = getApply();
                            }else{
                                $apply = getApplyByCompany($login);
                            }
                            for($i=0;$i<sizeof($apply);$i++){?>
                            <tr>
                                <td><?php echo $apply[$i]['applyId'] ?></td>
                                <td><?php echo $apply[$i]['memberId'] ?></td>
                                <td><?php echo $apply[$i]['name'] ?></td>
                                <td><?php echo $apply[$i]['companyName'] ?></td>
                                <td><a href='<?php echo $apply[$i]['cvPath'] ?>'>이력서</td>
                                <td><?php echo $apply[$i]['registerDate'] ?></td>
                                <td><select class='class-status'>
                                    <option <?php if($apply[$i]['status']=="채용대기") echo "selected" ?> >채용대기</option>
                                    <option <?php if($apply[$i]['status']=="채용") echo "selected" ?>  >채용</option>
                                    <option <?php if($apply[$i]['status']=="채용거부") echo "selected" ?> >채용거부</option>
                                    <option <?php if($apply[$i]['status']=="취소") echo "selected" ?> >취소</option>
                                </select></td>
                                <td class='class-resultDate'><?php echo $apply[$i]['resultDate'] ?></td>
                            </tr> 
                            <?php 
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

<script src="static/js/apply/apply.js"></script>
<script src="static/vendor/datatables/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
