<!doctype html>
    <?php
            include_once($_SERVER['DOCUMENT_ROOT']."/venus/admin/db/jhDbcon.php");
            include_once($_SERVER['DOCUMENT_ROOT']."/venus/admin/db/head.php");
            $num = $_GET['num']; 
            $sql = mq("select * from consult where consultNum='".$num."'");
            $board = $sql->fetch_array();
    ?>
    <body> 
        <form action="./consultAnswermail.php" method="post">
            <table class="table table-bordered text-black-50" style="font-size:15px;">
                <th class="text-center" colspan="2">상담/불편문의 답변</th>
                <tr>
                    <td width="30%">이름</td>
                    <td width="70%"><?php echo $board['userName']; ?></td>
                </tr>
                <tr>
                    <td>내용</td>
                    <td><textarea type="text" name="consultContent" readonly style="border:0px; width:100%; height:135px;"><?php echo $board['content'];?></textarea></td>
                </tr>
                <tr>
                    <td>메일</td>
                    <td><input type="email" name="userEmail" value=<?php echo $board['email'];?> readonly style="border:0px;"></td>
                </tr>
                <tr>
                    <td>답변</td>
                    <?php
                        if($board['situation']=='미처리'){
                    ?>
                        <td><textarea type="text" name="consultAnswer" style="border:0px; width:100%; height:135px;" required></textarea></td>
                    <?php
                        }else{
                    ?>
                        <td><textarea type="text" name="consultAnswer" readonly style="border:0px; width:100%; height:135px;"><?php echo $board['answer'];?></textarea></td>
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
    <body>
</html>