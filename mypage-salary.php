<?php
    include_once('header.php');
    include_once('db/salary/getSalary.php');
    include_once('db/bank/getBank.php');
    include_once('db/member/getMember.php');
    if(isset(isRegularMember($loginId)[0])){
        $rm= isRegularMember($loginId)[0];
    }else{
        echo "<script>alert('정규회원만 확인할 수 있습니다.');</script>";
        echo "<script>location.href='mypage-main.php';</script>";
    }
?>
<link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
<style>
    #page ul li {
        display: inline-block;
        zoom: 1;
        display: inline;
        padding: 3px;
    }

    .history-row{
        cursor:pointer;
    }
</style>

<div class="ftco-blocks-cover-1">
    <!--상단 이미지 : 상단 메뉴 및 여자 배경화면-->
    <div class="site-section-cover overlay " data-stellar-background-ratio="0.5 "
        style="background-image: url('static/img/hero_1.jpg') ">
        <div class="container ">
            <!--상단 텍스트 :  메뉴이름, 설명-->
            <div class="row align-items-center justify-content-center text-center ">
                <div class="col-md-8 mt-5 pt-5 ">
                    <h1 class="mb-3 ">마이페이지</h1>
                    <p>역사와 비전을 지향하는 비너스 컨설팅은 여러분의 미래를 위해서 정보화된 기술력으로</br> 양질의 정보만을 제공할 것 을 약속드립니다.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="site-section bg-light text-center">
    <div>
        <div class="row justify-content-center mt-2 mb-5">
            <div id="news" class="col-md-8 mt-5 text-center heading-section ftco-animate fadeInUp ftco-animated">
                <span class="subtitle">Salary History</span>
                <h2 class="mb-4">급여내역</h2>
                <div class="form-group row">
                    <div class="col-md-10" ></div>
                    <div class="col-md-2" >
                        <a  class='btn btn-block btn-primary text-white pl-1 py-1 px-0'id='id-show-account' >계좌번호</a>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-10" ></div>
                    <div class="col-md-2" > <span class="subtitle">계좌 정보를 입력해야 월급을<br/> 받으실 수 있습니다.</span></div>
                </div>
                <div id='account-field' class="form-group row" hidden="hidden">
                    <div class="col-md-5"></div>
                    <div class="col-md-2">
                        <input id='id-accountHolder'  type="text" class="form-control" placeholder="예금주" value="<?php echo $rm['accountHolder']?>">
                    </div>
                    <div class="col-md-2">
                        <select id="id-bankName"  class="form-control" >
                            <?php for($i=0;$i<sizeof($bank=getBank());$i++){ ?>
                            <option <?php if($bank[$i]['bankName']==$rm['bankName']) echo "selected" ?>  ><?php echo $bank[$i]['bankName'] ;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <input id="id-account"  type="text" class="form-control" placeholder="계좌번호" value="<?php echo $rm['account'] ?>" >
                    </div>
                    <div class="col-md-1" >
                        <input type="button" id="id-edit" class="btn btn-block btn-primary text-white pl-1 py-1 px-0" value="저장">
                    </div>
                </div>
                
            </div>
        </div>
        <!-- 여기 -->
        <table class="col-md-8 text-center table-striped m-auto">
                    <thead>
                        <tr class="bg-dark text-white">
                            <th width="50" class="p-3" hidden>번호</th>
                            <th width="100" class="p-3">지급년도/월</th>
                            <th width="100">지급액</th>
                            <th width="100">공제액</th>
                            <th width="100">총수령액</th>
                            <th width="100">예금주</th>
                            <th width="200">계좌번호</th>
                        </tr>
                        <tr>
                            <th style="font-size:2px">&nbsp;</th>
                        </tr>
                    </thead>
                    <?php
                        if(isset($_GET['page'])){
                            $page = $_GET['page'];
                        }else{
                            $page = 1;
                        }
                        $history=getSalaryHistory($loginId);
                        $row_num = sizeof($history); //게시판 총 레코드 수
                        $list = 10; //한 페이지에 보여줄 개수
                        $block_ct = 5; //블록당 보여줄 페이지 개수
            
                        $block_num = ceil($page/$block_ct); // 현재 페이지 블록 구하기
                        $block_start = (($block_num - 1) * $block_ct) + 1; // 블록의 시작번호

                        $block_end = $block_start + $block_ct - 1; //블록 마지막 번호                  
                        $total_page = ceil($row_num / $list); // 페이징한 페이지 수 구하기
                        if($block_end > $total_page)$block_end = $total_page; //만약 블록의 마지박 번호가 페이지수보다 많다면 마지박번호는 페이지 수
                        
                        $total_block = ceil($total_page/$block_ct); //블럭 총 개수
                        $start_num = ($page-1) * $list; //시작번호 (page-1)에서 $list를 곱한다.
                    ?>
                    <tbody style="border:1px solid #00000008">
                        <?php
                            // board테이블에서 idx를 기준으로 내림차순해서 5개까지 표시
                            for($i=0;$i<sizeof($history2=getSalaryHistory_limit($loginId, $start_num, $list));$i++){
                                echo "<tr class='history-row'>";
                                echo "<td hidden>".$history2[$i]['historyId']."</td>";
                                echo "<td>".$history2[$i]['year']."/".$history2[$i]['month']."</td>";
                                echo "<td>".$history2[$i]['totalPayment']."</td>";
                                echo "<td>".$history2[$i]['totalDeductible']."</td>";
                                echo "<td>".$history2[$i]['totalSalary']."</td>";
                                echo "<td>".$history2[$i]['accountHolder']."</td>";
                                echo "<td>"."(".$history2[$i]['bankName'].")".$history2[$i]['account']."</td>";
                            }
                        ?>
                    </tbody>
                </table>
                <!---페이징 넘버 --->
                <div id="page" class='mt-5'>
                    <ul class="col-md-8 text-center m-auto p-auto">
                        <?php
                            //첫페이지확인
                            if($page <= 1){ //만약 page가 1보다 작거나 같다면
                                echo "<li>처음</li>";//처음이라는 글자에 빨간색 표시 
                            }else{//아니면
                                echo "<li><a href='?page=1'>처음</a></li>";//처음글자에 1번페이지로 갈 수있게 링크
                            }
                            //이전버튼
                            if($page <= 1){//만약 page가 1보다 작거나 같다면
                                //아무것도 실행하지않음
                            }else{//아니면
                                $pre = $page-1; //pre변수에 page-1을 해준다 만약 현재 페이지가 3인데 이전버튼을 누르면 2번페이지로 갈 수 있게 함
                                echo "<li><a href='?page=$pre'>이전</a></li>"; //이전글자에 pre변수를 링크한다. 이러면 이전버튼을 누를때마다 현재 페이지에서 -1하게 된다.
                            }
                            //현재페이지표시
                            for($i=$block_start; $i<=$block_end; $i++){ 
                                //for문 반복문을 사용하여, 
                                //초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                                if($page == $i){ //만약 page가 $i와 같다면 
                                echo "<li>[ $i ]</li>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                                }else{
                                echo "<li><a href='?page=$i'>[ $i ]</a></li>"; //아니라면 $i
                                }
                            }
                            //다음버튼
                            if($block_num >= $total_block){ //만약 현재 블록이 블록 총개수보다 크거나 같다면
                                //아무것도 실행하지않음
                            }else{
                                $next = $page + 1; //next변수에 page + 1을 해준다.
                                echo "<li><a href='?page=$next'>다음</a></li>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
                            }
                            //마지막페이지확인
                            if($page >= $total_page){ //만약 page가 페이지수보다 크거나 같다면
                                echo "<li>마지막</li>"; //마지막 글자에 긁은 빨간색을 적용한다.
                            }else{
                                echo "<li><a href='?page=$total_page'>마지막</a></li>"; //아니라면 마지막글자에 total_page를 링크한다.
                            }
                        ?>
                    </ul>
                </div>

    </div>
