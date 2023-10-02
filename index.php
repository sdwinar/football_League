<?php
include "connect.php";


if (isset($_POST['submit'])){
    $username = $_POST['username'];
   $pass = $_POST['pass'];

   $sql="SELECT * FROM `users` WHERE	`username` = '$username' && `user_pass`= '$pass'";
   $stmt_admin_info = $con->prepare("$sql");
   $stmt_admin_info->execute(array());
   $admin_info = $stmt_admin_info->fetch();
   $admin_count = $stmt_admin_info->rowCount();

   if($admin_count == 0){
       $fmsg = "عـفـوا ,, معلومات تسجيل الدخول غير صحيحة";
    }else{
        $_SESSION['user_id'] =  $admin_info['username'];
        $_SESSION['username'] =  $admin_info['user_name'];
        $_SESSION['user_type'] =  $admin_info['user_type'];

        $user_type = $admin_info['user_type'];

        if($user_type == 1){
           header('Location: dashboard/dashboard.php');

        }elseif($user_type == 2){
           header('Location: main.php');

        }
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">

    <title>تسجيل الدخول</title>
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
    <nav></nav>
    <section>

        <div class="center">
        <?php if(isset($fmsg)){?>
                        <div class="alert alert-danger alert-dismissible fade show text-center"
                            style="    background: red;    width: 149%;     color: white;" role="alert">
                            <strong><?php echo $fmsg; ?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php } ?>
            <h1>تسجيل الدخول </h1>
            <form method="post" action="">
                <div class="txt_field">
                    <input type="text" name="username" required="قم بملئ الحقل اعلاه">
                    <span></span>
                    <label>اسم المستخدم </label>
                </div>
                <div class="txt_field">
                    <input type="password" name="pass" required>
                    <span></span>
                    <label>كلمة المرور</label>
                
                    <input type="submit" name="submit" value="تسجيل دخول">
                </div>
            </form>
        </div>

    </section>
    <footer>
        <span id="copy">
        <h4>2022 &copy; كل الحقوق محفوظة </h4>
        <p></p></span>
        <span><nav><ul>
         <li>  <a href="index.html"><img src="../my-project/imgs/help copy.png"id="down"  >مساعدة</a></li> 
       
         <li>  <a href="index.html"><img src="../my-project/imgs/baseline_report_problem_white_24dp.png"id="down">تواصل</a></li> 
        </ul>  </nav> </span>
    </footer>
    <script src="JS/main.js "></script>
    <script src="js/poupper.js"></script>
    <script src="js/jquery-3.4.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>