<?php
include "connect.php";

 $club = $_POST['club'];

?>
<!DOCTYPE HTML>

<html>

<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/draw res.css">
    <title>تقرير القرعة
    </title>


</head>

<body>
    <!-- ***********************************card w-100********************************************** -->
    <div class="card w-100">
  <div class="card-body" dir="rtl">
    <h5 class="card-title">بسم الله الرحمن الرحيم</h5>
    <div class="row">
        <div class="col-4">
            <div class="imge">
            <img style="position: relative;
    right: 7rem;
    top: -1rem;" src="imgs/logo-removebg.png" width="200px" alt="">
            </div>
        </div>
        <div class="col-4">
        <h3 class="card-title">الإتحاد السوداني لكرة القدم</h3>
        <h4 class="card-title">تقرير مباريات <?php echo $club; ?> الدوري الممتاز  </h4>
        <h4 class="card-title">موسم 2022 - 2023</h4>


        </div>
        <div class="imge">
            <img style="left: -2rem;
    position: relative;
    top: -1rem;" src="imgs/logo-removebg.png" width="200px" alt="">
            </div>
        <div class="col-4"></div>
    </div>
    </hr></br>
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
   $this_team = $club;
$sql="SELECT * FROM `league` WHERE `round_id` = 1 && `match_1` LIKE '%$this_team%'";
$stmt_admin_info = $con->prepare("$sql");
$stmt_admin_info->execute(array());
$ru_info = $stmt_admin_info->fetch();
 $ru_count = $stmt_admin_info->rowCount();

if( $ru_count>0){
    echo $ru_info['match_1'];
}else{

    $this_team = $club;
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
   $this_team = $club;
$sql="SELECT * FROM `league` WHERE `round_id` = 2 && `match_1` LIKE '%$this_team%'";
$stmt_admin_info = $con->prepare("$sql");
$stmt_admin_info->execute(array());
$ru_info = $stmt_admin_info->fetch();
 $ru_count = $stmt_admin_info->rowCount();

if( $ru_count>0){
    echo $ru_info['match_1'];
}else{
    $this_team = $club;
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
   $this_team = $club;
$sql="SELECT * FROM `league` WHERE `round_id` = 3 && `match_1` LIKE '%$this_team%'";
$stmt_admin_info = $con->prepare("$sql");
$stmt_admin_info->execute(array());
$ru_info = $stmt_admin_info->fetch();
 $ru_count = $stmt_admin_info->rowCount();

if( $ru_count>0){
    echo $ru_info['match_1'];
}else{

    $this_team = $club;
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

  <!-- ************************************************************************************************************************************ -->

  <a href="#" class="btn btn-primary prent">طـباعة</a>
  </div>
</div>
    <!-- ************************************card w-100********************************************* -->

    
<script src="js/poupper.js"></script>
    <script src="js/jquery-3.4.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $(".prent").on("click",function(){
            print()
        })
    </script>
</body>
