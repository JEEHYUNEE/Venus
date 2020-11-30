<?php
    include_once('header.php');
    include_once('checkSession.php');
    include_once('db/jikjong/getJikjong.php');

?>
<style>
</style>
        <div class="ftco-blocks-cover-1 ">
            <!--상단 이미지 : 상단 메뉴 및 여자 배경화면-->
            <div class="site-section-cover overlay " data-stellar-background-ratio="0.5 " style="background-image: url('static/img/hero_1.jpg') ">
                <div class="container ">
                    <!--상단 텍스트 :  메뉴이름, 설명-->
                    <div class="row align-items-center justify-content-center text-center ">
                        <div class="col-md-8 mt-5 pt-5 ">
                            <h1 class="mb-3 ">Job Information</h1>
                            <p>사람의 가치를 가꾸어주고 일과 정보를 제공해주는 비너스 컨설팅</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--내용입력 :  하얀부분-->
        <div class="site-section ">
            <div class="container ">
                <!--메뉴 제목 입력-->
                <div class="row justify-content-center text-center ">
                    <div class="col-md-7 mb-5 ">
                        <h5 class="subtitle ">Job Information</h5>
                        <h2>직종별 채용정보</h2>
                    </div>
                </div>
                <div class="row justify-content-center text-center">
                    <div class="col-md-3 mb-5">
                    <select id='id-jikjong' class="form-control form-control-title">
                        <?php
                         for($i=0;$i<sizeof($jikjong=getJikjong());$i++){
                        ?>
                            <option id='jikjongId-<?php echo $jikjong[$i]['jikjongId'] ?>'> <?php echo $jikjong[$i]['jikjongName'] ?> </option>
                        <?php
                         }
                        ?>
                    </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-5">
                         <iframe id='id-frame' style="height:450px; border:none;" class="form-control" src="jobinfo-frame-jikjong.php">
                         </iframe>
                    </div>
                </div>
            </div>
        </div>
<script> 

 </script>
<?php
    include_once('footer.php');
?>