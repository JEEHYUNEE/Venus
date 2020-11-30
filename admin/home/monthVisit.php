<div class="col-sm-7 mt-4 mr-auto ml-auto">  
            <?php $today=date('Y-m-01');?>
            <h1 class="mb-3 text-center" style=""><?php echo substr($today,0,4);?>년 <?php echo substr($today,5,2);?>월 방문현황  </h1>  
            <!-- Bootstrap table class -->
            <table class="table mt-4 text-center">  
                <thead>  
                    <tr>  
                        <th scope="col" width="60">방문일자</td>  
                        <th scope="col" width="30">방문수</td>  
                        <th scope="col" width="210">비율(%)</td>  
                    </tr>  
                </thead>   
                <tbody> 
                    <?php
                        //해당월 방문수 합계
                        $sql = mq("select * from visit order by date");
                        $row_num= mysqli_num_rows($sql);
                            $total=0;
                            $day=0;
                            while($board = $sql->fetch_array()){
                                if($board['date']>=$today){
                                    $total+=$board['count'];
                                    $day++;
                                }
                            }
                            //해당월 방문수 출력
                            if($day<=0){    
                                echo "<tr>";
                                    echo "<td colspan=3>데이터 없음</td>";
                            echo "</tr>";
                            }else{
                                $sql = mq("select * from visit order by date desc"); 
                                while($board = $sql->fetch_array()){
                                    $visit=($board['count']/$total)*100;//방문비율계산
                                    $width=($visit/210)*1000;//방문비율을 width로 변환
                                    if($board['date']>=$today){
                                        echo "<tr>";
                                            echo "<td>".$board['date']."</td>";
                                            echo "<td>".$board['count']." </td>";
                                            echo "<td class='text-left'> <img src='./static/img/box.jpg' align='LEFT' width='".$width."' height='20' valign='center'/><font class='p-3'><b>".round($visit, 2)."</b></font></td>";
                                        echo "</tr>";
                                    }
                                }
                                $avg=round($total/$day,2);
                        ?>
                            <tr>
                                <th></th>
                                <th><?php echo $total?></th>
                                <th class='text-left'><img src='./static/img/totalBox.jpg' width='<?php echo ($avg/210)*1000;?>' height='20' valign='center'/><span class='p-3'>평균방문수 <?php echo $avg;?></span></th>
                            </tr>
                        <?php } ?>
                </tbody>  
            </table>  
        </div>