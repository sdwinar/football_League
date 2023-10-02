<?php
include "connect.php";

if (isset($_POST['submit'])){


    $club_name = $_POST['club_name'];
   $club_boos = $_POST['club_boos'];
   $moder_fani = $_POST['moder_fani'];
   $coach = $_POST['coach'];

   if( $club_name !="" && $club_boos!="" &&  $moder_fani !=""  &&  $coach !=""){

    $sql="SELECT * FROM `registered_clubs` WHERE	(`club_name` = '$club_name')";
    $stmt_admin_info = $con->prepare("$sql");
    $stmt_admin_info->execute(array());
    $admin_count = $stmt_admin_info->rowCount();
 
    
 
    if($admin_count > 0){
     $fmsg = "عـفـوا ,, هذا النادي مسجل من قبل";
  }else{
   
     $stmt_insert_tree2 = $con->prepare("INSERT INTO `registered_clubs` (`club_id`,`club_name`, `club_boos`, `moder_fani`, `coach`, `club_case`) 
     VALUES (null,'$club_name','$club_boos', '$moder_fani', '$coach',1);");
     $stmt_insert_tree2->execute();
  
     $fmsg = "تـمت إضافة النادي بنجاح";
 
  }
 
 
  
 }//if( $club_name !="" && $club_username!="" &&  $club_pass !="")
 else{
    $fmsg = "عـفـوا ,, بعض الحقول فارغة";

 }
}//في حال تعديل الاستمارة
elseif (isset($_POST['update'])){


    $club_name = $_POST['club_name'];
   $club_boos = $_POST['club_boos'];
   $moder_fani = $_POST['moder_fani'];
   $coach = $_POST['coach'];

   if( $club_name !="" && $club_boos!="" &&  $moder_fani !=""  &&  $coach !=""){

  
   
     $stmt_insert_tree2 = $con->prepare("UPDATE `registered_clubs` SET `club_name` = ?
     , `club_boos` = ?, `moder_fani` = ?, `coach`=?, `club_case`= ? WHERE `club_name` = ?;");
     $stmt_insert_tree2->execute(array($club_name,$club_boos, $moder_fani, $coach,1,$club_name));
  
    //  $fmsg = "تـمت تعديل النادي بنجاح";
 
  
 
 
  
 }//if( $club_name !="" && $club_username!="" &&  $club_pass !="")
 else{
    $fmsg = "عـفـوا ,, بعض الحقول فارغة";

 }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/form.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <script src="js/form.js" defer></script>
    <title>استمارة القرعة </title>
</head>

<body>
    <header>
        <img src="../my-project/imgs/nadi.jpg" id="pic">
        <img src="../my-project/imgs/sudan-national-football-team-sudan-football-association-africa-cup-of-nations-algeria-national-football-team-football-dfac87a17a770f32346a6773934aff99.png">
        <span id="h2head">
            <h2>الاتحاد السوداني للكرة القدم</h2>
            <h2>Sudan Football Assocation</h2>
        </span>
    </header>
    <nav>
        <ul>
            <li>
                <a href="index.html"><img src="../my-project/imgs/help copy.png" id="up">مساعدة</a>
            </li>
            <li>
                <a href="index.html"><img src="../my-project/imgs/baseline_report_problem_white_24dp.png" id="up">تواصل</a>
            </li>
        </ul>
    </nav>
    <?php if(isset($fmsg)){?>
                        <div class="alert alert-danger alert-dismissible fade show text-center"
                            style="    background: red;    width: 149%;     color: white;" role="alert">
                            <strong><?php echo $fmsg; ?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php } 
// """""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""                        

//اولا التأكد من عدم وجود إستمارةمن قبل

$clu_name = $_SESSION['username'];
$sql1="SELECT * FROM `registered_clubs` WHERE	(`club_name` = '$clu_name')";
$stmt_admin_info1 = $con->prepare("$sql1");
$stmt_admin_info1->execute(array());
$club_info = $stmt_admin_info1->fetch();
$culb_count = $stmt_admin_info1->rowCount();

$club_case = $club_info['club_case'];

if($culb_count==0){

                        
                        ?>


    <form dir="rtl" action="" class="form" method="post">
        <h1 class="text-center">استمارة القرعة</h1>
        <!-- Progress bar -->
        <div class="progressbar">
            <div class="progress" id="progress"></div>

            <div class="progress-step progress-step-active" data-title="الادارة"></div>
                 </div>

        <!-- Steps -->
        <div class="form-step form-step-active">
            <div class="input-group">
                <label for="club_name">اسم النادي</label>
                <input type="text" name="club_name" id="username" value="<?php echo $_SESSION['username'] ?>"/>
            </div>
            <div class="input-group">
                <label for="club_boos">رئيس النادي </label>
                <input type="text" name="club_boos" id="position" />
            </div>
            <div class="input-group">
                <label for="moder_fani">المدير الفني </label>
                <input type="text" name="moder_fani" id="position" />
            </div>
            <div class="input-group">
                <label for="coach"> المدرب </label>
                <input type="text" name="coach" id="position" />
            </div>
        </div>
    

        </div>
        <input type="submit" style="    background: blue;    color: white;    font-size: 23px;
       cursor: pointer;" name="submit" value="تـقــديم الاسـتـمـارة ">

          </form>
          <?php
          }//في حال تم تقديم الاستمارة وليم يتم التأكيد حتي الان
          elseif($club_case ==1){?>

<div class="alert alert-info alert-dismissible fade show text-center"
                            style="    font-size: 25px;" role="alert">
                            <strong>تم تقديم إستمارة <?php echo $_SESSION['username'] ?> لكن لم يتم التأكيد حتى الان</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>


         <?php
          }//في حال تم تأكيد الاستمارة     
          elseif($club_case ==3){?>

            <div class="alert alert-success alert-dismissible fade show text-center"
                                        style="    font-size: 25px;" role="alert">
                                        <strong>تم تأكيد إستمارت <?php echo $_SESSION['username'] ?> للدخول لنظام القرعة     </strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

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
    position: relative;
    width: 100%;
    top: 11rem;"  class="badge badge-info">لم يتم تحديد زمن القرعة</span>

<?php }else{
  ?>
  <span style ="font-size: 30px;
    position: relative;
    width: 100%;
    top: 11rem;"  class="badge badge-info">
    ستكون القرعة في يوم   <span style="color:#c40000"><?php echo $time_info['ra_date'] ?></span> عند الساعة   <span style="color:#c40000"><?php echo $time_info['ra_time'] ?></span>
    
  </span>
  <?php
}
 ?>
            
            
                     <?php
                      }
                      //في حال تم رفض الاستمارة     
          elseif($club_case ==2){?>

            <div class="alert alert-danger alert-dismissible fade show text-center"
                                        style="    font-size: 25px;" role="alert">
                                        <strong>تم رفض إستمارت نادي <?php echo $_SESSION['username'] ?>   الرجاء تصحيح جميع معلومات      </strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>


                                    
    <form dir="rtl" action="" class="form" method="post">
        <h1 class="text-center">استمارة القرعة</h1>
        <!-- Progress bar -->
        <div class="progressbar">
            <div class="progress" id="progress"></div>

            <div class="progress-step progress-step-active" data-title="الادارة"></div>
                 </div>

        <!-- Steps -->
        <div class="form-step form-step-active">
            <div class="input-group">
                <label for="club_name">اسم النادي</label> 

                <input type="text" name="club_name" id="username" value="<?php echo $_SESSION['username'] ?>"/>
            </div>
            <div class="input-group">
                <label for="club_boos">رئيس النادي </label>
                <input type="text" name="club_boos" id="position" value="<?php echo $club_info['club_boos']; ?>"/>
            </div>
            <div class="input-group">
                <label for="moder_fani">المدير الفني </label>
                <input type="text" name="moder_fani" id="position" value="<?php echo $club_info['moder_fani']; ?>" />
            </div>
            <div class="input-group">
                <label for="coach"> المدرب </label>
                <input type="text" name="coach" id="position" value="<?php echo $club_info['coach']; ?>"/>
            </div>
        </div>
    

        </div>
        <input type="submit" style="    background: blue;    color: white;    font-size: 23px;
       cursor: pointer;" name="update" value="تعديل الاسـتـمـارة ">

          </form>
            
            
                     <?php
                      }
          ?>

<script src="js/poupper.js"></script>
    <script src="js/jquery-3.4.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>