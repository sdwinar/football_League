<?php
include "connect.php";

//لتفريغ جدول القرعة
if (isset($_GET['del_leage'])){

    $stmt_insert_tree2 = $con->prepare("DELETE FROM  `league` ");
    $stmt_insert_tree2->execute(array());
  
    $fmsg = "تـمت تفريغ قرعة الدوري  ";
    header('Location: draw.php');
  
  
  }

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
       
        </div>
    </header>


    <h1 style="color: red;
    margin-top: 5px;">لوحة القرعة</h1>
        <!-- ****************************************************************************************************** -->
        <div dir="rtl" class="card-body">
  <div dir="rtl" class="container" style="    margin-top: -13rem">
    <a href="re_time.php">
      <button class="btn btn-success">زمن القرعة </button>
    </a>
    <a href="round_1.php">
      <button class="btn btn-success">إجراء القرعة</button>
    </a>
    <a href="?del_leage">
      <button class="btn btn-success">تفريق القرعة </button>
    </a>
    <a href="rebort_1.php">
      <button class="btn btn-success">تقرير القرعة </button>
    </a>
    <a href="dashboard/dashboard.php">
      <button class="btn btn-success"> رجوع</button>
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