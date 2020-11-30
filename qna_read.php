<?php
    include_once('header.php');
    include_once('db/jhDbcon.php');
    $user=$loginId;
?>
<style>
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
                <?php
                     $num = $_GET['num']; 
                     $sql = mq("select * from qna where qnaNum='".$num."'");
                     $board = $sql->fetch_array();
                     $answerCheck=$board['answerCheck'];
                     $hit = $board['hit'];
                     $hitUpdate=$hit+1;
                     $sqlHit = mq("update qna set hit='".$hitUpdate."' where qnaNum='".$num."';");
                ?> 
                <div class="row justify-content-center mt-1 mb-4">
                    <div id="news" class="col-md-8 mt-1 text-center heading-section ftco-animate fadeInUp ftco-animated">
                        <span class="subtitle">question and answer</span>
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
                    <div class="m-2"></div>
                    <div id="bo_content" class="col-md-6 m-auto p-1" style="background-color:#00000008;">
                        <a href="./files/<?php echo $board['file'];?>" download=""><?php echo $board['file'];?></a>
                    </div>
                    <!-- 목록 -->
                    <div id="bo_ser" class="mt-5 mb-0">
                        <ul>
                            <li><a href="./qna_board.php">[목록으로]</a></li>
                        <?php
                            if($answerCheck=='Y'){
                                echo "<li>";
                                echo "<a href='./qna_answer_read.php?num=".$num."'>[답변확인]</a>";
                                echo "</li>";
                            }
                        ?>
                        </ul>
                    </div>
                    <div id="bo_ser" class="mt-0 mb-5">
                        <?php
                            if($user == $board['userId']){
                                echo "<ul>";
                                    echo "<li>";
                                        echo "<a href='./qna_modify.php?num=".$num."'>[수정]</a>";
                                    echo "</li>";
                                    echo "<li>";
                                        echo "<a href='./db/qna/qnaDeleteOk.php?num=".$num."'>[삭제]</a>";
                                    echo "</li>";
                                echo "</ul>";
                            }
                        ?>
                    </div>
                </div>
                <!--댓글 불러오기-->
                <div  class="col-md-6 text-center m-auto" style="border:1px solid #00000008">
                    <h6 class="mb-4 mt-4"><b>댓글목록</b></h6>
                    <table class="col-md-10 text-center m-auto">
                        <thead>
                            <tr>
                                <th style="font-size:2px"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // board테이블에서 idx를 기준으로 내림차순해서 5개까지 표시
                                $sql = mq("select * from qna_reply where qna_num='".$num."'"); 
                                    while($board = $sql->fetch_array())
                                    {   
                                        $num=$board["qna_num"];
                                        echo "<tr>";
                                        echo "<td rowspan='3' width='50' class='p-3'><b>".$board['userId']."</b></td>";
                                        echo "<td width='200' class='p-2 text-left'>".$board['content']." </td>";
                                        echo "<td rowspan='3' width='60'>
                                                <button id='reply-modify-".$board['idx']."-".$board['userId']."' onclick='replyModifyClick(this)'>수정</button>
                                                <button id='reply-delete-".$board['idx']."-".$board['userId']."' onclick='replyDeleteChk(this)'>삭제</button>
                                             </td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                        echo "<td width='150' class='text-left text-black-50' style='font-size:13px;'>".$board['date']." </td>";
                                        echo "</tr>";
                                        echo "<tr class='mb-3'>";
                                        echo "<td id='modify-td-".$board['idx']."' class='text-left m-0' style='width:200px;display:none;'>
                                                <span class='m-0'>▼수정▼</span>
                                                <div class='m-0'>
                                                    <textarea class='modifyform' style='width:145px;' id='modify-input-".$board['idx']."' type='text' name='content' required>".$board['content']."</textarea>
                                                    <a class='modifyform p-1' style='width:45px;' id='modify-btn-".$board['idx']."' onclick='replyModify(this)'>확인</a>
                                                </div>
                                             </td>";
                                        echo "</tr>";
                                    }
                            ?>
                        </tbody>
                    </table>
                    <div class='mt-4'>
                        <textarea id='registerForm' class='registerform' style='width:450px;'  type='text' name='content' placeholder="내용을 입력해주세요." required></textarea>
                        <button class='registerform pt-3 pb-3' style='width:55px;' onclick='replyRegister(this)'>등록</button>
                    </div>
                    <p class="mb-4"></p>
                </div>
            </div>
</div>
<script>
    //댓글 등록
    function replyRegister(e){
        var reply=document.getElementById('registerForm').value;
        var id="<?php echo $user?>";
        var qna_num=<?php echo $num?>;
        //alert(id);
        $.ajax({ //수정된 타입과 index 전달
                    type:"POST",
                    url: "./db/qna/qnaReplyRegister.php",
                    data: {reply:reply,id:id,qna_num:qna_num},
                    success: function(result){
                        //alert(result);
                        location.reload();
                    }
            })
    }
    //수정 전, 아이디 확인
    function replyModifyClick(e){
        var id=e.id.split('-')[2];
        var user=e.id.split('-')[3];
        if(user=="<?php echo $user?>"){
            if(document.getElementById('modify-td-'+id).style.display=='block'){
                document.getElementById('modify-td-'+id).style.display='none';
            }else{
                document.getElementById('modify-td-'+id).style.display='block';
            }
        }else{
            alert('아이디가 같지않습니다.')
        }
            
    }
    //댓글 수정
    function replyModify(e){
        var id=e.id.split('-')[2]; 
        var value=document.getElementById('modify-input-'+id).value; 
        $.ajax({ //수정된 텍스트와 댓글번호 전달
                    type:"POST",
                    url: "./db/qna/qnaReplyModify.php",
                    data: {id:id,value:value},
                    success: function(result){
                        location.reload();
                    }
            })
            
    }
     //삭제 확인 
     function replyDeleteChk(e) {
        if(confirm("댓글을 삭제하시겠습니까?") == true){//확인
            replyDelete(e); //삭제
        }else{//취소
            return false; //confirm종료
        }
    }
    //댓글 삭제
    function replyDelete(e){
        var id=e.id.split('-')[2];
        var user=e.id.split('-')[3];
        if(user=="<?php echo $user?>"){
            $.ajax({ //댓글번호 전달
                    type:"POST",
                    url: "./db/qna/qnaReplyDelete.php",
                    data: {id:id},
                    success: function(result){
                        location.reload();
                    }
            })
        }else{
            alert('아이디가 같지않습니다.')
        }
    }
</script>
<?php
    include_once('footer.php');
?>