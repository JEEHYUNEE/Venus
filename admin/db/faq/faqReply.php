<!doctype html>
    <?php 
        include_once($_SERVER['DOCUMENT_ROOT']."/venus/admin/db/jhDbcon.php");
        include_once($_SERVER['DOCUMENT_ROOT']."/venus/admin/db/head.php");
        $num = $_GET['num']; 
    ?>
    </head>
    <body>
        <div id="board_write" class="text-center">
        <h1 class="h3 mb-2 text-gray-800 mt-3">FAQ 댓글관리</h1>
        <p class="mb-5">FAQ 댓글 수정/삭제가 가능한 공간입니다.</p>
            <div class="reply_view">
                <?php
                    $sql = mq("select * from faq_reply where faq_num='".$num."' order by idx desc");
                    while($board = $sql->fetch_array()){ 
                ?>
                    <form method="post">
                        <input type="hidden" name="idx" value="<?php echo $board['idx']; ?>" />
                        <div><b><?php echo $board['userId'];?></b></div>
                        <div id="in_title">
                            <textarea name="content" rows="3" cols="55" required><?php echo $board['content'];?></textarea>
                        </div>
                        <div class="rep_me dap_to"><?php echo $board['date']; ?></div>
                        <div class="bt_se">
                            <input type="submit" value="수정" formaction='./faqReplyModifyOk.php'>
                            <input type="submit" value="삭제" formaction='./faqReplyDeleteOk.php'>
                        </div>
                        <hr/>
                    </form>
                <?php } ?>
            </div>
        </div>
    </body>
</html>