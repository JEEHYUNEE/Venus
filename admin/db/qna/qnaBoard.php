<!doctype html>
    <?php 
        include_once($_SERVER['DOCUMENT_ROOT']."/venus/admin/db/jhDbcon.php");
        include_once($_SERVER['DOCUMENT_ROOT']."/venus/admin/db/head.php");
        $num = $_GET['num']; 
        $sql = mq("select * from qna where qnaNum='".$num."'");
        $board = $sql->fetch_array();
    ?>
    <!-- <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">-->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>  

<!-- include summernote css/js-->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
<style>
    .note-popover{
      display:none;
    }
    .note-insert{
      display:none;
    }
    .note-toolbar, .panel-heading{
      background-color:#F8F8FF;
    }
</style>
    <body>
        <div id="board_write" class="text-center">
        <h2 class="h3 mb-2 text-gray-800 mt-3">Q&A</h1>
        <p class="mb-3">Q&A 수정/삭제와 답변등록이 가능한 공간입니다.</p>
        <div id="write_area">
            <form method="post">
                    <div id="in_num">
                        <input type="hidden" name="num" value="<?php echo $board['qnaNum']; ?>" />  
                    </div>
                    <div id="in_title">
                        <textarea name="title" rows="1" cols="55" maxlength="100" required><?php echo $board['title'];?></textarea>
                    </div>
                    <div id="in_title">
                        <textarea id='id-contents1' name="content" rows="10" cols="55" required><?php echo $board['content'];?></textarea>
                    </div>
                    <div>
                        파일 : <a href="/venus/files/<?php echo $board['file'];?>" download><?php echo $board['file']; ?></a>
                    </div>
                    <div class="wi_line"></div>
                    <div class="bt_se">
                        <input type="submit" value="수정" formaction='./qnaModifyOk.php'>
                        <input type="submit" value="삭제" formaction='./qnaDeleteOk.php'>
                    </div>
            </form>
        </div>
    </div>
    <hr/>
    <div id="board_write" class="text-center">
             <!--qna답변등록-->
            <?php if($board['answerCheck']=='N'){//답변등록전?>
                <h2 class="h3 mb-2 text-gray-800 mt-4">Q&A 답변등록</h1>
                <p class="mb-3">Q&A 답변을 작성하는 공간입니다.</p>
                <div id="write_area">
                    <form action="./qnaAnswerWriteOk.php" method="post"  enctype="multipart/form-data">
                        <div id="in_num">
                            <input type="hidden" name="num" value="<?php echo $board['qnaNum']; ?>" />  
                        </div>
                        <div id="in_title">
                            <textarea type="text" name="title" rows="1" cols="55" placeholder="제목" maxlength="100" required></textarea>
                        </div>
                        <div class="wi_line"></div>
                        <div id="in_content">
                            <textarea id='id-contents2' type="text" name="content" rows="10" cols="55" placeholder="내용" required></textarea>
                        </div>
                        <div id="in_file">
                            <input type="file" name="fileToUpload" id="fileToUpload"/>
                        </div>
                        <div class="bt_se">
                            <button type="submit">글 작성</button>
                        </div>
                    </form>
                </div>
            <!--qna답변조회-->
            <?php }else if($board['answerCheck']=='Y'){//답변등록후?>
            <?php $sql1 = mq("select * from qna_answer where qna_num='".$num."'");
                  $board1 = $sql1->fetch_array();
            ?>
                <h2 class="h3 mb-2 text-gray-800 mt-4">Q&A 답변</h1>
                <p class="mb-3">Q&A 답변을 수정/삭제하는 공간입니다.</p>
                <div id="write_area">
                    <form method="post">
                        <div id="in_num">
                            <input type="hidden" name="idx" value="<?php echo $board1['idx']; ?>" /> 
                            <input type="hidden" name="num" value="<?php echo $board['qnaNum']; ?>" />  
                        </div>
                        <div id="in_title">
                            <textarea  name="title" rows="1" cols="55" maxlength="100" required><?php echo $board1['title'];?></textarea>
                        </div>
                        <div id="in_title">
                            <textarea id='id-contents2' name="content" rows="10" cols="55" required><?php echo $board1['content'];?></textarea>
                        </div>
                        <div>
                            파일 : <a href="/venus/files/<?php echo $board1['file'];?>" download><?php echo $board1['file']; ?></a>
                        </div>
                        <div class="wi_line"></div>
                        <div class="bt_se">
                            <input type="submit" value="수정" formaction='./qnaAnswerModifyOk.php'>
                            <input type="submit" value="삭제" formaction='./qnaAnswerDeleteOk.php'>
                        </div>
                    </form>
                </div>
            <?php }?>
        </div>
        <script>
        $(document).ready(function() {
  $('#id-contents1').summernote();
});
$(document).ready(function() {
  $('#id-contents2').summernote();
});
</script>
    </body>
</html>