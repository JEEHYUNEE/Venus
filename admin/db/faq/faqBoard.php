<!doctype html>

<?php 
    include_once($_SERVER['DOCUMENT_ROOT']."/venus/admin/db/jhDbcon.php");
    include_once($_SERVER['DOCUMENT_ROOT']."/venus/admin/db/head.php");
    $num = $_GET['num']; 
    $sql = mq("select * from faq where faqNum='".$num."'");
    $board = $sql->fetch_array();
?><!-- <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">-->
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
        <h1 class="h3 mb-2 text-gray-800 mt-3">FAQ</h1>
        <p class="mb-3">FAQ 수정/삭제가 가능한 공간입니다.</p>
            <div id="write_area">
            <form method="post">
                    <div id="in_num">
                        <input type="hidden" name="num" value="<?php echo $board['faqNum']; ?>" />    
                    </div>
                    <div id="in_title">
                        <textarea name="title" rows="1" cols="55" maxlength="100" required><?php echo $board['title'];?></textarea>
                    </div>
                    <div id="in_title">
                        <textarea id='id-contents' name="content" rows="17" cols="55" required><?php echo $board['content'];?></textarea>
                    </div>
                    <div>
                        파일 : <a href="/venus/files/<?php echo $board['file'];?>" download><?php echo $board['file']; ?></a>
                    </div>
                    <div class="wi_line"></div>
                    <div class="bt_se">
                        <input type="submit" value="수정" formaction='./faqModifyOk.php'>
                        <input type="submit" value="삭제" formaction='./faqDeleteOk.php'>
                    </div>
            </form>
            </div>
        </div>
        <script>
        $(document).ready(function() {
        $('#id-contents').summernote();
        });
        </script>
    </body>
</html>