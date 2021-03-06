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
        <h1 class="h3 mb-2 text-gray-800 mt-4">FAQ작성</h1>
        <p class="mb-3">FAQ를 작성하는 공간입니다.</p>
            <div id="write_area">
                <form action="./faqWriteOk.php" method="post"  enctype="multipart/form-data">
                    <div id="in_title">
                        <textarea type="text" name="title" rows="1" cols="55" placeholder="제목" maxlength="100" required></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_content">
                        <textarea type="text" id='id-contents' name="content" rows="17" cols="55" placeholder="내용" required></textarea>
                    </div>
                    <div id="in_file">
                        <input type="file" name="fileToUpload" id="fileToUpload"/>
                    </div>
                    <div class="bt_se">
                        <button type="submit">글 작성</button>
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