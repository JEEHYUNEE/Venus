<?php
  include_once('./db/jhDbcon.php');
  include_once 'nav.php';
?>
<link href="static/css/board.css" rel="stylesheet" type="text/css">
<link href="static/css/index.css" rel="stylesheet" type="text/css">
<script src="static/vendor/datatables/jquery.dataTables.min.js"></script>
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <?php
            if($loginType=="admin"){
            include_once('./home/monthVisit.php');
            include_once('./home/yearVisit.php');
            }
            else{

            }
        ?> 
    </div>
</div>
</body>
</html>


