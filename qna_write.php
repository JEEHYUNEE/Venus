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
                <div class="row justify-content-center mt-1 mb-4">
                    <div id="news" class="col-md-8 mt-1 text-center heading-section ftco-animate fadeInUp ftco-animated">
                        <span class="subtitle">question and answer</span>
                        <h2>Q&A</h2>
                    </div>
                </div>             
                <div id="board_read" class="text-center">
                    <!-- 글 쓰기 -->
                    <form action="./db/qna/qnaWriteOk.php" method="post"  enctype="multipart/form-data">
                        <input type="hidden" name="user" value="<?php echo $user; ?>">
                        <div class="mb-1">
                            <spna>--------------------------------&nbsp;&nbsp;&nbsp;</span>
                            <spna>Title</spna>
                            <spna>&nbsp;&nbsp;&nbsp;--------------------------------</span>
                        </div>
                        <div class="m-auto p-2"><input class="col-md-4" name="title"/></div>
                        <div class="mb-1 mt-4">
                            <spna>-------------------------------&nbsp;&nbsp;&nbsp;</span>
                            <spna>Content</spna>
                            <spna>&nbsp;&nbsp;&nbsp;-------------------------------</span>
                        </div>
                        <div class="m-auto p-2"><textarea class="col-md-4" name="content" rows="15"></textarea></div>
                        <input class="col-md-2" type="file" name="fileToUpload"/>
                        <hr class="col-md-4 mt-5">
                        <button class="bg-dark text-white pt-1 pb-1 pl-4 pr-4">등록</button>
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
    //댓글 등록
    function replyRegister(e){
        var reply=document.getElementById('registerForm').value;
        var id=<?php echo $user?>;
        var faq_num=<?php echo $num?>;
        alert(id);
        $.ajax({ //수정된 타입과 index 전달
                    type:"POST",
                    url: "./db/faq/faqReplyRegister.php",
                    data: {reply:reply,id:id,faq_num:faq_num},
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
        if(user==<?php echo $user?>){
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
                    url: "./db/faq/faqReplyModify.php",
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
        if(user==<?php echo $user?>){
            $.ajax({ //댓글번호 전달
                    type:"POST",
                    url: "./db/faq/faqReplyDelete.php",
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