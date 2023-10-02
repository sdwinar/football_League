<?php
include "connect.php";
$round = 4;
//إختيار الفريق الاول عشوائياً
$sql="SELECT `club_name` FROM `registered_clubs`  WHERE	(`club_case` = 3) ORDER BY RAND () LIMIT 1";
$stmt_admin_info = $con->prepare("$sql");
$stmt_admin_info->execute(array());
 $admin_count = $stmt_admin_info->rowCount();
 $round_info = $stmt_admin_info->fetch();
 $club1 = $round_info['club_name'];

 //إختيار الفريق الثاني عشوائياً
$sql="SELECT `club_name` FROM `registered_clubs`  WHERE	(`club_case` = 3 && `club_name` != '$club1' ) ORDER BY RAND () LIMIT 1";
$stmt_admin_info = $con->prepare("$sql");
$stmt_admin_info->execute(array());
 $admin_count = $stmt_admin_info->rowCount();
 $round_info = $stmt_admin_info->fetch();
 $club2 = $round_info['club_name'];

  //إختيار الفريق الثالث عشوائياً
$sql="SELECT `club_name` FROM `registered_clubs`  WHERE	(`club_case` = 3 && `club_name` != '$club1' && `club_name` != '$club2' ) ORDER BY RAND () LIMIT 1";
$stmt_admin_info = $con->prepare("$sql");
$stmt_admin_info->execute(array());
 $admin_count = $stmt_admin_info->rowCount();
 $round_info = $stmt_admin_info->fetch();
 $club3 = $round_info['club_name'];

  //إختيار الفريق الرابع عشوائياً
$sql="SELECT `club_name` FROM `registered_clubs`  WHERE	(`club_case` = 3 && `club_name` != '$club1' && `club_name` != '$club2' && `club_name` != '$club3' ) ORDER BY RAND () LIMIT 1";
$stmt_admin_info = $con->prepare("$sql");
$stmt_admin_info->execute(array());
 $admin_count = $stmt_admin_info->rowCount();
 $round_info = $stmt_admin_info->fetch();
 $club4 = $round_info['club_name'];

  //إختيار الفريق الخامس عشوائياً
$sql="SELECT `club_name` FROM `registered_clubs`
  WHERE	(`club_case` = 3 && `club_name` != '$club1' && `club_name` != '$club2' && `club_name` != '$club3' && `club_name` != '$club4' ) ORDER BY RAND () LIMIT 1";
$stmt_admin_info = $con->prepare("$sql");
$stmt_admin_info->execute(array());
 $admin_count = $stmt_admin_info->rowCount();
 $round_info = $stmt_admin_info->fetch();
 $club5 = $round_info['club_name'];

 
  //إختيار الفريق الخامس عشوائياً
$sql="SELECT `club_name` FROM `registered_clubs`
WHERE	(`club_case` = 3 && `club_name` != '$club1' && `club_name` != '$club2' && `club_name` != '$club3' && `club_name` != '$club4'  && `club_name` != '$club5' ) ORDER BY RAND () LIMIT 1";
$stmt_admin_info = $con->prepare("$sql");
$stmt_admin_info->execute(array());
$admin_count = $stmt_admin_info->rowCount();
$round_info = $stmt_admin_info->fetch();
$club6 = $round_info['club_name'];


//التاكد من ان الجولة الاولى فارغة حتى تتم الإضافة
$sql="SELECT * FROM `league` WHERE `round_id` = 4";
$stmt_admin_info = $con->prepare("$sql");
$stmt_admin_info->execute(array());
$ru_count = $stmt_admin_info->rowCount();

if($ru_count==0){
  $m1 = $club1." X ".$club2;
  $m2 = $club3." X ".$club4;
  $m3 = $club5." X ".$club6;

  
  //التاكد ان الماتش لم يلعب من قبل
  $sql="SELECT * FROM `league` WHERE (( `match_1` != '$m1' 
  || `match_2` != '$m1' 
  || `match_3` != '$m1'
  || `match_1` != '$m2'
  || `match_2` != '$m2'
  || `match_3` != '$m2'
  || `match_1` != '$m3'
  || `match_2` != '$m3'
  || `match_3` != '$m3'
  ) 
  && (`round_id` = 1))
  ||
  (( `match_1` != '$m1' 
  || `match_2` != '$m1' 
  || `match_3` != '$m1'
  || `match_1` != '$m2'
  || `match_2` != '$m2'
  || `match_3` != '$m2'
  || `match_1` != '$m3'
  || `match_2` != '$m3'
  || `match_3` != '$m3'
  ) 
  && (`round_id` = 2))
  ||
  (( `match_1` != '$m1' 
  || `match_2` != '$m1' 
  || `match_3` != '$m1'
  || `match_1` != '$m2'
  || `match_2` != '$m2'
  || `match_3` != '$m2'
  || `match_1` != '$m3'
  || `match_2` != '$m3'
  || `match_3` != '$m3'
  ) 
  && (`round_id` = 3))
  ";
$stmt_admin_info = $con->prepare("$sql");
$stmt_admin_info->execute(array());
echo $ru_count = $stmt_admin_info->rowCount();

if($ru_count>0){

  $sql="INSERT INTO `league` (`league_id`,`round_id`,`match_1`,`match_2`,`match_3`)
  VALUE (NULL , 4 ,'$m1','$m2','$m3') ";
 $stmt_ins = $con->prepare("$sql");
$stmt_ins->execute(array());

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
    margin-top: 5px;">الجولة الرابعة</h1>
        <!-- ****************************************************************************************************** -->
        <div dir="rtl" class="card-body">
  <div dir="rtl" class="container" style="    margin-top: -13rem">
    <a href="round_1.php">
      <button class="btn btn-success">الجولة الاولى</button>
    </a>
    <a href="round_2.php">
      <button class="btn btn-success">الجولة الثانية</button>
    </a>
    <a href="round_3.php">
      <button class="btn btn-success">الجولة الثالثة</button>
    </a>
    <a href="round_4.php">
      <button class="btn btn-warning">الجولة الرابعة</button>
    </a>
    <a href="round_5.php">
      <button class="btn btn-success">الجولة الخامسة</button>
    </a>
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
 ?>
        <div dir="rtl" class="card-body">
  <div dir="rtl" class="container">
  <table dir="rtl" class="table table-bordered">
    <thead>
      <tr>
        <th> #</th>
        <th> المباراة</th>
        <th>اليوم</th>
        <th>الزمن</th>
        <th> الاستاد</th>
        <th>  الحكم</th>
      </tr>
    </thead>
    <tbody dir="rtl">
     
      <tr>
      <td> 1 </td>
        <td><?php echo $ru_info['match_1'] ?></td>
        <td>  </td>
        <td>  </td>
        <td>  </td>
        <td>  </td>
      </tr>
      <tr>
      <td> 2 </td>

        <td><?php echo $ru_info['match_2'] ?></td>
        <td>  </td>
        <td>  </td>
        <td>  </td>
        <td>  </td>
      </tr>

      <tr>
      <td> 3 </td>
        <td><?php echo $ru_info['match_3'] ?></td>
        <td>  </td>
        <td>  </td>
        <td>  </td>
        <td>  </td>
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