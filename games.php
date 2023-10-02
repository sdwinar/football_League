<?php
include "connect.php";
// $round = 1;
// $sql="SELECT `club_name` FROM `registered_clubs`  WHERE	(`club_case` = 3) ORDER BY RAND LIMIT 1";
// $stmt_admin_info = $con->prepare("$sql");
// $stmt_admin_info->execute(array());
// echo $admin_count = $stmt_admin_info->rowCount();


?>
<!DOCTYPE HTML>

<html>

<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@500&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/games sce.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>جدول المباريات
    </title>


</head>


<body>
    <header>
        <img src="../my-project/imgs/nadi.jpg" id="pic">
        <img src="../my-project/imgs/sudan-national-football-team-sudan-football-association-africa-cup-of-nations-algeria-national-football-team-football-dfac87a17a770f32346a6773934aff99.png">
        <div id="h2head">
            <h2>الاتحاد السوداني للكرة القدم</h2>
            <h2>Sudan Football Assocation</h2>
            <a href="main.php" style="position: relative;
    top: 0rem;
    right: 0rem;">
              <button class="btn btn-primary">لوحة التحكم</button>
            </a>
        </div>
    </header>

    <span style ="font-size: 28px;
    width: 75%;
    position: relative;
    left: 12rem;
    top: 97px;"  class="badge badge-info">جدول مباريات <?php echo $_SESSION['username'] ?></span>

    <div class="container">

        <!-- *************************************************************************************************************************************** -->
 <?php
//جلب بيانات الجولة الاولى
$sql="SELECT * FROM `league` WHERE `round_id` = 1";
$stmt_admin_info = $con->prepare("$sql");
$stmt_admin_info->execute(array());
$ru_info = $stmt_admin_info->fetch();
 ?>
        <div dir="rtl" class="card-body">
  <div dir="rtl" class="container">
  <table dir="rtl" class="table table-bordered">
    <thead>
      <tr>
        <th> #</th>
        <th> الجولة </th>
        <th> المباراة</th>
    </tr>
    </thead>
    <tbody dir="rtl">
     
      <tr>
      <td> 1 </td>
      <td> الاولي</td>
        <td><?php

        //  الفريق في الجولة الاولى
   $this_team = $_SESSION['username'];
$sql="SELECT * FROM `league` WHERE `round_id` = 1 && `match_1` LIKE '%$this_team%'";
$stmt_admin_info = $con->prepare("$sql");
$stmt_admin_info->execute(array());
$ru_info = $stmt_admin_info->fetch();
 $ru_count = $stmt_admin_info->rowCount();

if( $ru_count>0){
    echo $ru_info['match_1'];
}else{

    $this_team = $_SESSION['username'];
    $sql="SELECT * FROM `league` WHERE `round_id` = 1 && `match_2` LIKE '%$this_team%'";
    $stmt_admin_info = $con->prepare("$sql");
    $stmt_admin_info->execute(array());
    $ru_info = $stmt_admin_info->fetch();
    echo $ru_info['match_2'];

}

        
        
        
        
      //  echo $ru_info['match_1'] ?></td>
    
      </tr>

      <tr>
      <td> 2 </td>
      <td> الثانية</td>
        <td><?php

        //  الفريق في الجولة الاولى
   $this_team = $_SESSION['username'];
$sql="SELECT * FROM `league` WHERE `round_id` = 2 && `match_1` LIKE '%$this_team%'";
$stmt_admin_info = $con->prepare("$sql");
$stmt_admin_info->execute(array());
$ru_info = $stmt_admin_info->fetch();
 $ru_count = $stmt_admin_info->rowCount();

if( $ru_count>0){
    echo $ru_info['match_1'];
}else{
    $this_team = $_SESSION['username'];
    $sql="SELECT * FROM `league` WHERE `round_id` = 2 && `match_2` LIKE '%$this_team%'";
    $stmt_admin_info = $con->prepare("$sql");
    $stmt_admin_info->execute(array());
    $ru_info = $stmt_admin_info->fetch();
    echo $ru_info['match_2'];

}

        
        
        
        
      //  echo $ru_info['match_1'] ?></td>
    
      </tr>

      <tr>
      <td> 3 </td>
      <td> الثالثة</td>
        <td><?php

        //  الفريق في الجولة الاولى
   $this_team = $_SESSION['username'];
$sql="SELECT * FROM `league` WHERE `round_id` = 3 && `match_1` LIKE '%$this_team%'";
$stmt_admin_info = $con->prepare("$sql");
$stmt_admin_info->execute(array());
$ru_info = $stmt_admin_info->fetch();
 $ru_count = $stmt_admin_info->rowCount();

if( $ru_count>0){
    echo $ru_info['match_1'];
}else{

    $this_team = $_SESSION['username'];
    $sql="SELECT * FROM `league` WHERE `round_id` = 3 && `match_2` LIKE '%$this_team%'";
    $stmt_admin_info = $con->prepare("$sql");
    $stmt_admin_info->execute(array());
    $ru_info = $stmt_admin_info->fetch();
    echo $ru_info['match_2'];

}

        
        
        
        
      //  echo $ru_info['match_1'] ?></td>
    
      </tr>
    
     
   
     
    </tbody>
  </table>
</div>
  </div>
</div>
<!-- ************************************************************************************************************************************ -->



        




<script src="js/poupper.js"></script>
    <script src="js/jquery-3.4.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>