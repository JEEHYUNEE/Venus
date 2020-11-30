<?php
include_once('header.php');
include_once('db/jhDbcon.php');
$user=$loginId;
?>
<style>
#fileButton:hover {
    text-decoration:underline;
    cursor:pointer;
}
#bo_ser > ul >li{
    display:inline-block;
    zoom:1;
    display:inline;
    padding:3px;
}
#dat_edit {
	display:none;
}
.modifyform{
    display:inline-block; 
    vertical-align:middle; 
    height:30px;
}
.registerform{
    display:inline-block; 
    vertical-align:middle; 
    height:60px;
}
</style>
       <div class="ftco-blocks-cover-1">
            <!--상단 이미지 : 상단 메뉴 및 여자 배경화면-->
            <div class="site-section-cover overlay " data-stellar-background-ratio="0.5 " style="background-image:url('static/img/hero_1.jpg') ">
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
                <div class="row justify-content-center mt-1 mb-4">
                    <div id="news" class="col-md-8 mt-1 text-center heading-section ftco-animate fadeInUp ftco-animated">
                        <span class="subtitle">question and answer</span>
                        <h2>Q&A</h2>
                    </div>
                </div>             
                <div id="board_read" class="text-center">
                    <?php
                        $num = $_GET['num']; 
                        $sql = mq("select * from qna where qnaNum='".$num."'");
                        $board = $sql->fetch_array();
                    ?>
                    <!-- 글 쓰기 -->
                    <form action="./db/qna/qnaModifyOk.php" method="post"  enctype="multipart/form-data">
                        <input type="hidden" name="user" value="<?php echo $user; ?>">
                        <input type="hidden" name="num" value="<?php echo $num; ?>">
                        <div class="mb-1">
                            <spna>--------------------------------&nbsp;&nbsp;&nbsp;</span>
                            <spna>Title</spna>
                            <spna>&nbsp;&nbsp;&nbsp;--------------------------------</span>
                        </div>
                        <div class="m-auto p-2"><input class="col-md-4" name="title" value="<?php echo $board['title'];?>"/></div>
                        <div class="mb-1 mt-4">
                            <spna>-------------------------------&nbsp;&nbsp;&nbsp;</span>
                            <spna>Content</spna>
                            <spna>&nbsp;&nbsp;&nbsp;-------------------------------</span>
                        </div>
                        <div class="m-auto p-2"><textarea class="col-md-4" name="content" rows="15"><?php echo $board['content'];?></textarea></div>
                        <?php $fileName = $board['file'];?>
                            <div id="fileUpdate">
                                <input class="col-md-2" type="file" name="fileToUpload"/><br>
                                <a id="fileButton" onclick='fileOrigin(this)'>파일복구</a>
                            </div>
                            <div id="fileOrigin">
                                <a href="./files/<?php echo $fileName;?>" download=""><?php echo $fileName;?></a><br>
                                <a id="fileButton" onclick='fileUpdate(this)'>파일변경</a>
                            </div>
                        <hr class="col-md-4 mt-5">
                        <button class="bg-dark text-white pt-1 pb-1 pl-4 pr-4">수정</button>
                    </form>
                    <!-- 목록 -->
                    <div id="bo_ser" class="mt-5 mb-5">
                        <ul>
                            <li><a href="./qna_board.php">[목록으로]</a></li>
                        </ul>
                    </div>
                </div>
            </div>
</div>
<script>
    window.onload = function() { 
        var file="<?php echo $fileName?>";
        if(file){
            document.getElementById("fileUpdate").style.display='none';
            document.getElementById("fileOrigin").style.display='block';       
        }else{
            document.getElementById("fileUpdate").style.display='block';
            document.getElementById("fileOrigin").style.display='none';   
        }
     }
    //파일변경 선택시,
    function fileUpdate(e){
        document.getElementById("fileUpdate").style.display='block';
        document.getElementById("fileOrigin").style.display='none';            
    }
    //파일복구 선택시,
    function fileOrigin(e){
        document.getElementById("fileUpdate").style.display='none';
        document.getElementById("fileOrigin").style.display='block';            
    }
</script>
<?php
    include_once('footer.php');
?>