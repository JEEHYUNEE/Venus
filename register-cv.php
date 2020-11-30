<?php
    include_once('header.php');
?>
<style>
#id-insert:hover{
cursor:pointer;
}
    #header{
        display:none;
    }
    #footer{
        display:none;
    }
</style>
<div class="site-section ">
    <div class="container ">
        <!--메뉴 제목 입력-->
        <div class="row justify-content-center text-center ">
            <div class="col-md-7 mb-5 ">
                <h2>이력서등록</h2>
                <h5 class="subtitle ">자유양식의 이력서를 등록하시면 됩니다</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mb-5 ml-auto mr-auto">
                <form action="#" method="post">
                    <input id='id-memberId' type="text" value="<?php echo $loginId ?>" hidden >
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id='id-cvName' placeholder="이력서제목" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <!-- <label for="ex_file">업로드</label> -->
                            <input type="file" id="id-cv">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-1 ml-auto mr-auto">
                            <input id="id-insert" class="btn btn-block btn-primary text-white py-3 px-5" value="REGISTER">
                        </div>
                    </div>
                    <div class="form-group row" >
                        <div class="col-md-12 ml-auto mr-auto" style="text-align:center;">
                            <a href="/venus/files/cv/cv.hwp" download >이력서표준양식다운로드</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="static/js/cv/insert-cv.js"></script>
<?php
    include_once('footer.php');
?>