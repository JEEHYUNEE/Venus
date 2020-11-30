
  <?php
// include_once 'session.php';
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
  <link href="static/css/login.css" rel="stylesheet" type="text/css">
</head>

<body >
<div class="login-page">
  <div class="form">
      <h3>관리자로그인</h3>
    <form class="login-form">
      <input id="id-admin-adminId" type="text" placeholder="관리자아이디"/>
      <input id="id-admin-password" type="password" placeholder="관리자비밀번호"/>
      <input type="submit" class='form-submit' id="id-admin-login" value="login">
    </form>
    <a href='/venus/index.php'>GO TO FRONT PAGE</a>
  </div>
</div>
  <!-- Page Wrapper -->
  <script src="static/js/login/login.js"></script>
  <script src="static/vendor/jquery/jquery.min.js"></script>
</body> 
</html>