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
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/draw res.css">
    <title>نتائج القرعة
    </title>


</head>


<body>
    <header>
        <img src="../my-project/imgs/nadi.jpg" id="pic">
        <img style="    margin-top: 114px;"
         src="../my-project/imgs/sudan-national-football-team-sudan-football-association-africa-cup-of-nations-algeria-national-football-team-football-dfac87a17a770f32346a6773934aff99.png">
        <div id="h2head">
            <h2>الاتحاد السوداني للكرة القدم</h2>
            <h2>Sudan Football Assocation</h2>
            <a href="main.php" style="position: relative;
    top: -4rem;
    right: 80rem;">
              <button class="btn btn-primary">لوحة التحكم</button>
            </a>
        </div>
    </header>

    <div class="container">


        <h1>نتائج القرعة</h1>
        <!-- *************************************************************************************************************************************** -->
 
        <h1 style="color: red;
    margin-top: 5px;">الجولة الثالثة</h1>
        <!-- ****************************************************************************************************** -->
        <div dir="rtl" class="card-body">
  <div dir="rtl" class="container" style="    margin-top: -13rem">
    <a href="draw_res.php">
      <button class="btn btn-success">الجولة الاولى</button>
    </a>
    <a href="draw_res _02.php">
      <button class="btn btn-success">الجولة الثانية</button>
    </a>
    <a href="draw_res _03.php">
      <button class="btn btn-warning">الجولة الثالثة</button>
    </a>
    <!-- <a href="round_4.php">
      <button class="btn btn-success">الجولة الرابعة</button>
    </a>
    <a href="round_5.php">
      <button class="btn btn-success">الجولة الخامسة</button>
    </a> -->
</div>
</div>
        <!-- ****************************************************************************************************** -->
    <div class="container">

        <!-- *************************************************************************************************************************************** -->
 <?php
//جلب بيانات الجولة الاولى
$sql="SELECT * FROM `league` WHERE `round_id` = 3";
$stmt_admin_info = $con->prepare("$sql");
$stmt_admin_info->execute(array());
$ru_info = $stmt_admin_info->fetch();

//جلب يوم القرعة
$sqlrr="SELECT `ra_date` FROM `rand_time`";
$stmt_admin_inforr = $con->prepare("$sqlrr");
$stmt_admin_inforr->execute(array());
$gdate = $stmt_admin_inforr->fetch();
$gdate = $gdate['ra_date'];
 ?>
        <div dir="rtl" class="card-body">
        <div dir="rtl" class="container" style="    width: 61rem;">
  <table dir="rtl" class="table table-bordered">
    <thead>
      <tr>
        <th> #</th>
        <th> المباراة</th>
   
        <th>  الحكم</th>
     <th>  الملعب</th>
     <th style="    width: 124px;">  التاريخ</th>
     <th style="    width: 124px;">  الزمن</th>
   </tr>
 </thead>
 <tbody dir="rtl">
  
   <tr>
   <td> 1 </td>
     <td><?php echo $ru_info['match_1'] ?></td>
   
     <td> <?php echo $ru_info['ref2'] ?> </td>
     <td> <?php echo $ru_info['st1'] ?> </td>
     <td> <?php echo date('Y-m-d', strtotime($gdate. ' + 21 days'));  ?> </td>
     <td>الثامنة مساءً </td>
   </tr>
   <tr>
   <td> 2 </td>

     <td><?php echo $ru_info['match_2'] ?></td>
   
     <td> <?php echo $ru_info['ref2'] ?> </td>
     <td> <?php echo $ru_info['st2'] ?> </td>
     <td> <?php echo date('Y-m-d', strtotime($gdate. ' + 22 days'));  ?> </td>
     <td>الثامنة مساءً </td>
      </tr>

      <tr>
   
     
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