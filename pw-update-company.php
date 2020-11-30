<?php
    include_once('header.php');
?>
<style>
    #pw-update-btn :hover{
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
                <h2>비밀번호변경</h2>
                <h5 class="subtitle ">비밀번호를 변경할 수 있는 화면입니다.</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mb-5 ml-auto mr-auto">
                <form action="#" method="post">
                    <input id='update-companyId' type="text" value="<?php echo $_GET['id'] ?>" hidden >
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id='update-pw' placeholder="비밀번호" type="password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-1 ml-auto mr-auto">
                            <input id="pw-update-btn" class="btn btn-block btn-primary text-white py-3 px-5" value="REGISTER" readonly>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="static/js/company/pw_update.js"></script>
<?php
    include_once('footer.php');
?>