<?php
    include_once('header.php');
    include_once('./db/jhDbcon.php');

    if($loginId==null){
        echo "<script>alert('로그인 후 서비스이용이 가능합니다.')</script>";
        echo "<script>location.href='login-regist.php';</script>";
    }
?>
<style>
#page ul li {
    display:inline-block;
    zoom:1;
    display:inline;
    padding:3px;
}
</style>
       <div class="ftco-blocks-cover-1">
            <!--상단 이미지 : 상단 메뉴 및 여자 배경화면-->
            <div class="site-section-cover overlay " data-stellar-background-ratio="0.5 " style="background-image: url('static/img/hero_1.jpg') ">
                <div class="container ">
                    <!--상단 텍스트 :  메뉴이름, 설명-->
                    <div class="row align-items-center justify-content-center text-center ">
                        <div class="col-md-8 mt-5 pt-5 ">
                            <h1 class="mb-3 ">공지사항</h1>
                            <p>사람의 가치를 가꾸어주고 일과 정보를 제공해주는 비너스 컨설팅</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-section bg-light text-center">
            <div> 
                <div class="row justify-content-center mt-2 mb-5">
                    <div id="news" class="col-md-8 mt-5 text-center heading-section ftco-animate fadeInUp ftco-animated">
                        <span class="subtitle">make an announcement</span>
                        <h2 class="mb-4">공지사항</h2>
                    </div>
                </div>
                <table class="col-md-8 text-center table-striped m-auto">
                    <thead>
                        <tr class="bg-dark text-white">
                            <th width="70" class="p-3">번호</th>
                            <th width="500">제목</th>
                            <th width="120">글쓴이</th>
                            <th width="100">작성일</th>
                            <th width="100">조회수</th>
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
                        $sql = mq("select * from notice");

                        $row_num = mysqli_num_rows($sql); //게시판 총 레코드 수
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
                            $sql = mq("select * from notice order by noticeNum desc limit $start_num, $list"); 
                                    while($board = $sql->fetch_array())
                                    {   
                                        $title=$board["title"]; 
                                        $num=$board["noticeNum"];
                                        if(strlen($title)>30)
                                        { 
                                            //title이 30을 넘어서면 ...표시
                                            $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
                                        }
                                        echo "<tr>";
                                        echo "<td class='p-2'>".$num."</td>";
                                        echo "<td><a href='./notice_read.php?num=".$num."'>".$title."</a></td>";
                                        echo "<td>관리자</td>";
                                        echo "<td>".$board['date']." </td>";
                                        echo "<td>".$board['hit']." </td>";
                                        echo "</tr>";

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
<?php
    include_once('footer.php');
?>