<?php
    include_once('header.php');
    include_once('./db/jhDbcon.php');
?>
<style>
#bo_ser > ul >li{
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
                            <h1 class="mb-3 ">게시판</h1>
                            <p>사람의 가치를 가꾸어주고 일과 정보를 제공해주는 비너스 컨설팅</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-section bg-light text-center">
            <div id='board'>
                <?php
                     $num = $_GET['num']; 
                     $sql = mq("select * from notice where noticeNum='".$num."'");
                     $board = $sql->fetch_array();

                     $hit = $board['hit'];
                     $hitUpdate=$hit+1;
                     $sqlHit = mq("update notice set hit='".$hitUpdate."' where noticeNum='".$num."';");
                ?> 
                <div class="row justify-content-center mt-2 mb-5">
                    <div id="news" class="col-md-8 mt-5 text-center heading-section ftco-animate fadeInUp ftco-animated">
                        <span class="subtitle">MAKE AN ANNOUNCEMENT</span>
                        <h2><?php echo $board['title'];?></h2>
                        <p class='mb-1'><?php echo $board['date'];?></p>
                        <p class='mb-3'>조회:<?php echo $hitUpdate;?></p>
                    </div>
                </div>
                <!-- 글 불러오기 -->
                <div id="board_read">
                    <div id="bo_content" class="col-md-6 m-auto p-5" style="background-color:#00000008;">
                        <?php echo nl2br("$board[content]"); ?>
                    </div>
                    <!-- 목록, 이전글, 다음글 -->
                    <?php
                        $sql = mq("select * from notice");
                        $row_num = mysqli_num_rows($sql);
                        $pre = $num-1;
                        $next = $num+1;
                    ?>

                    <div id="bo_ser" class="mt-5">
                        <ul>
                            <?php
                                if($pre>=1){
                                    echo "<li><a href='./notice_read.php?num=".$pre."#board'>[이전글]</a></li>";
                                }
                            ?>
                            <li><a href="./notice_board.php">[목록으로]</a></li>
                            <?php
                                if($next<=$row_num){
                                    echo "<li><a href='./notice_read.php?num=".$next."#board'>[다음글]</a></li>";
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
<?php
    include_once('footer.php');
?>