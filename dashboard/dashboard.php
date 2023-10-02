<?php
include "../connect.php";

if (isset($_POST['add_club'])){


    $club_name = $_POST['club_name'];
   $club_username = $_POST['club_username'];
   $club_pass = $_POST['club_pass'];

   if( $club_name !="" && $club_username!="" &&  $club_pass !=""){

   $sql="SELECT * FROM `users` WHERE	(`user_name` = '$club_name' OR `username`= '$club_username')";
   $stmt_admin_info = $con->prepare("$sql");
   $stmt_admin_info->execute(array());
   $admin_count = $stmt_admin_info->rowCount();

   

   if($admin_count > 0){
    $fmsg = "عـفـوا ,, هذا النادي مسجل من قبل";
 }else{
  
    $stmt_insert_tree2 = $con->prepare("INSERT INTO `users` (`user_id`,`user_name`, `username`, `user_pass`, `user_type`) 
    VALUES (null,'$club_name','$club_username', '$club_pass',2);");
    $stmt_insert_tree2->execute();
 
    $fmsg = "تـمت إضافة النادي بنجاح";

 }


 
}//if( $club_name !="" && $club_username!="" &&  $club_pass !="")
else{
    $fmsg = "عـفـوا ,, بعض الحقول فارغة";

 }
}//في حالة قبول اسمارة النادي
elseif (isset($_GET['case']) && $_GET['case']==3){
    $cn = $_GET['club_name'];

    $stmt_insert_tree2 = $con->prepare("UPDATE  `registered_clubs` SET `club_case` = 3 WHERE `club_name` = ? ");
    $stmt_insert_tree2->execute(array($cn));
 
    $fmsg = "تـمت تأكيد  استمارة النادي  بنجاح";

    
}//في حالة رفض اسمارة النادي
elseif (isset($_GET['case']) && $_GET['case']==2){
    $cn = $_GET['club_name'];

    $stmt_insert_tree2 = $con->prepare("UPDATE  `registered_clubs` SET `club_case` = 2 WHERE `club_name` = ? ");
    $stmt_insert_tree2->execute(array($cn));
 
    $fmsg = "تـمت رفض  استمارة النادي  ";
    header('Location: dashboard.php');


    
}//في حالة حذف النادي
elseif (isset($_GET['delete'])){
    $cn = $_GET['club_name'];

    $stmt_insert_tree2 = $con->prepare("DELETE FROM  `users` WHERE `user_name` = ? ");
    $stmt_insert_tree2->execute(array($cn));
 
    $fmsg = "تـمت حذف النادي  ";

    
}//لتفريغ جدول القرعة
if (isset($_GET['del_leage'])){

  $stmt_insert_tree2 = $con->prepare("DELETE FROM  `registered_clubs` ");
  $stmt_insert_tree2->execute(array());

  $fmsg = "تـمت تفريغ قرعة الدوري  ";
  header('Location: dashboard.php');


}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/sss.css" />
    <link rel="stylesheet" href="css/accordion.css" />
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/dashboard.css">


    <script src="js/java.js" defer></script>
    <title>استمارة القرعة </title>
</head>

<body>
    <header>
        <img src="../dashboard/imgs/nadi.jpg" id="pic">
        <img src="../dashboard/imgs/sudan-national-football-team-sudan-football-association-africa-cup-of-nations-algeria-national-football-team-football-dfac87a17a770f32346a6773934aff99.png">
        <span id="h2head">
            <h2>الاتحاد السوداني للكرة القدم</h2>
            <h2>Sudan Football Assocation</h2>
        </span>
    </header>
    <div class="side">
        <ul class="tabs">
            <li class="active" data-cont=".one">حسابات الاندية</li>
            <li data-cont=".two">الاستمارات</li>
       
            <a href="../draw.php">
            <li data-cont=".three">القرعة </li> 
            </a>

            <a href="#" data-toggle="modal" data-target="#exampleModal">
            <li data-cont="">تقرير الاندية </li>
            </a>

 

<!-- Modal -->
<div dir="rtl" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">إختار النادي </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
        //إختيار الفريق الاول عشوائياً
$sql="SELECT * FROM `registered_clubs`  WHERE	(`club_case` = 3) ";
$stmt_admin_info = $con->prepare("$sql");
$stmt_admin_info->execute(array());
 $admin_count = $stmt_admin_info->rowCount();
 $round_info = $stmt_admin_info->fetchAll();
        ?>
      <form method="post" action="../rebort_2.php">
  <div class="form-row align-items-center">
    <div class="col-auto my-1">
      <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
      <select name="club" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
        <?php
        foreach($round_info as $club111){
        ?>
        <option selected><?php echo $club111['club_name'] ?></option>
        <?php } ?>
            </select>
    </div>
</br>
    <div class="col-auto my-1">
      <button type="submit" class="btn btn-primary">موافق</button>
    </div>
  </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
      </div>
    </div>
  </div>
</div>

        </ul>
    </div>
    <div dir="rtl" class="content">
        <div dir="rtl" class="one">

        <?php if(isset($fmsg)){?>
                        <div class="alert alert-danger alert-dismissible fade show text-center"
                            style="    background: red;    width: 149%;     color: white;" role="alert">
                            <strong><?php echo $fmsg; ?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php } ?>

            <div dir="rtl" class="card text-white bg-dark mb-12" style=" width: 100%;">
  <div class="card-header text-center">إضافة نادي</div>
  <div class="card-body">
    <form dir="rtl" method="post" action="">
  <div class="form-group">
    <label class="float-right" dir="rtl" for="exampleInputEmail1 ">إسم النادي</label>
    <input type="text" name="club_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label class="float-right" dir="rtl" for="exampleInputEmail1 ">إسم المستخدم</label>
    <input type="text" name="club_username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label class="float-right" for="exampleInputPassword1">كلمة المرور</label>
    <input type="password" name="club_pass" class="form-control" id="exampleInputPassword1">
  </div>
    <div class="form-group text-center">
  <button style="    margin-right: 33rem;" type="submit" name="add_club" class="btn btn-primary ">إضـــافة</button>
  </div>
</form>
  </div>
  
</div>
<?php
 $sql_clubs="SELECT * FROM `users` WHERE `user_type`=2";
 $stmt_clubs_info = $con->prepare("$sql_clubs");
 $stmt_clubs_info->execute(array());
 $club_info = $stmt_clubs_info->fetchALL();
?>
<div dir="rtl" class="card text-white bg-secandry mb-12" style="width: 100%;    margin-top: 17px;">
<div class="card-header text-center" style="    color: blue;">ألانـدية المسجلة</div>
  <div dir="rtl" class="card-body">
  <div dir="rtl" class="container">
  <table dir="rtl" class="table table-bordered">
    <thead>
      <tr>
        <th>إسم النادي</th>
        <th>إسم المستخدم</th>
        <th>كلمة المرور</th>
        <th> خـيـارات</th>
      </tr>
    </thead>
    <tbody dir="rtl">
        <?php
        foreach ($club_info as $club){ ?>
      <tr>
        <td><?php echo $club['user_name'] ?></td>
        <td><?php echo $club['username'] ?></td>
        <td><?php echo $club['user_pass'] ?></td>
        <td>
        <a href="?delete=2&club_name=<?php echo $club['user_name'] ?>">
            <button class="btn btn-danger" style="    width: 24%;">حذف</button>
            </a>
        </td>
      </tr>
      <?php } ?>
     
    </tbody>
  </table>
</div>
  </div>
</div>
        </div>        <!-- class="activ" -->


        <div class="two">
         
        <?php
 $sql_clubs="SELECT * FROM `registered_clubs`";
 $stmt_clubs_info = $con->prepare("$sql_clubs");
 $stmt_clubs_info->execute(array());
 $club_info = $stmt_clubs_info->fetchALL();
?>
<div dir="rtl" class="card text-white bg-secandry mb-12" style="width: 100%;    margin-top: 17px;">
<div class="card-header text-center" style="    color: blue;"> الاستمارات</div>
  <div dir="rtl" class="card-body">
  <div dir="rtl" class="container">
  <table dir="rtl" class="table table-bordered">
    <thead>
      <tr>
        <th>إسم النادي</th>
        <th>رئيس النادي</th>
        <th>المدير الفني</th>
        <th> المدرب</th>
        <th> حالة الاستمارة</th>
        <th>  خيارات</th>
      </tr>
    </thead>
    <tbody dir="rtl">
        <?php
        foreach ($club_info as $club){ ?>
      <tr>
        <td><?php echo $club['club_name'] ?></td>
        <td><?php echo $club['club_boos'] ?></td>
        <td><?php echo $club['moder_fani'] ?></td>
        <td><?php echo $club['coach'] ?></td>
        <td><?php 
        if($club['club_case']==1){
            echo "لم يتم قبول الاستمارة";
        }elseif($club['club_case']==3){
            echo "تم تأكيد الاستمارة";
        }elseif($club['club_case']==2){
            echo "تم رفض الاستمارة";
        }

         ?></td>
        <td><?php 
        if($club['club_case']==1){?>

            <a href="?case=3&club_name=<?php echo $club['club_name'] ?>">
            <button class="btn btn-success">تاكيد</button>
            </a>

            <a href="?case=2&club_name=<?php echo $club['club_name'] ?>">
            <button class="btn btn-danger" style="    width: 24%;">رفض</button>
            </a>

        <?php
        }elseif($club['club_case']==3){
            echo "تم تأكيد الاستمارة";
        }elseif($club['club_case']==2){
            echo "تم رفض الاستمارة";
        }

         ?>

        </td>
      </tr>
      <?php } ?>
     
    </tbody>
  </table>

  <a href="?del_leage" style="position: relative;
    top: 1rem;
    right: 1rem;">
              <button class="btn btn-primary">تفريغ الاستمارات</button>
            </a>
</div>
  </div>
</div>

                </div>         <!-- class="two" -->


                <div class="three">
         
         three
                 </div>        <!-- class="two" -->

            </div>
  
             </div>
         </div>
         </div>
        </div>

        
        
      
    </div>
 


  


    <script src="../js/poupper.js"></script>
    <script src="../js/jquery-3.4.0.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>