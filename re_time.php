<?php
include "connect.php";

if (isset($_POST['submit'])){

  $ra_date = $_POST['ra_date'];
  $ra_time = $_POST['ra_time'];


  //جلب بيانات زمن اقرعة
$sqlr ="SELECT * FROM `rand_time`";
$stmt_admin_infore = $con->prepare("$sqlr");
$stmt_admin_infore->execute(array());
$time_info = $stmt_admin_infore->fetch();
$ru_infore = $stmt_admin_infore->rowCount();
if($ru_infore == 0){
  $sss = "INSERT INTO `rand_time` (`ra_date`,`ra_time`)
  VALUES ('$ra_date','$ra_time')";
  $stmt_admin_infore = $con->prepare("$sss");
  $stmt_admin_infore->execute(array());

}else{

  $sss = "UPDATE `rand_time` SET `ra_date` = ? , `ra_time` = ?";
  $stmt_admin_infore = $con->prepare("$sss");
  $stmt_admin_infore->execute(array( $ra_date, $ra_time));

}
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
    margin-top: 5px;">زمن القرعة</h1>
        <!-- ****************************************************************************************************** -->
        <div dir="rtl" class="card-body">
  <div dir="rtl" class="container" style="    margin-top: -13rem">

  <?php
//جلب بيانات زمن اقرعة
$sqlr ="SELECT * FROM `rand_time`";
$stmt_admin_infore = $con->prepare("$sqlr");
$stmt_admin_infore->execute(array());
$time_info = $stmt_admin_infore->fetch();
$ru_infore = $stmt_admin_infore->rowCount();
if($ru_infore == 0){?>

<span style ="font-size: 30px;
    width: 100%;"  class="badge badge-info">لم يتم تحديد زمن القرعة</span>

<?php }else{
  ?>
  <span style ="font-size: 30px;
    width: 100%;"  class="badge badge-info">
    ستكون القرعة في يوم   <span style="color:#c40000"><?php echo $time_info['ra_date'] ?></span> عند الساعة   <span style="color:#c40000"><?php echo $time_info['ra_time'] ?></span>
    
  </span>
  <?php
}
 ?>
 
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
 
        <div dir="rtl" class="card-body">
  <div dir="rtl" class="container">
  <form method="post" action="">
  <div class="form-group">
    <label for="exampleInputEmail1">إختيار اليوم</label>
    <input name="ra_date" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">اختيار الزمن</label>
    <input name="ra_time" type="time" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">تـعـيـــيـن</button>
</form>
</div>
  </div>
</div>
<a href="draw.php" style="position: relative;
    top: 21rem;
    right: -44rem;">
              <button class="btn btn-primary">رجوع</button>
            </a>
<!-- ************************************************************************************************************************************ -->


                
    <script src="js/poupper.js"></script>
    <script src="js/jquery-3.4.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>