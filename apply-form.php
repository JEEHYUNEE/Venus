<?php
    include_once('header.php');
    include_once('db/cv/getCV.php');
?>
<style>
    ul li {
        display: inline-block;
        zoom: 1;
        display: inline;
        padding: 3px;
    }

    #header {
        display: none;
    }

    #footer {
        display: none;
    }
</style>
<div class="site-section ">
    <div class="container ">
        <!--메뉴 제목 입력-->
        <div class="row justify-content-center text-center ">
            <div class="col-md-7 mb-5 ">
                <h2>지원하기</h2>
                <h5 class="subtitle ">하나 이상의 이력서를 선택해주세요.</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-5 ml-auto mr-auto">
                <table class="col-md-9 text-center table-striped m-auto">
                    <thead>
                        <tr class="bg-dark text-white">

                            <th width="50" class="p-3"><input type='checkbox' disabled></th>
                            <th width="50" hidden>번호</th>
                            <th width="100">이력서제목</th>
                            <th width="100">등록일</th>
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

                        $cv=getCV($loginId);

                        $row_num = sizeof($cv); //게시판 총 레코드 수
                        $list = 5; //한 페이지에 보여줄 개수
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
                            for($i=0;$i<sizeof($cv2=getCV_limit($loginId, $start_num, $list));$i++){
                                echo "<tr class='class-jobinfo'>";
                                echo "<td><input class='class-checkbox' type='checkbox'></td>";
                                echo "<td class='cvId' hidden>".$cv2[$i]['cvId']."</td>";
                                echo "<td><a href=".$cv2[$i]['cvPath']." download>".$cv2[$i]['cvName']."</a></td>";
                                echo "<td>".$cv2[$i]['date']."</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
                <!---페이징 넘버 --->
                <div class='mt-5 mb-5'>
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
                                $pre = $page - 1; //pre변수에 page-1을 해준다 만약 현재 페이지가 3인데 이전버튼을 누르면 2번페이지로 갈 수 있게 함
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
                <div class="form-group row">
                        <div class="col-md-8 ml-auto mr-auto">
                            <input type="button" id="id-apply" class="btn btn-block btn-primary text-white py-3 px-5" value="지원하기">
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
<script>
        document.getElementById('id-apply').addEventListener('click',function(){
        var formData = new FormData();
        var checkId=null;
        var check=0;
        for(var i=0;i<document.getElementsByClassName('class-checkbox').length;i++){
                if(document.getElementsByClassName('class-checkbox')[i].checked==true){
                    check++;
                    checkId = document.getElementsByClassName('class-checkbox')[i].parentNode.parentNode.children[1].innerHTML;
                }
            }
        

        if(check>1 || check==0){
            alert("하나의 이력서를 선택해주세요");
        }else{
            if(confirm("지원하시겠습니까?")){
                formData.append('memberId',"<?php echo $loginId ?>");
                formData.append('cvId',checkId);
                formData.append('jobInfoId',"<?php echo $_GET['id'] ?>");
                $.ajax({
                    url: "/venus/db/apply/insert.php",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (msg) {
                        if (msg == "SUCCESS") {
                        alert("지원이 완료되었습니다..");
                            window.close();
                            opener.location.reload();

                        }
                    }
                });

            }else{

            }
        }
    });
                  
                  

            
</script>
<?php
    include_once('footer.php');
?>