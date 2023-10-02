<?php
include "connect.php";

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
        <h4 class="card-title">تقرير قرعة الدوري الممتاز </h4>
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
           <!-- *************************************************************************************************************************************** -->
 <?php
//جلب بيانات الجولة الاولى
$sql="SELECT * FROM `league` WHERE `round_id` = 1";
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
  <table dir="rtl" class="table table-bordered">
  <thead>
      <tr>
      <th>         </th> 
      <th style="font-size: 21px;">  الجولة الاولى      </th> 
      <th>         </th> 
      </tr>
    </thead>
    <thead>
      <tr>
        <th> #</th>
        <th> المباراة</th>
     
        <th>  الحكم</th>
     <th>  الملعب</th>
     <th style="    width: 124px;">  التاريخ</th>
     <th style="    width: 124px;">  الزمن</th>      </tr>
    </thead>
    <tbody dir="rtl">
     
      <tr>
      <td> 1 </td>
        <td><?php echo $ru_info['match_1'] ?></td>
      
        <td> <?php echo $ru_info['ref1'] ?> </td>
        <td> <?php echo $ru_info['st1'] ?> </td>
     <td> <?php echo date('Y-m-d', strtotime($gdate. ' + 7 days'));  ?> </td>
     <td>الثامنة مساءً </td>
      </tr>
      <tr>
      <td> 2 </td>

        <td><?php echo $ru_info['match_2'] ?></td>
      
        <td> <?php echo $ru_info['ref2'] ?> </td>
        <td> <?php echo $ru_info['st2'] ?> </td>

        <td> <?php echo date('Y-m-d', strtotime($gdate. ' + 8 days'));  ?> </td>
     <td>الثامنة مساءً </td>
      </tr>

      <tr>
   
     
    </tbody>
  </table>
<!-- ************************************************************************************************************************************ -->
           <!-- *************************************************************************************************************************************** -->
           <?php
//جلب بيانات الجولة الثانية
$sql="SELECT * FROM `league` WHERE `round_id` = 2";
$stmt_admin_info = $con->prepare("$sql");
$stmt_admin_info->execute(array());
$ru_info = $stmt_admin_info->fetch();
 ?>
 </hr></br>
  <table dir="rtl" class="table table-bordered">
  <thead>
      <tr>
      <th>         </th> 
      <th style="font-size: 21px;">  الجولة الثانية      </th> 
      <th>         </th> 
      </tr>
    </thead>
    <thead>
      <tr>
        <th> #</th>
        <th> المباراة</th>
     
        <th>  الحكم</th>
     <th>  الملعب</th>
     <th style="    width: 124px;">  التاريخ</th>
     <th style="    width: 124px;">  الزمن</th>      </tr>
    </thead>
    <tbody dir="rtl">
     
      <tr>
      <td> 1 </td>
        <td><?php echo $ru_info['match_1'] ?></td>
      
        <td> <?php echo $ru_info['ref1'] ?> </td>
        <td> <?php echo $ru_info['st1'] ?> </td>
     <td> <?php echo date('Y-m-d', strtotime($gdate. ' + 14 days'));  ?> </td>
     <td>الثامنة مساءً </td>
      </tr>
      <tr>
      <td> 2 </td>

        <td><?php echo $ru_info['match_2'] ?></td>
      
        <td> <?php echo $ru_info['ref2'] ?> </td>
        <td> <?php echo $ru_info['st2'] ?> </td>

        <td> <?php echo date('Y-m-d', strtotime($gdate. ' + 15 days'));  ?> </td>
     <td>الثامنة مساءً </td>
      </tr>

      <tr>
   
     
    </tbody>
  </table>
<!-- ************************************************************************************************************************************ -->
           <!-- *************************************************************************************************************************************** -->
           <?php
//جلب بيانات الجولة الثالثة
$sql="SELECT * FROM `league` WHERE `round_id` = 3";
$stmt_admin_info = $con->prepare("$sql");
$stmt_admin_info->execute(array());
$ru_info = $stmt_admin_info->fetch();
 ?>
 </hr></br>
  <table dir="rtl" class="table table-bordered">
  <thead>
      <tr>
      <th>         </th> 
      <th style="font-size: 21px;">  الجولة الثالثة      </th> 
      <th>         </th> 
      </tr>
    </thead>
    <thead>
      <tr>
        <th> #</th>
        <th> المباراة</th>
     
      
        <th>  الحكم</th>
     <th>  الملعب</th>
     <th style="    width: 124px;">  التاريخ</th>
     <th style="    width: 124px;">  الزمن</th>      </tr>
    </thead>
    <tbody dir="rtl">
     
      <tr>
      <td> 1 </td>
        <td><?php echo $ru_info['match_1'] ?></td>
      
        <td> <?php echo $ru_info['ref1'] ?> </td>
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
