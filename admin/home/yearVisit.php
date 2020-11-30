<div class="col-sm-7 mt-5 mr-auto ml-auto">  
    <h1 class="mb-3 text-center" style=""> 지난달 방문현황</h1>
        <!-- Bootstrap table class -->
        <table class="table mt-4 text-center">  
            <thead>  
                <tr>  
                    <th scope="col" width="60">년/월</td>  
                    <th scope="col" width="30">평균방문수</td>  
                    <th scope="col" width="210">비율(%)</td>  
                </tr>  
            </thead>   
            <tbody> 
            <?php
                $sql = mq("select * from visit order by date ");
                $row_num= mysqli_num_rows($sql);
                if($row_num>0){
                    //제어변수
                    $total=0;
                    $day=0;
                    //초기값설정
                    $current_month='11';
                    $current_day='2019-11';

                    while($board = $sql->fetch_array()){
                        $month=substr($board['date'],5,2);//month확인
                        if($current_month!=$month){//month가 다르면 출력
                            $visit=($total/$day);//month 평균 방문수 계산
                            $width=($visit/210)*1000;//month 비율 그래프 길이 계산

                            echo "<tr>";
                            echo "<td>".$current_day."</td>";                            
                            echo "<td>".$total." </td>";
                            echo "<td class='text-left'><img src='./static/img/box.jpg' align='LEFT' width='".$width."' height='20' valign='center'/><font class='p-3'><b>".$visit."</b></font></td>";
                            echo "</tr>";

                            $current_day=substr($board['date'],0,7);//년/월 update
                            $current_month=$month;//월 update
                            $total=0;//visit count 초기화
                            $day=0;//day count 초기화
                        }
                        $total+=$board['count'];
                        $day++;
                    }
                    if($total!=0&&$day!=0){//마지막달 출력
                        $visit=($total/$day);
                        $width=($visit/210)*1000;
                        echo "<tr>";
                        echo "<td>".$current_day."</td>";
                        echo "<td>".$total." </td>";
                        echo "<td class='text-left'><img src='./static/img/box.jpg' align='LEFT' width='".$width."' height='20' valign='center'/><font class='p-3'><b>$visit</b></font></td>";
                        echo "</tr>";
                    }
                }else{
                    echo "<tr>";
                        echo "<td colspan=3>데이터 없음</td>";
                     echo "</tr>";
                }
            ?>
            </tbody> 
        </table>  
</div>    