</div>

</table>
<script>
    for(var i=0;i<document.getElementsByClassName('history-row').length;i++){
        document.getElementsByClassName('history-row')[i].addEventListener('click',function(){
            window.open("show-salary-form.php?id="+this.children[0].innerHTML,"proposalComment","width=1000,height=800,resizable=yes,scrollbars=yes,resizable=yes");
        });
    }
    document.getElementById('id-show-account').addEventListener('click',function(){
        if(document.getElementById('account-field').getAttribute('hidden')==null){
            document.getElementById('account-field').setAttribute('hidden',"hidden");
        }else{
            document.getElementById('account-field').removeAttribute('hidden');
        }
       
    });
    document.getElementById('id-edit').addEventListener('click',function(){
        var formData = new FormData();
        formData.append('memberId',"<?php echo $loginId?>");
        formData.append('accountHolder',document.getElementById('id-accountHolder').value);
        formData.append('account',document.getElementById('id-account').value);
        formData.append('bankName',document.getElementById('id-bankName').value);
        $.ajax({
                    url: "/venus/db/regularmember/edit.php",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (msg) {
                        if (msg == "SUCCESS") {
                        alert("계좌정보가 변경 되었습니다..");
                            location.reload();

                        }
                    }
                });
    });
  
</script>
<?php
    include_once('footer.php');
?>