<?php
    include_once('header.php');
    include_once('checkSession.php');
    include_once('db/jobInfo/getJobInfo.php');
    include_once('db/apply/getApply.php');
    include_once('checkSession.php');
    $id=$_GET['id'];
    $jobinfo=getJobInfoById($id);
?>
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
    .form-control{
        height: fit-content;
    }
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
                        <h2>채용정보</h2>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2 mb-4 mb-lg-0">
                        <div class="form-control form-control-title">회사명(코드)</div>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" value="<?php echo $jobinfo['companyName']."(".$jobinfo['companyCode'].")" ?>" disabled>
                   </div>
                   
                </div>
                <div class="form-group row">
                    <div class="col-md-2 mb-4 mb-lg-0">
                        <div class="form-control form-control-title">근무처-근무지</div>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" value = "<?php echo $jobinfo['workPosition']."-".$jobinfo['workPlace'] ?>" disabled>
                   </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2 mb-4 mb-lg-0">
                        <div class="form-control form-control-title">지역</div>
                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control" value="<?php echo $jobinfo['region']?>" disabled> 
                   </div>
                   <div class="col-md-5">
                        <input type="text" class="form-control" value="<?php echo $jobinfo['subRegion']?>" disabled>
                   </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2 mb-4 mb-lg-0">
                        <div class="form-control form-control-title">직종</div>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" value="<?php echo $jobinfo['jikjongName']?>" disabled>
                   </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2 mb-4 mb-lg-0">
                        <div class="form-control form-control-title">채용인원</div>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control"  value="<?php echo $jobinfo['applyNumber']."명"?>" disabled>
                   </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2 mb-4 mb-lg-0">
                        <div class="form-control form-control-title" >마감일자</div>
                    </div>
                    <div class="col-md-10">
                        <input type="date" class="form-control"  value="<?php echo $jobinfo['dueDate']?>" disabled>
                   </div>
                </div>
                <div class="form-group row">
                    <div  class="col-sm-12 mb-3 mb-sm-0" >
                        <div class="form-control">
                            <?php echo $jobinfo['contents'] ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2 mb-4 mb-lg-0">
                        <div class="form-control form-control-title" >담당자명</div>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" value="<?php echo $jobinfo['managerName']?>" disabled>
                   </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2 mb-4 mb-lg-0">
                        <div class="form-control form-control-title" >담당자이메일</div>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" value="<?php echo $jobinfo['managerEmail']?>"disabled >
                   </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2 mb-4 mb-lg-0">
                        <div class="form-control form-control-title" >담당자연락처</div>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" value="<?php echo $jobinfo['managerPhone']?>"disabled >
                   </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2 ml-auto mr-auto">
                        <input type="button" id="id-apply" class="btn btn-block btn-primary text-white py-3 px-5" value="지원"
                        <?php if(sizeof(isApply($id, $loginId))!=0) echo "disabled"; ?>>
                    </div>   
                </div>
                <div class="form-group row">
                    <div class="col-md-1 ml-auto mr-auto">
                        <a href="jobInfo-region.php">목록으로</a>
                    </div>   
                </div>
            </div>
        </div>
<script>
//  window.open("show-salary-form.php?id="+this.children[0].innerHTML,"proposalComment","width=1000,height=800,resizable=yes,scrollbars=yes,resizable=yes");
document.getElementById('id-apply').addEventListener('click',function(){
    window.open("apply-form.php?id="+<?php echo $id?>,"proposalComment","width=600,height=600,resizable=yes,scrollbars=yes,resizable=yes");
});
</script>
<?php
    include_once('footer.php');
?>