<!doctype html>
<?php  include_once($_SERVER['DOCUMENT_ROOT']."/venus/admin/db/head.php");
include_once('db/jobinfo-request/getJobInfoRequest.php');
$jobinfo = getJobInfoRequestById($_GET['id'])[0];
?>
<body>
    <div id="board_write" class="text-center">
        <h1 class="h3 mb-2 text-gray-800 mt-4">구인의뢰확인</h1>
        <p class="mb-5">구인의뢰 수정/삭제가 가능한 공간입니다.</p>
            <div id="write_area">
                <form method="post">
                    <input type="hidden" name="id" value="<?php echo $jobinfo['jrId'] ?>">
                    <div id="in_title">
                        <textarea id='id-title' type="text" name="title" rows="1" cols="55" required><?php echo $jobinfo['title'] ?></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_content">
                        <textarea id='id-contents' type="text" name="content" rows="17" cols="55" required><?php echo $jobinfo['contents'] ?></textarea>
                    </div>
                    <div class="bt_se m-2 mb-3">
                        <input type="submit" value="수정" formaction='./db/jobinfo-request/modify.php'>
                        <input type="submit" value="삭제" formaction='./db/jobinfo-request/delete.php'>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>