<?php
include_once 'session.php';
include_once 'checkSession.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Venus Admin Page</title>

  <!-- Custom fonts for this template-->
  <link href="static/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="static/css/style.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="static/css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Bootstrap core JavaScript-->
  <script src="static/vendor/jquery/jquery.min.js"></script>
  <script src="static/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="static/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="static/js/sb-admin-2.min.js"></script>


  <!-- Page level custom scripts -->
  <script src="static/js/demo/chart-area-demo.js"></script>
  <script src="static/js/demo/chart-pie-demo.js"></script>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <!-- 사이드바 맨 위 제목 -->
        <div class="sidebar-brand-text mx-3">Venus Admin</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Home</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <!-- <div class="sidebar-heading">
        Interface
      </div> -->
      <?php if($loginType=="admin"){ ?>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdmin" aria-expanded="true"
          aria-controls="collapseAdmin">
          <i class="fas"></i>
          <!-- 상단메뉴 -->
          <span>관리자 관리</span>
        </a>
        <div id="collapseAdmin" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!-- 하단메뉴 -->
            <!-- <h6 class="collapse-header">Custom Components:</h6> -->
            <a class="collapse-item" href="admin-authority.php">관리자권한관리</a>
            <a class="collapse-item" href="admin-form.php">관리자정보등록</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMember" aria-expanded="true"
          aria-controls="collapseMember">
          <i class="fas"></i>
          <!-- 상단메뉴 -->
          <span>개인회원관리</span>
        </a>
        <div id="collapseMember" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!-- 하단메뉴 -->
            <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
            <a class="collapse-item" href="member.php">개인회원관리</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collpaseMemberEnter"
          aria-expanded="true" aria-controls="collpaseMemberEnter">
          <i class="fas "></i>
          <!-- 상단메뉴 -->
          <span>기업회원관리</span>
        </a>
        <div id="collpaseMemberEnter" class="collapse" aria-labelledby="headingUtilities"
          data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!-- 하단메뉴 -->
            <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
            <a class="collapse-item" href="company.php">기업회원관리</a>
            <a class="collapse-item" href="uptae.php">업태/업종관리</a>
            <a class="collapse-item" href="jikjong.php">직종관리(구인분야)</a>
            <a class="collapse-item" href="buseo.php">부서관리</a>
          </div>
        </div>
      </li>

      <?php  }?>
      <?php if($loginType=="company"){ ?>
        <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collpaseMemberEnter"
          aria-expanded="true" aria-controls="collpaseMemberEnter">
          <i class="fas "></i>
          <!-- 상단메뉴 -->
          <span>기업관리</span>
        </a>
        <div id="collpaseMemberEnter" class="collapse" aria-labelledby="headingUtilities"
          data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!-- 하단메뉴 -->
            <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
            <a class="collapse-item" href="company-form.php?id=<?php echo $login ?>">기업관리</a>
          </div>
        </div>
      </li>
      <?php }?>
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collpaseRegularMember"
          aria-expanded="true" aria-controls="collpaseRegularMember">
          <i class="fas"></i>
          <!-- 상단메뉴 -->
          <span>정규회원관리</span>
        </a>
        <div id="collpaseRegularMember" class="collapse" aria-labelledby="headingUtilities"
          data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!-- 하단메뉴 -->
            <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
            <a class="collapse-item" href="regular-member.php">정규회원정보관리</a>
            <a class="collapse-item" href="salary-excel.php">급여데이터등록(일괄)</a>
            <?php if($loginType=="admin") {?>
            <a class="collapse-item" href="salary.php">급여이름관리</a><?php }?>
          </div>
        </div>
      </li>


      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collpaseJobInfo"
          aria-expanded="true" aria-controls="collpaseJobInfo">
          <i class="fas"></i>
          <!-- 상단메뉴 -->
          <span>구인정보관리</span>
        </a>
        <div id="collpaseJobInfo" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!-- 하단메뉴 -->
            <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
            <a class="collapse-item" href="./jobInfo.php">구인정보관리</a>
            <a class="collapse-item" href="./jobInfo-form.php">구인정보등록</a>
            <a class="collapse-item" href="./apply-status.php">지원현황관리</a>
            <?php  if($loginType=="admin"){?>
            <a class="collapse-item" href="./jobinfo-request.php">구인의뢰관리</a>
            <?php }?>
          </div>
        </div>
      </li>
      <?php  if($loginType=="admin"){ ?>
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collpaseCommunity"
          aria-expanded="true" aria-controls="collpaseCommunity">
          <i class="fas"></i>
          <!-- 상단메뉴 -->
          <span>커뮤니티관리</span>
        </a>
        <div id="collpaseCommunity" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!-- 하단메뉴 -->
            <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
            <a class="collapse-item" href="./faq.php">FAQ관리</a>
            <a class="collapse-item" href="./qna.php">Q&A관리</a>
            <a class="collapse-item" href="./notice.php">공지사항관리</a>
            <a class="collapse-item" href="./news.php">취업뉴스관리</a>
          </div>
        </div>
      </li>

      
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collpaseSupport"
          aria-expanded="true" aria-controls="collpaseSupport">
          <i class="fas"></i>
          <!-- 상단메뉴 -->
          <span>고객지원관리</span>
        </a>
        <div id="collpaseSupport" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!-- 하단메뉴 -->
            <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
            <a class="collapse-item" href="./consult.php">상담및불편신고관리</a>
            <a class="collapse-item" href="./certificate.php">증명서발급신청관리</a>
          </div>
        </div>
      </li>
      
      <?php  }?>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="logout.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>로그아웃</span></a>
      </li>

      <!-- Divider -->
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
      <!-- Nav Item - Dashboard -->
      <!-- <li class="nav-item active">
        <a class="nav-link">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>로그인상태[ <?php echo $login.$loginType ?> ]</span></a>
      </li> -->

      <li class="nav-item active">
        <a class="nav-link" href="/venus/index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Go To Front</span></a>
      </li>

  

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <!-- <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div> -->

    </ul>
    <!-- End of Sidebar -->