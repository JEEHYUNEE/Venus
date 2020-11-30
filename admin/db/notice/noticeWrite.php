<!doctype html>
    <?php include_once($_SERVER['DOCUMENT_ROOT']."/venus/admin/db/head.php");?>
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
        <h1 class="h3 mb-2 text-gray-800 mt-5">공지사항작성</h1>
        <p class="mb-3">공지사항을 작성하는 공간입니다.</p>
            <div id="write_area">
                <form action="./noticeWriteOk.php" method="post">
                    <div id="in_title">
                        <textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required></textarea>
                    </div>
                    <div id="in_content">
                        <textarea id='id-contents' name="content" id="ucontent" rows="17" cols="55" placeholder="내용" required></textarea>
                    </div>
                    <div class="bt_se">
                        <button type="submit">글 작성</button>
                    </div>
                </form>
            </div>
        </div>
        <script>$(document).ready(function() {
  $('#id-contents').summernote();
});
</script>
    </body>
</html>