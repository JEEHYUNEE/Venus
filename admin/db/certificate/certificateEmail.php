<!doctype html>
    <?php
            include_once($_SERVER['DOCUMENT_ROOT']."/venus/admin/db/jhDbcon.php");
            include_once($_SERVER['DOCUMENT_ROOT']."/venus/admin/db/head.php");
            $num = $_GET['num']; 
            $sql = mq("select * from certificate where certificateNum='".$num."'");
            $board = $sql->fetch_array();
    ?>
    <body> 
        <form action="./certificateAnswermail.php" method="post" enctype="multipart/form-data">
            <table class="table table-bordered text-black-50" style="font-size:15px;">
                <th class="text-center" colspan="2">증명서 전송</th>
                <input type="hidden" name="num" value=<?php echo $board['certificateNum'];?> readonly style="color:gray; border:0px; width:15px;">
                <tr>
                    <td width="30%">아이디</td>
                    <td width="70%"><?php echo $board['userId']; ?></td>
                </tr>
                <tr>
                    <td>기타사항</td>
                    <td><?php echo $board['etc'];?></td>
                </tr>
                <tr>
                    <td>메일</td>
                    <td><input type="email" name="userEmail" value=<?php echo $board['email'];?> readonly style="border:0px;"></td>
                </tr>
                <tr>
                    <td>첨부파일</td>
                    <?php
                        if($board['situation']=='미처리'){
                    ?>
                        <td><input type="file" name="file" required /></td>
                    <?php
                        }else{
                    ?>
                        <td><?php echo $board['filename'];?></td>
                    <?php       
                        }
                    ?>
                </tr>
                <tr>
                    <?php
                        if($board['situation']=='미처리'){
                    ?>
                        <td class="text-center"colspan="2"><input type="submit" value="전송" style="width:75px;"></td>
                    <?php
                        }else{
                    ?>
                        <td class="text-center"colspan="2"><input type="submit" value="전송완료" disabled style="width:75px;"></td>
                    <?php       
                        }
                    ?>
                </tr>
            </table>
        </form>
    </body>
</html>